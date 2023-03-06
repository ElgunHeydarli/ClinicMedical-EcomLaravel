<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <ul class="top-header-contact-info">
                    <li><i class='bx bx-phone-call'></i> <a href="tel:+99450 830 40 30">050 830 40 30</a></li>
                    <li><i class='bx bx-map'></i> <a href="#" target="_blank">Bakı ş, Nizami rayonu</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-5">
                <ul class="top-header-menu">

                    <li><a href="#"><span class="iconify" data-icon="akar-icons:facebook-fill" data-inline="false"></span></a></li>

                    <li><a href="#"><span class="iconify" data-icon="akar-icons:instagram-fill" data-inline="false"></span></a></li>
                    <li><a href="#"><span class="iconify" data-icon="bx-bxl-whatsapp" data-inline="false"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="navbar-area">
    <div class="drodo-responsive-nav">
        <div class="container">
            <div class="drodo-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img class="ser" src="1.png" alt="logo">

                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="drodo-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img class="ser" src="1.png" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="index.html" class="nav-link active">Əsas</a>

                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Haqqımızda <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li style="text-align:center;" class="nav-item"><a href="about.html" class="nav-link">Biz kimik</a>

                                <li style="text-align:center;" class="nav-item"><a href="faq.html" class="nav-link">Sual cavab</a>

                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Məhsullar <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li style="text-align:center;" class="nav-item"><a href="product.html" class="nav-link">Endirimli məhsullar</a>

                                </li>
                                <li style="text-align:center;" class="nav-item"><a href="product.html" class="nav-link">Bütün məhsullar</a>

                                </li>
                            </ul>
                        </li>
                        </li>


                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Kateqoriyalar <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Models\ProductCategory::where(['parent_id'=>null])->get() as $category)
                                <li class="nav-item"><a href="{{ route('product.category', $category->slug) }}" class="nav-link">{{$category->title}}<i class='bx bx-chevron-right'></i></a>
                                    <ul class="dropdown-menu">
                                        @foreach (\App\Models\ProductCategory::where(['parent_id'=>$category->id])->get() as $subcategory)
                                        <li class="nav-item"><a href="{{ route('product.category', $subcategory->slug) }}" class="nav-link">{{$subcategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="nav-item"><a href="blog.html" class="nav-link">Kampaniyalar</a></li>
                        <li class="nav-item"><a href="contact.html" class="nav-link">Bizimlə əlaqə</a></li>
                    </ul>
                    <div class="others-option">
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="#" data-toggle="modal" data-target="#shoppingCartModal"><i
                                        class='bx bx-shopping-bag'></i><span>4</span></a>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>
            <div class="search-overlay-form">
                <form>
                    <input type="text" class="input-search" placeholder="Axtarış edin ...">
                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
