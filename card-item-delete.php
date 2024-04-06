<?php require_once('header.php')?>

<?php 
if (!isset($_REQUEST['id'])) {
    header('location: card.php');
    exit;
}

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

unset($_SESSION['cart_p_id']);
unset($_SESSION['cart_p_qty']);
unset($_SESSION['cart_p_name']);
unset($_SESSION['cart_p_current_price']);

$k = 1;
for ($i = 1; $i <= count($arr_cart_p_id); $i++) {
    if($arr_cart_p_id[$i] == $_REQUEST['id']) {
        continue;
    } else {
        $_SESSION['cart_p_id'][$k] = $arr_cart_p_id[$i];
        $_SESSION['cart_p_qty'][$k] = $arr_cart_p_qty[$i];
        $_SESSION['cart_p_name'][$k] = $arr_cart_p_name[$i];
        $_SESSION['cart_p_current_price'][$k] = $arr_cart_p_current_price[$i];
        $k++;
    }
}

header('location: index.php');
?>
