@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                @if(!empty($single_category))
                    <h2> {{ $single_category->title }} </h2>
                    <ul>
                        <li><a href="/">Əsas</a></li>
                        <li> {{ $single_category->title }}  </li>
                    </ul>
                @else
                    <h2> Axtarış Nəticəsi </h2>
                    <ul>
                        <li><a href="/">Əsas</a></li>
                        <li> Axtarış Nəticəsi  </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <section class="products-area ptb-70">
        <div class="container">
            <div class="drodo-grid-sorting row align-items-center">
                <div class="col-lg-6 col-md-6 result-count">
                    <p> <span class="count">{{count($products)}}</span> məhsul mövcuddur</p>

                </div>
                <div class="col-lg-6 col-md-6 ordering">
                    <div class="select-box">
                        <label>Axtarış:</label>
                        <select>
                            <option>Ucuzdan-Bahaya</option>
                            <option>Bahadan-Ucuza</option>
                            <option>Yeni məhsullar</option>
                            <option>Endirimli məhsullar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    @include('front.widgets.product')
                </div>
                @endforeach

                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area text-center">
                        <a href="{{$products->previousPageUrl()}}" class="prev page-numbers"><i class='bx bx-chevrons-left'></i></a>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)

                            <a @if ($products->currentPage()!=$i) href="{{ $products->url($i) }}" @else href="javascript:void(0)" @endif class="page-numbers">
                                @if($products->currentPage()==$i)
                                    <span class="page-numbers current" aria-current="page">{{$i}}</span>
                                @else
                                    {{$i}}
                                @endif
                            </a>

                        @endfor
                        <a href="{{$products->nextPageUrl()}}" class="next page-numbers"><i class='bx bx-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="facility-area bg-f7f8fa pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-free-shipping"></i>
                        </div>
                        <h3>Çatdırılma xidməti</h3>
                        <p>Ünvan sizdən, çatdırılma bizdən</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-headset"></i>
                        </div>
                        <h3>Canlı dəstək 24/7</h3>
                        <p>Suallarınızın cabaını bizdən tapın</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-secure-payment"></i>
                        </div>
                        <h3>Təhülkəsiz ödəmə</h3>
                        <p>100% təhlükəsiz ödəmə sistemi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3 col-6">
                    <div class="single-facility-box">
                        <div class="icon">
                            <i class="flaticon-return-box"></i>
                        </div>
                        <h3>Geri qaytarma</h3>
                        <p>10 gün ərzində </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
