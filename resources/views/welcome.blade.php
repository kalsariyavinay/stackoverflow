@extends('layouts.app')
@section('content')

    <ul class="nav nav-tabs questions-tabs d-flex justify-content-between" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" onclick="loadquetion(1)" id="recent-questions-tab" data-bs-toggle="tab"
                data-bs-target="#recent-questions" type="button" role="tab" aria-controls="recent-questions"
                aria-selected="true">
                Recent Questions
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" onclick="loadquetion(2)" id="most-answered-tab" data-bs-toggle="tab"
                data-bs-target="#most-answered" type="button" role="tab" aria-controls="most-answered"
                aria-selected="false">
                Most Answered
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" onclick="loadquetion(3)" id="unanswered-question-tab" data-bs-toggle="tab"
                data-bs-target="#unanswered-question" type="button" role="tab" aria-controls="unanswered-question"
                aria-selected="false">
                Most Question
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" onclick="loadquetion(4)" id="most-views-tab" data-bs-toggle="tab"
                data-bs-target="#most-views" type="button" role="tab" aria-controls="most-views" aria-selected="false">
                Most Views
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        {{-- start recent question section  --}}
        <div class="tab-pane fade show active" id="recent-questions" role="tabpanel" aria-labelledby="recent-questions-tab">
            @foreach ($recent_questions as $key => $que)
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
                                    <span>{{ get_formatted_date($que->created_at, 'd-m-Y') }}</span>
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
                                    @if (isset($answers->id))
                                        @foreach (\App\Models\Answer::where('question_id', $answers->id)->get() as $ans)
                                            <li>{{ count($ans) }}</a></li>
                                        @endforeach
                                    @endif
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
            <div class="d-flex justify-content-center mt-5">{{ $recent_questions->links() }}</div>
        </div>
        {{-- end recent question section  --}}

        {{-- start most answered section  --}}
        <div class="tab-pane fade" id="most-answered" role="tabpanel" aria-labelledby="most-answered-tab">
            @foreach ($most_answered as $key => $que)
                <div class="single-qa-box like-dislike mt-1">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-3">

                            {{-- showing on question --}}
                            <ul class="graphic-design">
                                <li><a href="{{ route('user_profile', $que->users->id) }}"><img
                                            src="{{ asset($que->users->photo) }}" alt="" width="45px"></a></li>
                                <li><a
                                        href="{{ route('user_profile', $que->users->id) }}">{{ $que->users->name ?? '' }}</a>
                                </li>
                                <li class="d-flex justify-content-end">
                                    <span>{{ get_formatted_date($que->created_at, 'd-m-y') }}</span>
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
        </div>

        {{-- end most answered section  --}}

        {{-- start unanswered question section  --}}
        <div class="tab-pane fade" id="unanswered-question" role="tabpanel" aria-labelledby="unanswered-question-tab">
            @foreach ($most_question as $key => $que)
                <div class="single-qa-box like-dislike mt-1">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-3">

                            {{-- showing on question --}}
                            <ul class="graphic-design">
                                <li><a href="{{ route('user_profile', $que->users->id) }}"><img
                                            src="{{ asset($que->users->photo) }}" alt="" width="45px"></a>
                                </li>
                                <li><a
                                        href="{{ route('user_profile', $que->users->id) }}">{{ $que->users->name ?? '' }}</a>
                                </li>
                                <li class="d-flex justify-content-end">
                                    <span>{{ get_formatted_date($que->created_at, 'd-m-y') }}</span>
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
        </div>
        {{-- end unanswered question section  --}}

        {{-- start most views section  --}}
        <div class="tab-pane fade" id="most-views" role="tabpanel" aria-labelledby="most-views-tab">
            @foreach ($most_views as $key => $que)
                <div class="single-qa-box like-dislike mt-1">
                    <div class="d-flex">
                        <div class="flex-grow-1 ms-3">

                            {{-- showing on question --}}
                            <ul class="graphic-design">
                                <li><a href="{{ route('user_profile', $que->users->id) }}"><img
                                            src="{{ asset($que->users->photo) }}" alt="" width="45px"></a>
                                </li>
                                <li><a
                                        href="{{ route('user_profile', $que->users->id) }}">{{ $que->users->name ?? '' }}</a>
                                </li>
                                <li class="d-flex justify-content-end">
                                    <span>{{ get_formatted_date($que->created_at, 'd-m-y') }}</span>
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
            {{-- {{ $recent_questions->links() }} --}}
        </div>
        {{-- end most views section  --}}

    </div>

    <script>
        loadquetion(1);

        function loadquetion(step) {}
    </script>
@endsection
