<?php require_once('header.php') ?>

<?php 
if(!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit();
} else {
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE category_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }
}
?>

<main class="mains blk-pro-cat sty-none">
    <div class="container">
        <div class="row align-center">
            <div class="col-12 mx-auto">
                <div class="d-pro-head">
                    <h1>
                        <ul class="breadcrumb breadcrumb-arrow gg-arrow-right">
                            <li>
                                <a href="/"></a>
                            </li>
                            <li>
                                <?php 
                                    $statement_1 = $pdo->prepare("SELECT * FROM tbl_category WHERE id=?");
                                    $statement_1->execute(array($_REQUEST['id']));
                                    $result_1 = $statement_1->fetch(PDO::FETCH_ASSOC);
                                    echo $result_1['name'];
                                ?>
                            </li>
                        </ul> <span class="clearfix"></span>
                    </h1> 
                    <select onchange="window.location.href = this.value" class="form-control d-none d-xl-block my-3">
                        <option value="/set-qua-pc539973.html?show=">Mới nhất</option>
                        <option value="/set-qua-pc539973.html?show=priceAsc">Giá tăng dần</option>
                        <option value="/set-qua-pc539973.html?show=priceDesc">Giá giảm dần</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="js-open-filter"><i class="fa fa-filter d-block"></i> Filter</div>

                <div class="product-list">
                    <div class="row">
                        <?php
                        foreach ($result as $row) {
                        ?>
                        <div class="product-item col-xl-3 col-md-4 col-6 col-xxs-12">
                            <div class="image">
                                <a href="<?php echo BASE_URL.'/product.php?id='.$row['id'] ?>" title="<?php echo $row['name']; ?>">
                                    <img data-sizes="auto" class="lazyautosizes ls-is-cached lazyloaded"
                                        src="<?php echo BASE_URL.$row['url_image']; ?>"
                                        data-src="<?php echo BASE_URL.$row['url_image']; ?>"
                                        alt="<?php echo $row['name']; ?>" sizes="255px">
                                </a>

                            </div>
                            <h3 class="name">
                                <a href="/set-qua-ung-qua-chung-p37907384.html" title="<?php echo $row['name']; ?>">
                                    <?php echo $row['name']; ?> 
                                </a>
                            </h3>
                            <div class="product-price">
                                <span class="price"><?php echo $row['price'] ?>đ</span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="d-block full text-center">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active" data-pr="1"><a class="page-link">1</a></li>
                        <li class="page-item" data-pr="2"><a class="page-link"
                                href="/set-qua-pc539973.html?page=2">2</a></li>
                        <li class="page-item round" data-pr="2"><a class="page-link"
                                href="/set-qua-pc539973.html?page=2">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once('footer.php');
?>