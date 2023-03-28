@extends('layouts.app')
@section('content')
    <div class="tag-content">
        <div class="row justify-content-center">
            @foreach ($tags as $tag)
                <div class="col-lg-4 col-md-4">
                    <div class="single-tags-box">
                        <ul class="tag-mark">
                            <li>
                                <i class="ri-price-tag-3-line"></i>
                                <span>{{ $tag->tag }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        <div class="d-flex justify-content-center">{{ $tags->links() }}</div>
        </div>
    </div>
@endsection
