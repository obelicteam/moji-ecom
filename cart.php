<?php require_once('header.php');?>
<?php 
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
    $total_price = 0;
}
?>
<div class="container">
    <div class="row">
        <div class="cart-page col-12">
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th width="20%"><i class="d-none fa fa-pink fa-1x5 fa-check-square"></i> Sản phẩm</th>
                        <th width="25%" class="text-center">Mô tả</th>
                        <th width="15%" class="text-center d-none d-md-table-cell">Đơn giá</th>
                        <th width="15%" class="text-center d-none d-md-table-cell">Số lượng</th>
                        <th width="15%" class="text-center d-none d-md-table-cell">Tổng</th>
                        <th width="10%" class="text-center d-none d-md-table-cell">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    for($i = 1; $i <= $cart_items_no; $i++) {
                        $total_price = $total_price + $arr_cart_p_current_price[$i];
                    ?>
                    <tr class="cart-item" data-psid="37908435">
                        <td class="cart-img">
                            <div class="d-flex align-items-center">
                                <i class="d-none fa fa-pink fa-1x5 fa-check-square"></i>
                                <a href="<?php echo BASE_URL.'/product.php?id='.$arr_cart_p_id[$i]; ?>"
                                    title="Băng đô make up Capybara basic face nơ lớn - Be">
                                    <img data-sizes="auto" class="lazyautosizes ls-is-cached lazyloaded"
                                        src="https://pos.nvncdn.com/cba2a3-7534/ps/20240405_phdqJCBGeL.jpeg"
                                        data-src="https://pos.nvncdn.com/cba2a3-7534/ps/20240405_phdqJCBGeL.jpeg"
                                        alt="Băng đô make up Capybara basic face nơ lớn - Be" sizes="105px">
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo BASE_URL.'/product.php?id='.$arr_cart_p_id[$i]; ?>"
                                title="<?php echo $arr_cart_p_name[$i]; ?>">
                                <?php echo $arr_cart_p_name[$i]; ?>
                            </a>
                            <div class="d-block d-md-none">
                                <p>
                                    <strong class="d-block"><?php echo $arr_cart_p_current_price[$i]; ?>đ</strong>
                                </p>
                                <p>
                                </p>
                                <div class="blk-qty d-flex justify-content-center align-items-center">
                                    <div data-label="cart"
                                        class="blk-qty-btn minus d-flex justify-content-center align-items-center">-
                                    </div>
                                    <input
                                        class="updateCart blk-qty-input d-flex justify-content-center align-items-center"
                                        type="text" data-psid="37908435" max="37" min="1" value="<?php echo $arr_cart_p_qty[$i]; ?>">
                                    <div data-label="cart"
                                        class="blk-qty-btn plus d-flex justify-content-center align-items-center">+
                                    </div>
                                </div>
                                <p></p>
                                <p>
                                    <strong><?php echo $arr_cart_p_current_price[$i]; ?>đ</strong>
                                </p>
                                <a class="remove-cart" href="javascript:void(0)" data-psid="37908435">Xóa</a>
                            </div>
                        </td>
                        <td class="text-center d-none d-md-table-cell">
                            <strong class="d-block"><?php echo $arr_cart_p_current_price[$i]; ?>đ</strong>
                        </td>
                        <td class="text-center d-none d-md-table-cell">
                            <div class="blk-qty d-flex justify-content-center align-items-center">
                                <div data-label="cart"
                                    class="blk-qty-btn minus d-flex justify-content-center align-items-center">-</div>
                                <input class="updateCart blk-qty-input d-flex justify-content-center align-items-center"
                                    type="text" data-psid="37908435" max="37" min="1" value="1">
                                <div data-label="cart"
                                    class="blk-qty-btn plus d-flex justify-content-center align-items-center">+</div>
                            </div>
                        </td>
                        <td class="text-center d-none d-md-table-cell">
                            <strong><?php echo $arr_cart_p_current_price[$i]; ?>đ</strong>
                        </td>
                        <td class="text-center d-none d-md-table-cell">
                            <a class="remove-cart" href="javascript:void(0)" data-psid="37908435">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="note">
                <p>Lưu ý:</p>
                <p>Đơn hàng trên website được xử lý trong giờ hành chính</p>
            </div>
            <div class="cart-total text-right">
                <div class="total d-block">Tổng: <?php echo $total_price; ?><sub>đ</sub></div>
                <div class="clearfix"></div>

                <a class="btn btn-lg btn-pink btn-radius" href="<?php echo BASE_URL; ?>">Tiếp tục mua sắm</a>
                <a class="btn btn-lg btn-outline-pink btn-radius" href="/cart/checkout">Thanh toán</a>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once('footer.php');
?>