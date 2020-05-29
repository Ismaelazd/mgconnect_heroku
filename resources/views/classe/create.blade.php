@extends('layouts/master')
@section('content')

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/profil.css">
</head>

<body class="profile-page">
    @include('components/navbar-page')

    <div id="profilHeader" class="page-header header-filter" data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">
        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Nos classes</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile ">

                            <div class="name d-flex align-items-center justify-content-center">
                                <h3 class="title pt-4 ">Créer une classe</h3>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center mt-3">
                <div class="card  w-75 ">
                   
                <form action="{{route('classe.store')}}" method="post">
                    @csrf
                    <div class="card-body">
            
                    <div class="form-group">
                        <label for="name">Nom de la classe</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="@if($errors->first('name'))@else{{ old('name') }}@endif" placeholder="Nom de la classe">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
             
                </div>
            
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <a href="{{route('classe.index')}}" class="btn btn-danger">Annuler</a>
                    </div>
            
            
                </form>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('components/footer-page')

    
    <script src="{{'/js/profil.js'}}"></script>

</body>




  

