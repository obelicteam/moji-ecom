<?php 
ob_start();
session_start();
include("admin/config/config.php");
$error_message = "";
$success_message = "";

$cart_items_no = 0;
if(isset($_SESSION["cart_p_id"])){

    $i = 0;
    foreach($_SESSION['cart_p_id'] as $key => $value) {
        $i++;
        $arr_cart_p_id[$i] = $value;
    }

    $i = 0;
    foreach($_SESSION['cart_p_qty'] as $key => $value) {
        $i++;
        $arr_cart_p_qty[$i] = $value;
    }

    $i = 0;
    foreach($_SESSION['cart_p_name'] as $key => $value) {
        $i++;
        $arr_cart_p_name[$i] = $value;
    }

    $i = 0;
    foreach($_SESSION['cart_p_current_price'] as $key => $value) {
        $i++;
        $arr_cart_p_current_price[$i] = $value;
    }

    $cart_items_no = count($arr_cart_p_id);
}
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
                        <form class="form-search" action="<?php echo BASE_URL.'/search.php' ?>" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s" placeholder="Tìm kiếm sản phẩm">
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
                                    <span class="count d-flex align-items-center justify-content-center">
                                        <?php 
                                            if (!isset($_SESSION['cart_p_id'])) {
                                                echo 0;
                                            } else {
                                                echo $cart_items_no;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div id="js-rs-mini-cart" class="mini-shopping-cart">
                                    <?php 
                                        if ($cart_items_no == 0) {
                                    ?>
                                    <p class="mini-shopping-cart__empty-message">Bạn chưa có sản phẩm trong giỏ hàng</p>
                                    <?php } else { ?>
                                    <?php 
                                        $i = 0;
                                        $total_price = 0;
                                        for($i = 1; $i <= count($arr_cart_p_id); $i++) { 
                                            echo "<script>console.log(".$arr_cart_p_id[$i].")</script>"
                                    ?>
                                    <ul class="mini-list-product">
                                        <li class="shopping-cart-item d-inline-flex">
                                            <figure class="item-image">
                                                <a href="/bang-do-co-tay-funny-vibes-big-eyes-long-xu-tim-p37908454.html" title="Băng đô cổ tay Funny vibes big eyes lông xù - Tím">
                                                    <img class="img-responsive" src="https://pos.nvncdn.com/cba2a3-7534/ps/20240405_7fsFlPaARq.jpeg" alt="Băng đô cổ tay Funny vibes big eyes lông xù - Tím">
                                                </a>
                                            </figure>
                                            <div class="item-content">
                                                <h4 class="item-title">
                                                    <a href="/" title="<?php echo $arr_cart_p_name[$i]; ?>  ">
                                                        <?php echo $arr_cart_p_name[$i]; ?>                                                    
                                                    </a>
                                                </h4>
                                                <span class="item-price">
                                                    Đơn giá: <?php echo $arr_cart_p_current_price[$i]; ?>                                                    
                                                </span>
                                            </div>
                                                <div class="item-action">
                                                    <span class="item-quantity">x<?php echo $arr_cart_p_qty[$i]; ?></span>
                                                    <div class="js-remove-item">
                                                        <a href="<?php echo BASE_URL.'/card-item-delete.php?id='.$arr_cart_p_id[$i]; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php 
                                        $total_price = $total_price + $arr_cart_p_current_price[$i];
                                    } ?>
                                    
                                    <div class="mini-shopping-cart__bottom">
                                        <div class="shopping-cart__bottom-total d-flex justify-content-between">
                                            <span>Thành tiền</span>
                                            <span class="shopping-cart-total-amount"><?php echo $total_price ?></span>
                                        </div>
                                        <a class="btn btn-lg btn-pink full" href="<?php echo BASE_URL.'/cart.php' ?>">Xem giỏ hàng</a>
                                    </div>
                                    <?php } ?>
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
                        ?>
                            <li class='has-dropdown mr-3'> 
                                <a href="<?php echo BASE_URL.'/product-category.php?id='.$row['id']; ?>"> <?php echo $row['name']; ?> </a>
                            </li>
                        <?php    
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