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
            <h2 class="text-white mx-auto titre mb-4">Validation changements</h2>
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
                                <h3 class="title pt-4 ">Changements des students</h3>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" description  ">
                    @if (count($changements)==0)
                    <div class="row justify-content-center">

                        <div class="col-9 text-center alert text-white" style="background-color: #120851;">
                            <b>Aucun changements...</b>
                        </div>
                    </div>
                    @else
                    @foreach ($changements as $change)
                    {{-- @if (Auth::user()->classe_id == $change->user->classe_id || Auth::user()->role_id == 1 ) --}}
                        
                   
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Nom :</label>
                        <p>Ancien nom : {{$change->user->name}}</h2>
                            <p>Nouveau nom : {{$change->name}}</h2>
                    </div>
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Prénom :</label>
                        <p>Ancien prénom : {{$change->user->firstname}}</h2>
                            <p>Nouveau prénom : {{$change->firstname}}</h2>
                    </div>
                    
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Email :</label>
                        <p>Ancien email : {{$change->user->email}}</h2>
                            <p>Nouveau email : {{$change->email}}</h2>
                    </div>
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Tel :</label>
                        <p>Ancien tel : {{$change->user->tel}}</h2>
                            <p>Nouveau tel : {{$change->tel}}</h2>
                    </div>
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Rue :</label>
                        <p>Ancienne rue : {{$change->user->rue}}</h2>
                            <p>Nouvelle rue : {{$change->rue}}</h2>
                    </div>
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Ville :</label>
                        <p>Ancienne ville : {{$change->user->ville}}</h2>
                            <p>Nouvelle ville : {{$change->ville}}</h2>
                    </div>
                    <div>

                        <label style="color: #120851;" class="h3" for="password">Image :</label>
                        <div> 
                            <p>Ancienne image : </h2>
                            <img src="{{asset('img/'.$change->user->image)}}" alt="" class="w-25 mx-auto" style="border-radius: 50%;">
                        </div>
                        <div> 
                            <p>Nouvelle image : </h2>
                            <img src="{{asset('img/'.$change->image)}}" alt="" class="w-25 mx-auto" style="border-radius: 50%;">
                        </div>

                    
                    </div>

                    <div class="d-flex justify-content-center mt-5">

                        <form action="{{route('validationchange.update',$change)}}" method="post" class="mx-2">
                            @csrf
                            @method('PUT')

                            <button style="color: #ffff; background-color: #120851 ;" title="Valider" type="submit" class="btn  font-weight-bold">Valider changements</button>
                        </form>
                        <form action="{{route('validationchange.destroy',$change)}}" method="post" class="mx-2">
                            @csrf
                            @method('DELETE')
                            <button style="color: #ffff; background-color: transparents ; border: #120851 solid 1px; color:#120851;" title="Valider" type="submit" class="btn  font-weight-bold">Annuler changements</button>
                        </form>
                    </div>
                        
                    {{-- @endif --}}

                    @endforeach
                    @endif
                    
                </div>   


            </div>
        </div>
    </div>

    @include('components/footer-page')
    <script src="{{asset('/js/profil.js')}}"></script>

</body>
