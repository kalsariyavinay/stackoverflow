    </div>
    </div>

    @if (Route::currentRouteName() == 'home' || Route::currentRouteName() == 'all_questions')
        <div class="col-lg-3">
            <div class="right-siderbar">
                <div class="right-siderbar-common">
                    <a href="{{ route('ask') }}" class="default-btn">
                        Ask a question
                    </a>
                </div>
                <div class="right-siderbar-common">
                    <div class="trending-tags">
                        <h3><i class="ri-price-tag-3-line"></i>All Tags</h3>
                        <ul> @php
                            $tags = \App\Models\tag::all();
                        @endphp
                            @foreach ($tags as $tag)
                                <li><a href="?tag={{ $tag->id }}">{{ $tag->tag }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    </div>
    </div>
    </div>
    <!-- End Mail Content Area -->
