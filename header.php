<?php 
ob_start();
session_start();
include("admin/config/config.php");
$error_message = "";
$success_message = "";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Moji - Quà tặng và Phụ kiện kiểu mới</title>

    <link rel="stylesheet" href="asset/bootstrap-4.3.1-dist/css/bootstrap.min.css" type="text/css">
    <script src="asset/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="asset/fontAwesome/font-awesome-4.7.0.min.css" type="text/css">

    <script src="asset/jquery/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="asset/moji/css/style.css" type="text/css">
    <link rel="stylesheet" href="asset/moji/css/define.css" type="text/css">
    <link rel="stylesheet" href="asset/moji/css/responsive.css" type="text/css">
    <link rel="stylesheet" href="asset/moji/css/animate.css" type="text/css">
    <link rel="stylesheet" href="asset/moji/css/plugin.css" type="text/css">
</head>

<body>
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
                        <a href="<?php echo BASE_URL; ?>" class="logo">
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
                                <li><a href="/user/signin">Đăng nhập</a></li>
                            </ul>

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
            <div class="container js-container">
                <div class="row">
                    <ul class="col flex justify-content-start">
                        <?php 
                            $statement = $pdo->prepare("SELECT * FROM tbl_category");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $row) {
                                echo "<li class='has-dropdown mr-3'> <a href='/'>".$row['name']."</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="nava-mask d-lg-none"></div>
        </div>
    </header>
</body>

</html>