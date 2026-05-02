<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">FashionHub</a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="{{ route('home') }}" class="@if(Route::currentRouteName() === 'home') active @endif">Home</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('products') }}" class="@if(Route::currentRouteName() === 'products') active @endif">Products</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('about') }}" class="@if(Route::currentRouteName() === 'about') active @endif">About Us</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('contact') }}" class="@if(Route::currentRouteName() === 'contact') active @endif">Contact Us</a>
                        </li>
                        <li class="scroll-to-section">
                            <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> My Cart</a>
                        </li>
                    </ul>
                    <!-- ***** Menu End ***** -->

                    <!-- ***** Menu Trigger ***** -->
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu Trigger End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
