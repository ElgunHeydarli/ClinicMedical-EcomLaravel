@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')

<section class="checkout-area ptb-50">
    <div class="container">
        <form method="POST" action="{{ route('order.post') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-md-12">
                     @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                     @endif
                    <div class="billing-details">
                        <h3 class="title">Çatdırılma ünvanı</h3>
                        <div class="row">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Adınız <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Soyadınız <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="surname">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Əlaqə nömrəsi <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Rayon <span class="required">*</span></label>
                                    <div class="select-box">
                                        <select name="city">
                                            <option value="Bakı">Bakı</option>
                                            <option value="Sumqayit">Sumqayit</option>
                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Ünvan <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Ünvan haqqında əlavə məlumat <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address_2">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Qeyd <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="note">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Ödəmə <span class="required">*</span></label>
                                    <div class="select-box">
                                        <select name="payment_method">
                                            <option value="Online ödəmə">Online ödəmə</option>
                                            <option value="Qapıda ödəmə">Qapıda ödəmə</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="default-btn">
                               Sifarişi tamamla
                                <span></span>
                            </button>
                         
                        
                        </div>
                    </div>
                </div>
           
            </div>
        </form>
    </div>
</section>

@endsection