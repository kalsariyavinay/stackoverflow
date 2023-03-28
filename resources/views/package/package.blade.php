@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                        <h2>Select Any Package <small><br>Buy Now</small></h2><br>
                    </div>
                </div>


                @foreach ($package as $key => $pac)
                    @if ($pac->is_published == 1)
                    <div class="col-sm-1"></div>
                        <div class="col-md-3 col-sm-3">
                            <div class="courses-thumb-secondary">

                                <a href="{{ route('viewdetails', $pac->id ?? '') }}"><img src="{{ $pac->logo }}"
                                        width="120px" height="120px" alt=""></a>

                                <div class="courses-detail">
                                    {{-- <h3><a href="">{{$pac->title}}</a></h3> --}}

                                    <p class="lead"><strong>₹ {{ $pac->price }}</strong></p>

                                    <p>Quantity : <strong>{{ $pac->total_job_post }}</strong></p>
                                </div>

                                <div class="courses-info">
                                    <a href="{{ route('viewdetails', $pac->id ?? '') }}"
                                        class="section-btn btn btn-primary btn-block">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><br><br><br>
        </div>
    </section>
@endsection
