<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsletterMail;
use App\Newsletter;
use Validator;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletter.index',compact('newsletters'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'email' => 'required|unique:newsletters',
        // ]);
   

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:newsletters',
        ]);
        if ($validator->fails()) {
            return redirect()->to(url()->previous().'#newsletter') //change this to your desired url
                ->withErrors($validator)
                ->withInput();
        }

        $newsletter = new Newsletter();
        $newsletter->email = $request->input('email');
        $newsletter->save();
        Mail::to($newsletter->email)->send(new NewsletterMail($newsletter));
        return redirect()->to(url()->previous().'#newsletter')->with('newsletterSent','Votre inscription a bien été enregistrée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->back();
    }
}
