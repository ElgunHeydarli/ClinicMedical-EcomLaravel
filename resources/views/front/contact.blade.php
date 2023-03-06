@extends('front.layouts.master')

@section('title') {{ $setting->title }} @endsection
@section('description') {{ $setting->description }} @endsection

@section('content')


<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Bizimlə əlaqə</h2>
            <ul>
                <li><a href="index.html">Əsas</a></li>
                <li>Bizimlə əlaqə</li>
            </ul>
        </div>
    </div>
</div>

<section class="contact-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form">
                    <div class="tile">
                        <h3>Bizə mesaj yazın :)</h3>
                      
                    </div>
                    <form method="POST" action="{{ route('send.message') }}" id="contactForm">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Mesajınız*</label>
                                    <textarea name="message" id="message" cols="30" rows="5" required=""
                                        data-error="Please enter your message" class="form-control"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Ad və Soyadınız*</label>
                                    <input type="text" name="name" id="name" class="form-control" required=""
                                        data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email address*</label>
                                    <input type="email" name="email" id="email" class="form-control" required=""
                                        data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Əlaqə nömrəsi*</label>
                                    <input type="text" name="tel" id="phone_number" class="form-control"
                                        required="" data-error="Please enter your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">
                                   Göndər
                                    <span></span>
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="contact-information">
                    <h3>Əlaqə məlumatlarımız</h3>
                    <ul class="contact-list">
                        <li><i class='bx bx-map'></i> Ünvan: <span>{{ $setting->address }}</span></li>
                        <li><i class='bx bx-phone-call'></i> Əlaqə nömrəsi: <a href="tel:{{ $setting->tel }}">{{ $setting->tel }}</a>
                        </li>
                        <li><i class='bx bx-envelope'></i> Email: <a>{{ $setting->email }}</span></a>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
</section>

<div id="map">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.3360133971805!2d49.86493721489406!3d40.401406464496084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d459304b345%3A0x9914db6cff9c04da!2zMTEgQcWfxLFxIE1vbGxhIEPDvG3JmSwgQmFrxLEsINCQ0LfQtdGA0LHQsNC50LTQttCw0L0!5e0!3m2!1sru!2s!4v1621171096407!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>


@endsection