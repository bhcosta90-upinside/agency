@extends('layouts.frontend')

@section('content')

<div class="contact-form">
    <h5>{{__('Get in Touch')}}</h5>
    <!-- Contact Form -->
    <form action="{{ route('api.contact') }}" id="frmContact" method="post">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="group">
                    <input type="text" name="name" id="name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>{{ __('Name') }}</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="group">
                    <input type="email" name="email" id="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>{{ __('Email') }}</label>
                </div>
            </div>
            <div class="col-12">
                <div class="group">
                    <input type="text" name="subject" id="subject" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>{{ __('Subject') }}</label>
                </div>
            </div>
            <div class="col-12">
                <div class="group">
                    <textarea name="message" id="message" required></textarea>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>{{ __('Message') }}</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn original-btn">{{ __('Send Message') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection