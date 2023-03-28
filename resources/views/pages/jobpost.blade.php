@extends('layouts.app')
@section('content')
    <section class="offset-1 col-sm-9">
        <form action="{{ route('job.store') }}" class="your-answer-form" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group"><h3>Create a questions</h3></div>

            <div class="form-group"><label>Job Title</label>
                <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="job title" name="job_title">
                @error('job_title')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group"><label>Company Name</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" placeholder="company name" name="company_name">
                @error('company_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group"><label>Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="location" name="location">
                @error('location')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group"><label>Company Logo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="logo" id="logo">
                </div>
            </div>

            <div class="text-center">OR</div>

            <div class="form-group"><label for="phone">HR Contact</label>
                <input type="number" id="fieldSelectorId" class="form-control" placeholder="contact" name="hrcontact">
            </div>

            <div class="text-center">OR</div>

            <div class="form-group"><label>Website</label>
                <input type="text" class="form-control" placeholder="website" name="website">
            </div>

            <div class="row mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_featured">Featured (Featured click to -5 point)
                </div>
            </div>
            
            <button type="submit" class="default-btn ">submit</button>

        </form>
    </section>
    <script>
    jQuery(document).ready(function () {
        jQuery("#fieldSelectorId").keypress(function (e) {
           var length = jQuery(this).val().length;
         if(length > 9) {
              return false;
         } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              return false;
         } else if((length == 0) && (e.which == 48)) {
              return false;
         }
        });
      });
    </script>
@endsection
