<?php require_once('header.php') ?>

<?php 
if(!isset($_REQUEST['s'])) {
    header('location: index.php');
    exit();
} else {
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE name LIKE ? ");
    $searchtext = strip_tags($_REQUEST['s']);
    $searchtext = '%'.$searchtext.'%';
    $statement->execute(array($searchtext));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                                Tìm kiếm :
                                <?php 
                                    echo $_REQUEST['s'];
                                ?>
                            </li>
                        </ul> <span class="clearfix"></span>
                    </h1> 
                </div>
                <div class="clearfix"></div>

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