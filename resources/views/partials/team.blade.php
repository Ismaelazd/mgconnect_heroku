<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-md-8 mx-auto">
                <div class="section-title ">
                    <h3>Meet our team</h3>
                </div>
            </div>
           
        </div>
        <div class="row d-flex justify-content-center">
      
            <div class="col-lg-6 col-md-6">
                <div class="bigcoach__item  h-75 pb-5">
                    <div class="bigcoach__pic">
                        <img src="{{secure_asset('img/'.$bigcoach->image)}}" alt="">
                    </div>
                    <div class="bigcoach__text pt-0 pb-4">
                        <h5 class="text-white">{{$bigcoach->firstname}} {{$bigcoach->name}}</h5>
                        <span>{{$bigcoach->role->role}}</span>

                        <div class="bigcoach__social">
                            @if ($bigcoach->facebook)
                            <a href="{{$bigcoach->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook"></i></a>

                            @endif
                            @if ($bigcoach->twitter)
                            <a href="{{$bigcoach->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>

                            @endif
                            @if ($bigcoach->linkedin)
                            <a href="{{$bigcoach->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a>

                            @endif
                            @if ($bigcoach->instagram)
                            <a href="{{$bigcoach->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>

                            @endif
                            @if ($bigcoach->github)
                            <a href="{{$bigcoach->github}}" target="_blank" class="github"><i class="fab fa-github"></i></a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
       
            
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($coachs as $coach)
            <div class="col-lg-6 col-md-6 ">
                <div class="team__item h-75 pb-5">
                    <div class="team__pic">
                        <img src="{{'img/'.$coach->image}}" alt="">
                    </div>
                    <div class="team__text pt-0 pb-4">
                        <h5>{{$coach->firstname}} {{$coach->name}}</h5>
                        <span>{{$coach->role->role}}</span>

                        <div class="team__social">
                            @if ($coach->facebook)
                            <a href="{{$coach->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook"></i></a>

                            @endif
                            @if ($coach->twitter)
                            <a href="{{$coach->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>

                            @endif
                            @if ($coach->linkedin)
                            <a href="{{$coach->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a>

                            @endif
                            @if ($coach->instagram)
                            <a href="{{$coach->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>

                            @endif
                            @if ($coach->github)
                            <a href="{{$coach->github}}" target="_blank" class="github"><i class="fab fa-github"></i></a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Team Section End -->