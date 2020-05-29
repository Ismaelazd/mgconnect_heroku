@extends('layouts/master')
@section('content')

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">

        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/profil.css')}}">
</head>

<body class="profile-page">
    @include('components/navbar-page')

    <div id="profilHeader" class="page-header header-filter" data-parallax="true"
        style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');">
        <div class="title mx-auto ">
            <h2 class="text-white mx-auto titre mb-4">Edit my Profil</h2>
            <div class="bgTitle"></div>

        </div>
    </div>
    <div class="main main-raised py-5">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            
                            <div class="name">
                                <h3 class="title pt-4 ">My informations</h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="   ">
                    <div class="row">
                        <div class="col-lg-6 px-5 px-5" style="
                        border-right: 3px;
                        border-left: 0px;
                        border-style: solid;
                        border-image: 
                          linear-gradient(
                            to bottom, 
                            #120851, 
                            rgba(0, 0, 0, 0)
                          ) 1 100%;">
                          @can('student', App\User::class)
                            <form action="{{route('validationchange.store',$user)}}" method="post" enctype="multipart/form-data">
                          @endcan
                          @can('visiteur', App\User::class)
                            <form action="{{route('validationchange.store',$user)}}" method="post" enctype="multipart/form-data">
                          @endcan
                          @can('coach', App\User::class)
                             <form action="{{route('user.update',$user)}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                          @endcan
                                @csrf
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3 text-left" for="name ">Nom :</label>
                                    <input value="{{$user->name}}" type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3" for="firstname ">Prenom :</label>
                                    <input value="{{$user->firstname}}" type="text" name="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror" id="firstname">
                                    @error('firstname')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3" for="email">Email :</label> <br>
                                    <input value="{{$user->email}}" type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror " id="email">
                                    @error('email')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                    
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3 text-left" for="tel ">Tel :</label>
                                    <input value="{{$user->tel}}" type="text" name="tel"
                                        class="form-control @error('tel') is-invalid @enderror" id="tel">
                                    @error('tel')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3 text-left" for="rue ">Rue :</label>
                                    <input value="{{$user->rue}}" type="text" name="rue"
                                        class="form-control @error('rue') is-invalid @enderror" id="rue">
                                    @error('rue')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                <div class="form-group  ">
                                    <label style="color: #120851;" class="h3 text-left" for="ville ">Ville :</label>
                                    <input value="{{$user->ville}}" type="text" name="ville"
                                        class="form-control @error('ville') is-invalid @enderror" id="ville">
                                    @error('ville')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-9">
                                        
                                        <label style="color: #120851;" class="h3" for="image">Image :</label>
                                        <input value="{{$user->image}}" type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror" id="image">
                                    </div>
                                    <div class="col-3">
        
                                        <img src="{{asset('img/'.$user->image)}}" alt="" class="img-fluid mx-auto" style="border-radius: 50%;">
                                    </div>
                                    @error('image')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                </div>

                                @can('coach', App\User::class)
                                    <div class="form-group  ">
                                        <label style="color: #120851;" class="h3 text-left" for="facebook ">Url facebook :</label>
                                        <input value="{{$user->facebook}}" type="text" name="facebook"
                                            class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                                        @error('facebook')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group  ">
                                        <label style="color: #120851;" class="h3 text-left" for="twitter ">Url twitter :</label>
                                        <input value="{{$user->twitter}}" type="text" name="twitter"
                                            class="form-control @error('twitter') is-invalid @enderror" id="twitter">
                                        @error('twitter')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group  ">
                                        <label style="color: #120851;" class="h3 text-left" for="instagram ">Url instagram :</label>
                                        <input value="{{$user->instagram}}" type="text" name="instagram"
                                            class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                                        @error('instagram')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group  ">
                                        <label style="color: #120851;" class="h3 text-left" for="linkedin ">Url linkedin :</label>
                                        <input value="{{$user->linkedin}}" type="text" name="linkedin"
                                            class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                                        @error('linkedin')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group  ">
                                        <label style="color: #120851;" class="h3 text-left" for="github ">Url github :</label>
                                        <input value="{{$user->github}}" type="text" name="github"
                                            class="form-control @error('github') is-invalid @enderror" id="github">
                                        @error('github')
                                        <div class="alert alert-danger">{{  $message  }}</div>
                                        @enderror
                                    </div>
                                
                                    
                                @endcan
                                
                                <div class="text-center mt-5">
                                    <button style="color: #ffff; background-color: #120851 ;" title="Edit" type="submit" class="btn  font-weight-bold">Enregistrer</button>
                        
                                </div>
                        
                            </form>
                        </div>
                        <div class="col-lg-6 px-5">
                            <h3 class="text-center" style="color: #120851;">Changer le mot de passe</h3>
                            <div class="form-group ">
                                <form action="{{route('myProfil.update',$user)}}" method="post" class="mt-5">
                                    @csrf
                                    @method('PUT')
                                    <label style="color: #120851;" class="h3" for="password">Nouveau mot de passe :</label>
                                    <input  type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password">
                                    @error('password')
                                    <div class="alert alert-danger">{{  $message  }}</div>
                                    @enderror
                                    <div class="text-center mt-5">
                                        <button style="color: #ffff; background-color: #120851 ;" title="Enregistrer" type="submit" class="btn  font-weight-bold">Enregistrer</button>
                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </div>


            </div>
        </div>
    </div>

    @include('components/footer-page')


    <script src="{{asset('/js/profil.js')}}"></script>

</body>
