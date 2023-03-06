@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')


    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>{{ $blog_single->title }}</h1>
                <ul>
                    <li><a href="/">Əsas səhifə</a></li>
                    <li>{{ $blog_single->title }}</li>
                </ul>
            </div>
        </div>
    </section>

<section class="blog-details-area ptb-70">
  <div class="container">
      <div class="row">
          <div class="blog-details-desc">
              <div class="article-image">
                  <img src="{{ $blog_single->img }}" alt="{{ $blog_single->title }}" style="width: 100%">
              </div>
              <div class="article-content">
                  <div class="details-content">

                      <h3>
                          {{ $blog_single->title }}
                      </h3>
                      <div class="post-meta">
                          {{ $blog_single->created_at->format('j F Y')}}
                      </div>
                      <p>{!! $blog_single->content !!}</p>
                  </div>


              </div>


          </div>
      </div>
  </div>
</section>

@include('front.widgets.facility')

@endsection
