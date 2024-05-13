@extends('frontend.layouts.app')

@section('title', 'Welcome to Garage88')

@section('content')
    {{-- Hero Section --}}
    @include('frontend.common.hero')

    {{-- About Us --}}
    @include('frontend.common.about-section')

    {{-- Counter Section --}}
    @include('frontend.common.counter-section')

    {{-- What we Do --}}
    @include('frontend.common.wedo-section')

    {{-- Dry Clean --}}
    @include('frontend.common.dry-clean')

    {{-- Why Choose --}}
    @include('frontend.common.why-choose')

    {{-- Appointment --}}
    @include('frontend.common.appointment')

    {{-- Contact Us --}}
    @include('frontend.common.contact-us')
@endsection
