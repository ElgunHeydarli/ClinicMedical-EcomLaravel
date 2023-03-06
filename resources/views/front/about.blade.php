@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')


<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Haqqımızda</h2>
            <ul>
                <li><a href="index.html">Əsas</a></li>
                <li>Haqqımızda</li>
            </ul>
        </div>
    </div>
</div>

<section class="story-area ptb-50">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="story-image" style="background-image: url('{{ $setting->about_img }}')"></div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="story-content">
                    <h3>{{ $setting->about_title }}</h3>
                    <b>{!! $setting->about_description !!}</p>
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
                    <h3>{{ $setting->about_title1 }}</h3>
                    <b>{!! $setting->about_description1 !!}</b>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="mission-image" style="background-image: url('{{ $setting->about_img1 }}');"></div>
            </div>
        </div>
    </div>
</section>

<section class="faqs-area ptb-50">
    <div class="container">
        <div class="section-title">
            <h2>Ən Çox Soruşulan Suallar</h2>
        </div>
        <div class="tab faqs-list-tab">
           
            <div class="tab_content">
                <div class="tabs_item">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            @foreach ($question_answer as $item)
                            <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)">
                                    <i class='bx bx-plus'></i>
                                    {{$item->question}}
                                </a>
                                <p class="accordion-content show">
                                    {{$item->answer}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
              
            </div>
        </div>
   
    </div>
</section>



@endsection