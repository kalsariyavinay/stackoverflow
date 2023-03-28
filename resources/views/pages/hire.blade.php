@extends('layouts.app')
@section('content')
    <ul class="nav questions-tabs justify-content-center">
        <li class="nav-item">
            <button class="nav-link active">
                Job Posts
            </button>
        </li>
    </ul>
    <div class="wew-user-area">
        <div class="row">
            @foreach ($jobpost as $job)
                <div class="col-lg-12 col-sm-12">
                    <div class="single-new-user">
                        <h6 class="text-end">{{ get_formatted_date($job->created_at, 'd-m-y') }}</h6>
                        @if ($job->is_featured == 1)
                            <div class="d-flex justify-content-end">
                                <img src="{{ asset('frontend/images/featured.png') }}" alt="" width="45px">
                            </div>
                        @else
                        @endif
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 ms-3">

                                <img src="{{ asset($job->logo) }}" alt="" width="50px">

                                <h3><a href="">Job:- {{ $job->job_title }}</a></h3>
                                <p>Company:- {{ $job->company_name }}</p>
                                <p>Address:- {{ $job->location }}</p>
                            </div>
                        </div>
                        <ul class="d-flex justify-content-between align-items-end">
                            <li>

                            </li>
                            <li>
                                @if ($job->website)
                                    <a href="{{ $job->website }}" class="default-btn">website</a>
                                @endif
                                @if ($job->hrcontact)
                                    <a href="tel:{{ $job->hrcontact }}" class="default-btn">Call For HR</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">{{ $jobpost->links() }}</div>
        </div>
    </div>
@endsection
