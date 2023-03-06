@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')


<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Xəbərlər</h2>
            <ul>
                <li><a href="index.html">Əsas</a></li>
                <li>Xəbərlər</li>
            </ul>
        </div>
    </div>
</div>

<section class="blog-area bg-color pt-50 pb-50">
    <div class="container">
        <div class="row">
          @foreach ($blog as $item)
          <div class="col-lg-4 col-md-6">
            <div class="single-blog">
              <div class="blog-image">
                <a href="{{ route('blog.single', $item->slug) }}"><img src="{{  $item->img }}" alt="{{  $item->title }}"></a>
              </div>
              <div class="blog-content">
                <h3>
                  <a href="{{ route('blog.single', $item->slug) }}">{{  $item->title }}</a>
                </h3>
                <div class="post-meta">
                  <a href="{{ route('blog.single', $item->slug) }}">Admin</a> / {{ $item->created_at->format('j F Y')}}
                </div>
                <p>{!! Str::limit($item->content, 120) !!}</p>
              </div>
            </div>
          </div>
          @endforeach

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <a href="{{$blog->previousPageUrl()}}" class="prev page-numbers">
                        <i class='flaticon-left-arrow'></i>
                    </a>

                    @for ($i = 1; $i <= $blog->lastPage(); $i++)

                    <a @if ($blog->currentPage()!=$i) href="{{ $blog->url($i) }}" @else href="javascript:void(0)" @endif class="page-numbers">
                      @if($blog->currentPage()==$i)
                      <span class="page-numbers current" aria-current="page">{{$i}}</span>
                      @else
                      {{$i}}
                      @endif
                    </a>

                    @endfor
                    
                    <a href="{{$blog->nextPageUrl()}}" class="next page-numbers">
                        <i class='flaticon-right-arrow'></i>
                    </a>
                </div>
            </div>



        </div>
    </div>
</section>



@endsection