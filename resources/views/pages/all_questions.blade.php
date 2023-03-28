@extends('layouts.app')
@section('content')
    <ul class="nav questions-tabs justify-content-center">
        <li class="nav-item">
            <button class="nav-link active">
                All Questions
            </button>
        </li>
    </ul>
    {{-- start recent question section  --}}
    <div class="tab-pane fade show active mb-5" id="recent-questions" role="tabpanel" aria-labelledby="recent-questions-tab">
        @foreach ($questions as $key => $que)
            <div class="single-qa-box like-dislike mt-1">
                <div class="d-flex">
                    <div class="flex-grow-1 ms-3">

                        {{-- showing on question --}}
                        <ul class="graphic-design">
                            <li><a href="{{ route('user_profile', $que->users->id) }}"><img
                                        src="{{ asset($que->users->photo) }}" alt="" width="45px"></a></li>
                            <li><a href="{{ route('user_profile', $que->users->id) }}">{{ $que->users->name ?? '' }}</a>
                            </li>
                            <li class="d-flex justify-content-end">
                                <span>{{ get_formatted_date($que->created_at, 'd/m/y') }}</span>
                            </li>
                        </ul>
                        <h3><a href="{{ route('quedetails', $que->id) }}">{{ $que->question }}</a></h3>

                        {{-- showing on question tags --}}
                        <ul class="tag-list">
                            @if (isset($que->tag) && $que->tag != '')
                                @foreach (\App\Models\tag::whereIn('id', json_decode($que->tag))->get() as $tag)
                                    <li><a href="?tag={{ $tag->id }}">{{ $tag->tag }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="anser-list">
                                <li>{{ $que->viewed }} Views</li>
                                <li>
                                    <ul class="qa-share">
                                        <li class="share-option"><span><i class="ri-share-fill"></i></span>
                                            <ul class="social-icon">
                                                <li><a href="https://www.facebook.com/" target="_blank"><i
                                                            class="ri-facebook-fill"></i></a></li>
                                                <li><a href="https://www.twitter.com/" target="_blank"><i
                                                            class="ri-twitter-line"></i></a></li>
                                                <li><a href="https://www.linkedin.com/" target="_blank"><i
                                                            class="ri-linkedin-fill"></i></a></li>
                                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                                            class="ri-instagram-line"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-5">{{ $questions->links() }}</div>
    </div>
    {{-- end recent question section  --}}
@endsection

