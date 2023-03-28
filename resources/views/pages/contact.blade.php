@extends('layouts.app')
@section('content')
    <!-- Start Contact Area -->
    <section class="contact-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <h2>Get in touch</h2>
                        <form id="contactForm" action="{{ route('contacts.store') }}" class="your-answer-form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                            data-error="Please enter your name" placeholder="enter your name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        {{-- <div class="help-block with-errors"></div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                            data-error="Please enter your email" placeholder="enter your gmail">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Your Phone No</label>
                                        <input type="number" name="phone_number" id="fieldSelectorId" 
                                            data-error="Please enter your number" class="form-control @error('phone_number') is-invalid @enderror"
                                            placeholder="enter your number">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Your Subject</label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control @error('msg_subject') is-invalid @enderror"
                                             data-error="Please enter your subject"
                                            placeholder="enter your subject">
                                            @error('msg_subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="6" 
                                            data-error="Write your message" placeholder="your message"></textarea>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><br><br><br>
                </div>

                <div class="col-lg-12">
                    <div class="contacts-info">
                        <h2>Contact informaton</h2>
                        @php
                            $contacts = \App\Models\Contact::all();
                        @endphp
                        @foreach ($contacts as $contact)
                            <ul class="address">
                                <li>
                                    <span>Call:</span>
                                    <a href="tel:+1-719-504-1984">{{ $contact->call }}</a>
                                </li>
                                <li>
                                    <span>Email:</span>
                                    <a
                                        href="https://templates.envytheme.com/cdn-cgi/l/email-protection#ddadb4bba49dbab0bcb4b1f3beb2b0"><span
                                            class="__cf_email__"
                                            data-cfemail="d7a7beb1ae97b0bab6bebbf9b4b8ba">{{ $contact->email }}</span></a>
                                </li>
                                <li class="location">
                                    <span>Address:</span>
                                    {{ $contact->address }}
                                </li>
                            </ul>
                        @endforeach

                        <div class="map-area">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="770" height="510" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=codeAlpha Infotech, D-Mart, River Park Society, Singanpor, Surat, Gujarat&t=&z=10&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                        href="https://2yu.co">2yu</a><br>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 510px;
                                            width: 770px;
                                        }
                                    </style><a href="https://embedgooglemap.2yu.co">html embed google map</a>
                                    <style>
                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 510px;
                                            width: 770px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

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
