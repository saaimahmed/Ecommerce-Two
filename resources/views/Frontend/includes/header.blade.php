<header class="header navbar-area">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">

        </div>
    </nav>
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @if(Session::get('customer_id'))
                        <div class="user">
                            <i class="lni lni-user"></i>
                            {{ Session::get('customer_name') }}
                        </div>
                        @endif
                        <ul class="user-login">
                            @if(Session::get('customer_id'))

                                <li><a href="{{ route('customer-dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('customer-logout') }}">Logout</a></li>
                            @else
                                <li>
                                    <a href="{{ route('customer-login') }}">Sign In</a>
                                </li>
                                <li>
                                    <a href="{{ route('customer-register') }}">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    {{--logo--}}
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('/') }}front-assets/assets/images/logo/logo.svg" alt="Logo">
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">

                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">

                                    </select>
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>phone:
                                <span>(+008) 1686794624</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{count($cartProduct)}}</span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count($cartProduct)}} Items</span>
                                        <a href="{{ route('show-card') }}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @php( $total = 0 )
                                        @foreach($cartProduct as $cartProduct)
                                        <li>

                                            <a href="" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>

                                            <div class="cart-img-head">
                                                <a class="cart-img" href=""><img src="{{ asset($cartProduct->attributes->image) }}" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="">{{ $cartProduct->name }}  - ({{ $cartProduct->price }} *{{ $cartProduct->quantity }} ) </a></h4>
                                                <p class="quantity"> <span class="amount">{{ $cartProduct->price * $cartProduct->quantity }}</span></p>
                                            </div>
                                        </li>
                                            @php( $total = $total + ($cartProduct->price * $cartProduct->quantity) )
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                          <span>Sub Total</span>
                                            <span class="total-amount">Tk. {{ number_format($total) }}</span>
                                        </div>
                                        <div class="total">
                                          <span>Tax Amount</span>
                                            @php( $tax = round($total*15) / 100)
                                            <span class="total-amount">Tk. {{ number_format($tax) }}</span>
                                        </div>
                                        <div class="total">
                                          <span>Shipping Cost</span>
                                            @php( $shipping = 100)
                                            <span class="total-amount">Tk. {{ number_format($shipping) }}</span>
                                        </div>
                                        <div class="total">
                                          <span>Total Payable</span>
                                            @php($grandTotal = $total + $tax + $shipping)
                                            <span class="total-amount">Tk. {{ number_format($grandTotal) }}</span>
                                        </div>
                                        <div class="button">
                                            <a href="{{ route('checkout') }}" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                                <li><a href="{{ route('product-category',$category->id) }}">{{ $category->category_name }}
                                        @if(count($category->subcategory) > 0)
                                            <i class="lni lni-chevron-right"></i>
                                        @endif
                                    </a>

                                    @if(count($category->subcategory) > 0)
                                        <ul class="inner-sub-category">
                                            @foreach($category->subcategory as $subCategory)
                                                <li><a href="{{ route('product-sub-category',$subCategory->id) }}">{{ $subCategory->sub_category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach


                        </ul>
                    </div>


                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" aria-label="Toggle navigation">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</header>
@push('js')

@endpush
