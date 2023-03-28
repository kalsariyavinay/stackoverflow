@extends('layouts.app')
@section('content')
    <ul class="page-nish">
        </li>
        <li class="active">User</li>
    </ul>
    <div class="wew-user-area mb-5">
        <div class="row">
            @foreach ($users as $us)
                <div class="col-lg-4 col-sm-4">
                    <div class="single-new-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset($us->photo) }}" alt="" width="45px">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3><a href="{{ route('user_profile', $us->id) }}">{{ $us->name }}</a></h3>
                                <p>{{ $us->email }}</p>
                            </div>
                        </div>
                        <ul class="d-flex justify-content-between align-items-center">
                            <li>
                                <p><span>394</span> questions</p>
                            </li>
                            <li><a href="user-profile.html" class="default-btn">Follow</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-12">
            <div class="pagination-area mt-0">
                <a href="user.html" class="next page-numbers">
                    <i class="ri-arrow-left-line"></i>
                </a>
                <span class="page-numbers current" aria-current="page">1</span>
                <a href="user.html" class="page-numbers">2</a>
                <a href="user.html" class="page-numbers">3</a>
                
                <a href="user.html" class="next page-numbers">
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
