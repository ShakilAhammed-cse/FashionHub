@extends('layouts.app')

@section('title', 'Home - FashionHub')

@section('content')
<!-- ***** Banner Area Start ***** -->
<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <p>New Arrivals</p>
                    <h4>Discover Amazing Products</h4>
                    <div class="left-buttons">
                        <div class="button">
                            <a href="{{ route('products') }}">Purchase Now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-image">
                    <img src="{{ asset('assets/images/banner-right-image.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Men's Latest</h2>
                    <p>Check out all of our products that are new arrivals</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <!-- Products will be displayed here -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Men Area Ends ***** -->
@endsection

@push('styles')
<!-- Add any page-specific styles here -->
@endpush

@push('scripts')
<!-- Add any page-specific scripts here -->
@endpush
