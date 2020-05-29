 <!-- Hero Section Begin -->
 <section id="myHeader" class="hero-section">
    <div class="hero__slider owl-carousel">
        @foreach ($slides as $slide)
            
        
            <div class="hero__item set-bg" data-setbg="{{asset('img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>{{$slide->sous_titre}}</h5>
                                <h2>{{$slide->titre_un}} <br />{{$slide->titre_deux}}</h2>
                                <a href="#about" class="primary-btn">Your platform</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img">
                                <img src="{{asset('img/'.$slide->image)}}" class="@if ($slide->image == 'calender.png')
                                    w-75 ml-auto
                               
                                @endif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="hero__item set-bg" data-setbg="{{asset('img/hero/hero-1.jpg')}}">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h5>Plateform connexion</h5>
                            <h2>Welcome, dear coach, <br />to MGConnect</h2>
                            <a href="#about" class="primary-btn">Your platform</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero__img">
                            <img src="{{asset('img/hero/hero-right.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- Hero Section End -->