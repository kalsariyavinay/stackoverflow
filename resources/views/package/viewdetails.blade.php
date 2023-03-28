@extends('layouts.app')
@section('content')
    <section>
        @foreach ($package as $pac)
            <div class="container">
                <div class="row">
                    <div class="offset-3 col-lg-3 col-md-3 col-xs-12">
                        <div><br><img src="{{ asset($pac->logo) }}" alt="" width="200px" height="200px"
                                class="img-responsive wc-image"><br></div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <form action="#" method="post" class="form">
                            <h2>{{ $pac->title }}</h2>
                            <p class="lead"><strong class="text-primary">₹ {{ $pac->price }}</strong> <small> per
                                    year</small></p>
                            <p class="lead">
                                <i class="fa fa-briefcase"></i> Point {{ $pac->total_job_post }} &nbsp;&nbsp;
                                {{-- <i class="fa fa-map-marker"></i> London &nbsp;&nbsp;
                            <i class="fa fa-calendar"></i> 20-06-2020 &nbsp;&nbsp;
                            <i class="fa fa-file"></i> Contract --}}
                            </p>
                        </form><br><br>
                        {{-- <div class="text-center"> --}}
                            <a href="{{ route('buynow', $pac->id ?? '') }}" class="section-btn btn btn-primary ">Buy-Now</a>
                        {{-- </div> --}}
                    </div>
                </div>


                
                
            </div>
        @endforeach
    </section>
@endsection
