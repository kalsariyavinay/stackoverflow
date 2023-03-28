@extends('layouts.app')
@section('content')
    <div class="col-lg-12 mb-5">
        @foreach ($users as $us)
            <div class="user-profile-area">
                <div class="profile-content d-flex justify-content-between align-items-center">
                    <div class="profile-img">
                        <img src="{{ asset($us->photo) }}" alt="" width="100px" height="120px">
                        <h3>{{ $us->name }}</h3>
                        <span>{{ $us->email }}</span>
                        <button class="followers-btn">45 Followers</button>
                        <button class="followers-btn">12 Following</button>
                    </div>


                </div>

                <div class="profile-achive">
                    <div class="row">

                        <div class="col-xl-4 col-sm-6">
                            <div class="single-achive" style="background-color:#f5f5f5">
                                <h2>{{ count($questions) }}</h2>
                                <span>Question</span>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="single-achive" style="background-color:#f5f5f5">
                                <h2> {{ count($answers) }}</h2>
                                <span> Answers</span>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="single-achive" style="background-color:#f5f5f5">
                                <h2> {{ $questions->sum('viewed') }}</h2>
                                <span>view</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="badges">
                    <h3>Badges</h3>

                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-sm-6">
                            <div class="single-badges-box" style="background-color:#f5f5f5">
                                <img src="{{ asset('frontend/images/badges/badges-3.png') }}" alt="Image">
                                <h3>Bronze badges</h3>
                                <p>Sed porttitor lectus nibh. Nulla porttitor accumsan.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="single-badges-box" style="background-color:#f5f5f5">
                                <img src="{{ asset('frontend/images/badges/badges-4.png') }}" alt="Image">
                                <h3>Silver badges</h3>
                                <p>Sed porttitor lectus nibh. Nulla porttitor accumsan.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="single-badges-box" style="background-color:#f5f5f5">
                                <img src="{{ asset('frontend/images/badges/badges-5.png') }}" alt="Image">
                                <h3>Gold badges</h3>
                                <p>Sed porttitor lectus nibh. Nulla porttitor accumsan.</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="single-badges-box" style="background-color:#f5f5f5">
                                <img src="{{ asset('frontend/images/badges/badges-6.png') }}" alt="Image">
                                <h3>Platinum badges</h3>
                                <p>Sed porttitor lectus nibh. Nulla porttitor accumsan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="top-tags">
                    <div class="tag-title d-flex justify-content-between">
                        <h3>Top tags</h3>
                        <a href="tags.html" class="read-more">View all tags</a>
                    </div>

                    <ul>
                        <li>
                            <span class="tag-cate">discussion</span>
                            <span class="tag-score">0 score</span>
                            <span class="tag-score">0 posts</span>
                            <span class="tag-score">0 posts %</span>
                        </li>
                    </ul>
                </div>

                <div class="top-posts">
                    <div class="d-flex justify-content-between">
                        <h3>Top posts</h3>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="question-tab" data-bs-toggle="tab"
                                    data-bs-target="#question" type="button" role="tab" aria-controls="question"
                                    aria-selected="true">Question</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="answers-tab" data-bs-toggle="tab" data-bs-target="#answers"
                                    type="button" role="tab" aria-controls="answers"
                                    aria-selected="false">Answers</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="newest-tab" data-bs-toggle="tab" data-bs-target="#newest"
                                    type="button" role="tab" aria-controls="newest"
                                    aria-selected="false">Newest</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="votes-tab" data-bs-toggle="tab" data-bs-target="#votes"
                                    type="button" role="tab" aria-controls="votes" aria-selected="false">Votes</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="question" role="tabpanel"
                            aria-labelledby="question-tab">
                            <ul>
                                @foreach ($questions as $key => $que)
                                    <li class="d-flex justify-content-between">
                                        <div class="top-posts-list" style="background-color:#f5f5f5">
                                            <i class="ri-chat-2-fill"></i>
                                            <span class="count">{{ $key + 1 }}</span>
                                            <span><a
                                                    href="{{ route('quedetails', $que->users->id) }}">{{ $que->question }}</a></span>
                                        </div>
                                        <p style="background-color:#f5f5f5">
                                            <span>{{ get_formatted_date($us->created_at, 'd-m-y') }}</span></p>
                                @endforeach
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane fade" id="answers" role="tabpanel" aria-labelledby="answers-tab">
                            <ul>
                                @foreach ($answers as $key => $ans)
                                    <li class="d-flex justify-content-between">
                                        <div class="top-posts-list" style="background-color:#f5f5f5">
                                            <i class="ri-chat-2-fill"></i>
                                            <span class="count">{{ $key + 1 }} </span>
                                            <span><a
                                                    href="{{ route('quedetails', $ans->users->id) }}">{{ $ans->answer }}</a></span>
                                        </div>
                                        <p style="background-color:#f5f5f5">
                                            <span>{{ get_formatted_date($ans->users->created_at, 'd-m-y') }}</span></p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="newest" role="tabpanel" aria-labelledby="newest-tab">
                            <ul>
                                <li class="d-flex justify-content-between">
                                    <div class="top-posts-list" style="background-color:#f5f5f5">
                                        <i class="ri-chat-2-fill"></i>
                                        <span class="count">21</span>
                                        <span>What could be UX design software?</span>
                                    </div>
                                    <p style="background-color:#f5f5f5"><span>8 hours ago</span></p>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="votes" role="tabpanel" aria-labelledby="votes-tab">
                            <ul>
                                <li class="d-flex justify-content-between">
                                    <div class="top-posts-list" style="background-color:#f5f5f5">
                                        <i class="ri-chat-2-fill"></i>
                                        <span class="count">21</span>
                                        <span>What could be UX design software?</span>
                                    </div>
                                    <p style="background-color:#f5f5f5"><span>8 hours ago</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
