@extends('layouts.app')

@section('title', '首页')

@push('style')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
<header class="masthead" style="background-image: url('./assets/images/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>歌谣 <small class="subtitle">拼音 + 诗歌</small></h1>
                    <span class="subheading"> Make poetry learning easier！</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="card-group">
        <div class="card">
            <img class="card-img-top" src="{{ asset('assets/images/card-demo.jpg') }}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="{{ asset('assets/images/card-demo.jpg') }}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="{{ asset('assets/images/card-demo.jpg') }}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <!-- Pager -->
    <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
    </div>
</div>
@endsection
