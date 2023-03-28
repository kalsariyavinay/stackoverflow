@extends('layouts.app')
@section('content')
    <section>
        <div class="card card-default">
            <div class="card-body text-center">
                <form action="{{ route('razorpay.store') }}" method="POST" id="razorpay-payment-button">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_o57CRAhIBRlsrN"
                        data-amount="{{ $package->price * 100 }}" data-name="Vk Packaging" data-description="Razorpay payment"
                        data-image="/images/logo-icon.png" data-prefill.name="{{ Auth::user()->name }}"
                        data-prefill.email="{{ Auth::user()->email }}" data-theme.color="#ff7529"></script>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </form>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#razorpay-payment-button").submit();
        });
    </script>
@endsection
