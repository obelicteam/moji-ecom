<header class="header sty-none">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col text-right">
                </div>
            </div>
        </div>
    </div>
    <div class="header-content top">
        <div class="container">
            <div class="row align-center">
                <div class="head-col-left col-lg-3 col-12">
                    <div class="js-menu-svg d-inline-flex align-items-center  justify-content-center d-lg-none">
                        <img src="https://web.nvnstatic.net/tp/T0299/img/svg/menu-trans.svg?v=3" alt="Open navagation">
                    </div>

                    <a href="/" class="logo">
                        <img src="https://pos.nvncdn.com/cba2a3-7534/store/20240219_WBAfwd3B.png" alt="Logo">
                    </a>
                </div>
                <div class="head-col-center col-lg-6 d-none d-lg-block">
                    <form class="form-search" action="/search" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Tìm kiếm sản phẩm">
                            <span class="input-group-btn">
                                <button class="btn btn-pink" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <div class="research d-lg-block">
                        <p></p>
                    </div>
                </div>
                <div class="head-col-right col-lg-3 col-12">
                    <div class="header-right d-flex align-items-start">
                        <ul class="header-user d-none d-md-block">
                            <li><a href="/user/signin">Đăng nhập |</a></li>
                            <li><a href="/user/signup">Đăng ký</a></li>
                        </ul>

                        <a href="/user/signin" class="js-open-user d-md-none">
                            <img src="https://web.nvnstatic.net/tp/T0299/img/svg/user.svg?v=3" alt="Đăng nhập">
                        </a>

                        <div class="count-cart" title="Giỏ hàng">
                            <div class="count-cart-icon">
                                <span class="count d-flex align-items-center justify-content-center">0</span>
                            </div>
                            <div id="js-rs-mini-cart" class="mini-shopping-cart">
                                <p class="mini-shopping-cart__empty-message">Bạn chưa có sản phẩm trong giỏ hàng</p>
                            </div>
                            <!----- end mini-cart ---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="fr-mobile container d-block d-lg-none">
            <form class="form-search xs" action="/search" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Tìm kiếm sản phẩm">
                    <span class="input-group-btn">
                        <button class="btn btn-pink" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="research d-lg-block">
            </div>
        </div>
    </div>

    <div class="navagation">
        <div class="js-menu-close d-flex align-items-center justify-content-between d-lg-none">
            <span><img src="https://web.nvnstatic.net/tp/T0299/img/svg/menu.svg?v=3" alt="Close navagation">Menu</span>
            <img src="https://web.nvnstatic.net/tp/T0299/img/svg/close.svg?v=3" alt="Close navagation">
        </div>

        <div class="container js-container">
            <div class="row">
                <ul class="col flex justify-content-start">
                    <?php 
                        require "admin/config.php";
                        $categories = get_all_categories();
                        for($i = 0; $i < count($categories); $i++){
                            echo "<li class='has-dropdown mr-3'> <a href='/'>".$categories[$i]['name']."</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="nava-mask d-lg-none"></div>
    </div>
</header>