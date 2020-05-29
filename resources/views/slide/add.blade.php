@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">Add slide </h1>
        <hr class="bg-dark">
    </div>
</div>
@stop

@section('content')
    

<div class="container pb-5">
    
    <form action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group  ">
            <label class="h3" for="sous_titre ">Sous-titre :</label>
            <input value="" type="text" name="sous_titre"
                class="form-control @error('sous_titre') is-invalid @enderror" id="sous_titre">
            @error('sous_titre')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group  ">
            <label class="h3" for="titre_un ">Titre 1 :</label>
            <input value="" type="text" name="titre_un"
                class="form-control @error('titre_un') is-invalid @enderror" id="titre_un">
            @error('titre_un')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group  ">
            <label class="h3" for="titre_deux">Titre 2 :</label> <br>
            <input value="" type="text" name="titre_deux"
                class="form-control @error('titre_deux') is-invalid @enderror" id="titre_deux">
            @error('titre_deux')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
        </div>
        <div class="form-group ">
            
                
                <label class="h3" for="image">Image :</label>
                <input value="" type="file" name="image"
                    class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
            <div class="alert alert-danger">{{  $message  }}</div>
            @enderror
            
       
        </div>
        <div class="text-center">

            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </div>

    </form>
</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/users.css">
@stop

@section('js')
   
@stop