@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')



<section class="story-area ptb-50">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="story-image" style="background-image: url('{{ $service_single->content_image_1 }}')"></div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="story-content">
                    <h3>{{ $service_single->content_title_1 }}</h3>
                    <b>{!! $service_single->content_description_1 !!}</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="mission-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="mission-content">
                    <h3>{{ $service_single->content_title_2 }}</h3>
                    <b>{!! $service_single->content_description_2 !!}</b>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="mission-image" style="background-image: url('{{ $service_single->content_image_2 }}');"></div>
            </div>
        </div>
    </div>
</section>








@endsection