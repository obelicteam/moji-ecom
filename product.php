<?php require_once('header.php') ?>

<?php 
if(!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit();
} else {
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }
}

foreach($result as $row) {
    $product_id = $row['id'];
    $product_name = $row['name'];
    $product_price = $row['price'];
    $product_description = $row['description'];
    $product_url_image = $row['url_image'];
}
?>

<?php
if(isset($_POST['form_add_to_cart'])) {
    if(isset($_SESSION['cart_p_id'])) {
        $arr_cart_p_id = array();
        $arr_cart_p_qty = array();
        $arr_cart_p_name = array();
        $arr_cart_p_current_price = array();

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

        $added = 0;
        for ($i = 1; $i <= count($arr_cart_p_id); $i++) {
            if($arr_cart_p_id[$i] == $_REQUEST['id']) {
                $added = 1;
                break;
            }
        }

        if ($added == 1) {
            $error_message = "Sản phẩm này đã có trong giỏ hàng, vui lòng điều chỉnh số lượng trong giỏ hàng của bạn.";
        } else {
            $i = 0;
            foreach($_SESSION['cart_p_id'] as $key => $res) {
                $i++;
            }

            $new_key = $i+1;
            $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
            $_SESSION['cart_p_qty'][$new_key] = $_POST['add_p_qty'];
            $_SESSION['cart_p_name'][$new_key] = $_POST['add_p_name'];
            $_SESSION['cart_p_current_price'][$new_key] = $_POST['add_p_current_price'] * $_SESSION['cart_p_qty'][$new_key];
            
            $success_message = "Thêm sản phẩm thành công vào giỏ hàng !";
        }
    } else {
        $_SESSION['cart_p_id'][1] = $_REQUEST['id'];
        $_SESSION['cart_p_qty'][1] = $_POST['add_p_qty'];
        $_SESSION['cart_p_name'][1] = $_POST['add_p_name'];
        $_SESSION['cart_p_current_price'][1] = $_POST['add_p_current_price'] * $_SESSION['cart_p_qty'][1];

        $success_message = "Thêm sản phẩm thành công vào giỏ hàng !";
    }
}
?>

<?php
if($error_message != "") {
    echo "<script>alert('".$error_message."')</script>";
}
if($success_message != "") {
    echo "<script>alert('".$success_message."')</script>";
    header('location: product.php?id='.$_REQUEST['id']);
}
?>

<form action="" method="post">
<main class="mains">
    <div class="container">
        <div class="row">
            <div class="blk-pview-img col-lg-6 col-md-12 col-sm-12">
                <a id="js-gall" href="<?php echo $product_url_image ?>"
                    data-toggle="lightbox" data-gallery="gallery">
                    <img id="js-pview-uri" src="<?php echo BASE_URL.$product_url_image ?>"
                        alt="<?php echo $product_name ?>" class="">
                </a>
            </div>

            <div class="blk-pview-info col-lg-6 col-md-12 col-sm-12">
                <div class="blk-code">
                    <h1 class="title"><?php echo $product_name ?></h1>
                    <div class="code">Mã sản phẩm: <?php echo $product_id ?></div>
                </div>

                <div class="blk-price">
                    <div class="product-price">
                        <input type="hidden" name = "add_p_current_price" value="<?php echo $product_price ?>">
                        <input type="hidden" name = "add_p_name" value="<?php echo $product_name ?>">
                        <span class="price"> <?php echo $product_price ?> đ</span>
                    </div>
                </div>

                <div class="blk-att" style="margin-top: 100px;" data-label="">
                    <div class="r-at-r d-flex align-items-center">
                        <label class="pull-left">Số lượng</label>
                        <div class="pull-left">
                            <div class="blk-qty d-flex justify-content-center align-items-center">
                                <div class="blk-qty-btn minus d-flex justify-content-center align-items-center">-</div>
                                <input class="blk-qty-input d-flex justify-content-center align-items-center"
                                    type="text" name="add_p_qty" id="quantity" max="73" min="1" value="1">
                                <div class="blk-qty-btn plus d-flex justify-content-center align-items-center">+</div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="r-at-r d-sm-flex align-items-center clearfix" data-label="btn">
                        <input type="submit" id="addToCart" class="btn-js-add-cart btn btn-pink" name="form_add_to_cart" value="Thêm vào giỏ hàng">
                    </div>
                    <div id="mss-alret"></div>
                </div>

                <div class="blk-policy full clearfix">
                    <div class="row">
                        <div data-label="shipping"
                            class="item col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex align-items-center">
                            <p>Giao hàng toàn quốc</p>
                        </div>
                        <div data-label="cod"
                            class="item col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex align-items-center">
                            Thanh toán chuyển khoản </div>
                        <div data-label="24h"
                            class="item col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex align-items-center">
                            Đổi trả trong 24h </div>
                    </div>
                </div>
                <div class="blk-policy policy-shipping-support full clearfix br-t-0 mt-0">
                    <div class="row">
                        <div data-label="ship_policy" class="item col-12 d-flex align-items-center pt-0 mt-0">
                            <p>Hỗ trợ ship 20k cho đơn hàng từ 300k nội thành HN, HCM<br>Hỗ trợ ship 30k cho đơn hàng từ
                                500k các khu vực khác</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12" data-label="Nội dung sản phẩm">
                <div class="blk-pview-content full clearfix">
                    <div class="blk-pview-title">Mô tả sản phẩm</div>
                    <div class="content full clearfix">
                        <p> <?php echo $product_description; ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</form>

<?php 
    require_once('footer.php');
?>