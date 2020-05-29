<?php

namespace App\Http\Controllers;
use App;
use App\Event;
use Carbon\Carbon;
use App\Classe;
use App\Info;
use App\User;
use App\Validationchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClasseController extends Controller
{

    public function __construct() {
        $this->middleware('notMember');  
        $this->middleware("coach")->only(["index"]);  
        $this->middleware("can:myCoding,classe")->only(["show","edit","destroy","update","pdf"]);
     
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }
        $info = Info::first();
        $classes = Classe::all();
        return view('classe.index',compact('classes','changements','info'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $changements = Validationchange::all();
        $info = Info::first();
        return view('classe.create',compact('changements','info'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:70|unique:classes',
        ]);

        $classe = new Classe();
        $classe->name = $request->input('name');
        $classe->save();
        return redirect()->route('classe.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {  
        $info = Info::first();
        if (!Auth::check() || Auth::user()->role_id ==1) {
            $changements = Validationchange::all();

        } else {
            $users = User::where('classe_id',Auth::user()->classe_id)->get();
            $changements = Validationchange::whereIn('user_id',$users->pluck('id'))->get();
        }        return view('classe.edit',compact('classe','changements','info'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:70|unique:classes,name,'.$classe->id,
        ]);
        $classe->name = $request->input('name');
        $classe->save();
        return redirect()->route('classe.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classe.index'); 
    }

    //afficher les User appartenants à une classe
    public function show(Classe $classe)
    {
        // $this->authorize('myCoding', $classe,Classe::class);
        $changements = Validationchange::all();
        $info = Info::first();
        $coachs = User::where('classe_id',$classe->id)->where('role_id',2)->get();
        $users = User::where('classe_id',$classe->id)->where('role_id',3)->get();
        return view('classe.show',compact('classe','users','coachs','changements','info')); 
    }
    public function pdf(Classe $classe){
        /**
         * domPDF
         */
        $pdf = App::make('dompdf.wrapper');
        $events = Event::where('end','<',new Carbon( 'friday 23:00:00'))->where('start','>',new Carbon( 'last monday 05:00:00'))->where('classe_id',$classe->id)->get();

        $pdf->loadView('pdf.weekly',compact('events'));
        return $pdf->stream();
    }
}
