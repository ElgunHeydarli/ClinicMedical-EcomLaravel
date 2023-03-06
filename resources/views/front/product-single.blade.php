@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>{{$product->title}}</h1>
                <ul>
                    <li><a href="/">Əsas</a></li>
                    <li>{{$product->title}}</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="product-details-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <ul class="products-details-image-slides owl-theme owl-carousel" data-slider-id="1">
                            @foreach ($product->images as $item)
                                <li><img src="{{$item}}" alt="{{$product->title}}"></li>
                            @endforeach
                        </ul>

                        <div class="owl-thumbs products-details-image-slides-owl-thumbs" data-slider-id="1">
                            @foreach ($product->images as $item)
                                <div class="owl-thumb-item"><img src="{{$item}}" alt="{{$product->title}}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc">

                            <?php echo "<pre>"; ?>
                            <?php print_r($product->getCategory); ?>
                            <?php echo "</pre>"; ?>
                        <h3></h3>
                            </pre>
                        <div class="price">
                            <span class="new-price">100azn</span>
                            <span class="old-price">46 azn</span>
                        </div>

                        <table class="table table-bordered">
                            <tbody>
                            @foreach(\App\Models\Product_Specifications::where(['product_id'=>$product->id]) as $product_spec)
                            <tr>
                                <td>{{$product_spec->key}}</td>
                                <td>{{$product_spec->value}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Çatdırılma</td>
                                <td>Ödənişsiz</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="buy-checkbox-btn">

                            <div class="item">
                                <a href="cart.html" class="default-btn">Səbətə at</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="related-products">
            <div class="container">
                <div class="section-title">
                    <h2>Bənzər məhsullar</h2>
                </div>
                <div class="products-slides owl-carousel owl-theme">
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets\img\products\1.jpg"
                                                             alt="image"></a>
                            <div class="new">Endirimli məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Kamera adi</a></h3>
                            <div class="price">
                                <span class="new-price">39 azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets/img/products/2.jpg"
                                                             alt="image"></a>
                            <div class="sale">Yeni məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Məhsul adı</a></h3>
                            <div class="price">
                                <span class="new-price">99 Azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets\img\products\1.jpg" alt="image"></a>
                            <div class="new">Endirimli məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Kamera adi</a></h3>
                            <div class="price">
                                <span class="new-price">39 azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets/img/products/2.jpg" alt="image"></a>
                            <div class="sale">Yeni məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Məhsul adı</a></h3>
                            <div class="price">
                                <span class="new-price">99 Azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets\img\products\1.jpg" alt="image"></a>
                            <div class="new">Endirimli məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Kamera adi</a></h3>
                            <div class="price">
                                <span class="new-price">39 azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets/img/products/2.jpg" alt="image"></a>
                            <div class="sale">Yeni məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Məhsul adı</a></h3>
                            <div class="price">
                                <span class="new-price">99 Azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets\img\products\1.jpg" alt="image"></a>
                            <div class="new">Endirimli məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Kamera adi</a></h3>
                            <div class="price">
                                <span class="new-price">39 azn</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-products-box">
                        <div class="image">
                            <a href="#" class="d-block"><img src="assets/img/products/2.jpg" alt="image"></a>
                            <div class="sale">Yeni məhsullar</div>
                            <div class="buttons-list">
                                <a class="btn btn-primary" href="single-products.html" role="button">Ətraflı</a>
                                <a class="btn btn-primary" href="#" role="button">Səbətə at</a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="#">Məhsul adı</a></h3>
                            <div class="price">
                                <span class="new-price">99 Azn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('front.widgets.facility')
@endsection
