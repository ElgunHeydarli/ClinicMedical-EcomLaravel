    @extends('front.layouts.master')

    @section('title') {{ $setting->title }} @endsection
    @section('description') {{ $setting->description }} @endsection

    @section('content')

        <section class="main-banner-with-categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="megamenu-container">
                        <div class="megamenu-title">
                            Kateqoriyalar
                        </div>
                        <div class="megamenu-category">
                            <ul class="nav">
                                @foreach (\App\Models\ProductCategory::where(['parent_id'=>null])->get() as $category)
                                <li class="nav-item">
                                    <a href="{{ route('product.category', $category->slug) }}" class="nav-link">{{$category->title}}<i class="flaticon-next"></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach (\App\Models\ProductCategory::where(['parent_id'=>$category->id])->get() as $subcategory)
                                        <li class="nav-item"><a href="{{ route('product.category', $subcategory->slug) }}" class="nav-link">{{$subcategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="home-slides-three owl-carousel owl-theme">
                        @php $i=1; @endphp
                        @foreach ($slider as $item)
                        <div class="banner-area bg-{{$i}}" style="background-image: url('{{ $item->image }}'); height:523px">
                            <div class="banner-content">
                                <span class="sub-title">{{$item->title}}</span>
                                <h1>{!! $item->sub_title !!}</h1>
                                <p>{!! $item->text !!}</p>
                                <a href="#" class="default-btn"><i class="flaticon-trolley"></i> Ətraflı</a>
                            </div>
                        </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </section>


        <br><br><br>
        <section class="products-area pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>Ən çox satılan məhsullar</h2>
                </div>
                <div class="products-slides owl-carousel owl-theme">
                    @foreach ($bestsellers as $item)
                        @include('front.widgets.product')
                    @endforeach
                </div>
            </div>
        </section>

        <section class="products-area pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>Endirimdə olan məhsullar</h2>
                </div>
                <div class="products-slides owl-carousel owl-theme">
                    @foreach ($bestsellers as $item)
                        @include('front.widgets.product')
                    @endforeach
                </div>
            </div>
        </section>

        <section class="feedback-area ptb-70 bg-f7f8fa">
            <div class="container">
                <div class="section-title">
                    <h2>Müştərilər bizim haqqımızda nə düşünür?</h2>
                </div>
                <div class="feedback-slides-two owl-carousel owl-theme">
                    @foreach(\App\Models\Comment::where(['status'=>1])->get() as $comment)
                    <div class="single-feedback-box">
                        <p>{!! $comment->comment !!}</p>
                        <div class="client-info">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" alt="image">
                                <div class="title">
                                    <h3>{{$comment->name_surname}}</h3>
                                    <span>{{ $item->position }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @include('front.widgets.facility')
        <br><br><br>
        <section class="blog-area pb-40">
            <div class="container">
                <div class="section-title">
                    <h2>Kampaniyalar</h2>
                </div>
                <div class="row">
                    @foreach(\App\Models\Blog::where(['status'=>1])->get() as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="{{ route('blog.single', $blog->slug) }}" class="d-block"><img src="{{  $blog->img }}" alt="{{  $blog->title }}"></a>
                            </div>
                            <div class="post-content">
                                <h3><a href="{{ route('blog.single', $blog->slug) }}">{{$blog->title}}</a></h3>
                                <ul class="post-meta align-items-center d-flex">

                                    <li>{{$blog->date}}</li>
                                </ul>
                                <a class="btn btn-primary" href="{{ route('blog.single', $blog->slug) }}" role="button">Ətraflı</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
