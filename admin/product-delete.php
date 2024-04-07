<?php 
include("config/config.php");
?>

<?php 
if(!isset($_REQUEST["id"])){
    header("location: product.php");
} else {
    $statement_delete_product = $pdo->prepare("DELETE FROM tbl_product WHERE id = ?");
    $statement_delete_product->execute(array($_REQUEST["id"]));
    if ($statement_delete_product->rowCount() > 0){
        header("location: product.php");
    } else {
        header("location: product.php");
    }
}
?>