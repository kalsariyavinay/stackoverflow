<!-- Start Footer Area -->
<div class="footer-area mt-5 pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget style-two">
                    <a href="">
                        <img src="{{ asset('frontend/images/logo.png') }}" width="60px" alt="Image">
                    </a>
                    @php
                        $abouts = \App\Models\About::all();
                    @endphp
                    @foreach ($abouts as $about)
                        <p>{{ $about->description }}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="single-footer-widget style-two ml-15">
                    <h3>Company</h3>

                    <ul class="import-link">
                        <li>
                            <a class="box-style {{ is_active('about') }}" href="{{ route('about') }}">About us</a>
                        </li>
                        <li>
                            <a class="box-style {{ is_active('contact') }}" href="{{ route('contact') }}">Contact us</a>
                        </li>
                        {{-- <li>
                            <a class="box-style {{ is_active('userlist') }}" href="{{ route('userlist') }}">User</a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="single-footer-widget style-two">
                    <h3>Explore</h3>

                    <ul class="import-link">
                        {{-- <li>
                            <a href="{{route('ask')}}">Ask question</a>
                        </li>
                        <li>
                            <a href="">FAQs</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('privacy_policy') }}">Privacy policy</a>
                        </li>
                        <li>
                            <a href="{{ route('terms_conditions') }}">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-sm-6">
                <div class="single-footer-widget style-two">
                    <h3>Follow us</h3>

                    <ul class="import-link">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">Instagram</a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/" target="_blank">Linkedin</a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/" target="_blank">Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget style-two">
                    <h3>Contact Us</h3>
                    @php
                        $contacts = \App\Models\Contact::all();
                    @endphp
                    @foreach ($contacts as $contact)
                        <ul class="address-link">
                            <li>
                                <span>Call:</span>
                                <a href="tel:+91-726-591-8770">{{ $contact->call }}</a>
                            </li>
                            <li>
                                <span>Email:</span>
                                <a
                                    href="https://templates.envytheme.com/cdn-cgi/l/email-protection#cbbba2adb28baca6aaa2a7e5a8a4a6"><span
                                        class="__cf_email__"
                                        data-cfemail="cebea7a8b78ea9a3afa7a2e0ada1a3">{{ $contact->email }}</span></a>
                            </li>
                            <li>
                                <span>Address:</span>
                                {{ $contact->address }}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer-shape">
        <img src="{{ asset('frontend/images/footer-shape.png') }}" alt="Image">
    </div>
</div>
<!-- End Footer Area -->
