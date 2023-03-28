@extends('layouts.app')
@section('content')
    <div class="question-details-area mb-5">
        <div class="question-details-content like-dislike">
            <div class="d-flex">

                {{-- question vot like-unlike section --}}
                <div class="link-unlike flex-shrink-0">
                    <a href="{{ route('user_profile', $questions->users->id) }}"><img
                            src="{{ asset($questions->users->photo) }}" width="30px" alt="Image"></a>
                    <div class="donet-like-list">
                        <a href="{{ route('up_vot_q', $questions->id) }}"
                            class="like-unlink-count like {{ $questions->vot_q_active($questions->id, '1') }}">
                            <i class="ri-thumb-up-fill"></i>
                            <span>{{ $questions->vot_up->where('status', 1)->where('type', 1)->count() }}</span>
                        </a>
                    </div>
                    <div class="donet-like-list">
                        <a href="{{ route('down_vot_q', $questions->id) }}"
                            class="like-unlink-count dislike {{ $questions->vot_q_active($questions->id, '0') }}">
                            <i class="ri-thumb-down-fill"></i>
                            <span>{{ $questions->vot_up->where('status', 0)->where('type', 1)->count() }}</span>
                        </a>
                    </div>
                </div>
                {{-- question vot like-unlike end section --}}

                <div class="flex-grow-1 ms-3">
                    <ul class="graphic-design">
                        <li><a
                                href="{{ route('user_profile', $questions->users->id) }}">{{ $questions->users->name ?? '' }}</a>
                        </li>
                        <li><span>{{ get_formatted_date($questions->created_at, 'd-m-y') }}</span></li>
                    </ul>
                    <h3><a href="">{{ $questions->question }}</a></h3>
                    <div style="background-color: #f5f5f5">
                        <p>{{ $questions->description }}</p>
                    </div><br>
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="anser-list">
                            <li>{{ count($answers) }} Answer</li>
                            <li>{{ $questions->viewed }} Views</li>
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
            @foreach ($comments as $com)
                @if ($com->question_id == $questions->id)
                    <ul class="d-flex justify-content-end">
                        <li>
                            <h6>{{ $com->comment }}</h6>
                        </li>
                    </ul>
                @endif
            @endforeach
            <form action="{{ route('comments.store') }}" class="your-answer-form" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control" id="question_id" value="{{ $questions->id }}"
                        name="question_id">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="comment" id="comment" name="comment">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
            <hr>
        </div><br>

        {{-- starting for answer and comment loop section --}}
        @foreach ($answers as $key => $ans)
            <div class="answer-question-details like-dislike">
                <div>
                    <h6>{{ $key + 1 }} Answers</h6>
                </div>
                <div class="d-flex">

                    {{-- answer vot like-unlike section --}}
                    <div class="link-unlike flex-shrink-0 mt-3">
                        <a href="{{ route('user_profile', $ans->users->id) }}"><img src="{{ asset($ans->users->photo) }}"
                                width="30px" alt="Image"></a>
                        <div class="donet-like-list">
                            <a href="{{ route('up_vot_a', [$ans->question_id, $ans->id]) }}"
                                class="like-unlink-count like {{ $questions->vot_a_active($ans->question_id, $ans->id, '1') }}">
                                <i class="ri-thumb-up-fill"></i>
                                <span>{{ $questions->vot_up_a->where('status', 1)->where('answer_id', $ans->id)->count() }}</span>
                            </a>
                        </div>

                        {{-- The question owner accepted --}}
                        @if ($ans->best_answer_id == 1)
                            <svg aria-hidden="true" class="svg-icon iconCheckmarkLg" width="36" height="36"
                                viewBox="0 0 36 36">
                                <path d="m6 14 8 8L30 6v8L14 30l-8-8v-8Z"></path>
                            </svg>
                        @else
                        @endif


                        <div class="donet-like-list">
                            <a href="{{ route('down_vot_a', [$ans->question_id, $ans->id]) }}"
                                class="like-unlink-count dislike {{ $questions->vot_a_active($ans->question_id, $ans->id, '0') }}">
                                <i class="ri-thumb-down-fill"></i>
                                <span>{{ $questions->vot_up_a->where('status', 0)->where('answer_id', $ans->id)->count() }}</span>
                            </a>
                        </div>
                    </div>
                    {{-- answer vot like-unlike end section --}}

                    <div class="flex-grow-1 ms-3">
                        <ul class="latest-answer-list">
                            <li><a href="{{ route('user_profile', $ans->users->id) }}">{{ $ans->users->name ?? '' }}</a>
                            </li>
                            <li><span>{{ get_formatted_date($questions->created_at, 'd-m-y') }}</span></li>
                            <li class="reports"><a href="" class="report"><i
                                        class="ri-error-warning-line"></i>Report</a></li>
                        </ul>
                        <div style="background-color: #f5f5f5">
                            <p>{{ $ans->answer }}</p>
                        </div><br>
                    </div>
                </div>
                @foreach ($comments as $com)
                    @if ($com->answer_id == $ans->id)
                        <ul class="d-flex justify-content-end">
                            <li>
                                <h6>{{ $com->comment }}</h6>
                            </li>
                        </ul>
                    @endif
                @endforeach
                <form action="{{ route('comments.store') }}" class="your-answer-form" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="question_id" value="{{ $questions->id }}"
                            name="question_id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="answer_id" value="{{ $ans->id }}"
                            name="answer_id">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="comment" id="comment" name="comment">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
                <hr>
            </div>
        @endforeach
        {{-- ending for answer and comment loop section --}}

        <form action="{{ route('answers.store') }}" class="your-answer-form" method="post">
            @csrf
            <div class="form-group">
                <h3>Your Answer</h3>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="question_id" value="{{ $questions->id }}"
                        name="question_id">
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="answer" id="answer" cols="82" rows="12"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="default-btn">Post your answer</button>
                </div>
        </form>
    </div>
    </div>
@endsection
