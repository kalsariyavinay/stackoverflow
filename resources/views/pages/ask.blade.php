@extends('layouts.app')
@section('content')
    <section>
        <form action="{{ route('questions.store') }}" class="your-answer-form" method="post">
            @csrf

            <div class="form-group">
                <h3>Create a questions</h3>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="title" name="title" required>
            </div>

            <div class="form-group">
                <label>Question</label>
                <input type="text" class="form-control" placeholder="type question" name="question" required>
            </div>

            <div class="form-group">
                <label>Tags</label>
                <select name="tag[]" id="tag" multiple="multiple" multiple multiselect-search="true"
                    multiselect-select-all="true" multiselect-max-items="5" onchange="console.log(this.selectedOptions)"
                    style="width: 100%;" required>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>

            <label>Description</label>
            <div class="form-group">
                <textarea name="description" cols="82" rows="12" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="default-btn">Post your answer</button>
            </div>

        </form>
    </section>
@endsection
