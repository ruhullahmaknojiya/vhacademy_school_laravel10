@extends('front.layouts.app')

@section('frontend-content')
<style>
    .map-container {
        width: 100%;
        max-width: 800px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .contact-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .info-wrap {
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

</style>


<link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
<section class="ftco-section">
    <div class="container">
        <!-- Title -->
        <div class="row justify-content-center">
            <div class="mb-5 text-center col-md-6">
                <h2 class="heading-section">Contact Us</h2>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="mb-5 row">
                        <div class="col-md-3">
                            <div class="text-center dbox w-100">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text">
                                    <p><strong>Address:</strong> 2nd Floor, New Bus Port, <br> Palanpur, Gujarat, India - 385001</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center dbox w-100">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="text">
                                    <p><strong>Phone:</strong> <a href="tel:+1235235598" class="text-decoration-none">+91 884 946 9980</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center dbox w-100">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="text">
                                    <p><strong>Email:</strong> <a href="mailto:info@yoursite.com" class="text-decoration-none"> vhacademy@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center dbox w-100">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <div class="text">
                                    <p><strong>Website:</strong> <a href="#" class="text-decoration-none">vhmacademy.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form & Image -->
                    <div class="row no-gutters">
                        <!-- Form -->
                        <div class="col-md-7">
                            @if(Session::has('success'))
                            <h5 class="alert alert-success">{{Session::get('success') }}</h5>
                            @endif
                            <div class="p-4 contact-wrap w-100 p-md-5">
                                <h3 class="mb-4">Contact Us</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>

                                <form method="POST" action="{{ route('contact-us.insert') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                                @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="mobile_number">MobileNumber</label>
                                                <input type="number" class="form-control" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}">
                                                @error('mobile_number')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}">
                                                @error('subject')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Message</label>
                                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Enter Your message" id="message" cols="30" rows="4">
                                                {{ old('address') }}
                                                </textarea>
                                                @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <strong>ReCaptcha:</strong>
                                                {{-- @dd(env('GOOGLE_RECAPTCHA_KEY')); --}}
                                        {{-- <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}">
                                    </div>
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                            </div> --}}
                            {{-- </div> --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="mt-3 btn btn-primary">
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Image -->
                <div class="col-md-5 d-flex align-items-stretch">
                    <div class="p-5 info-wrap w-100">
                        <iframe width="100%" height="400" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14728.17324842172!2d72.42406915!3d24.17309705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c8e2af7f024c5%3A0x8e2f1c1bbfe321eb!2sPalanpur%2C%20Gujarat%2C%20India!5e0!3m2!1sen!2sin!4v1700000000000">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>



@endsection

@push('js')

<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/popper.js') }}"></script>
<script src="{{ asset('front/js/bootstrap-contact.min.js')}}"></script>
<script src="{{ asset('front/js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('front/js/main-js.js')}}"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>



@endpush
