<?php 
    require_once('header.php');
?>

<main class="main">
    <div class="container">
        <div class="row">
            <div class="blk-product-new col-12" data-label="product new">
                <h2 class="title">
                    <a href="/product">
                        Sản phẩm mới </a>
                </h2>
                <div class="product-list">
                    <div id="rs-js-product" class="row">
                    <?php 
                        $statement = $pdo->prepare("SELECT * FROM tbl_product");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                    ?>
                        <div class="product-item  item37908433 col-xl-3 col-md-4 col-6 col-xxs-12" data-psid="37908433">
                            <div class="image">
                                <span class="flag">New</span> 
                                <a
                                    href="<?php echo BASE_URL; ?>/product.php?id=<?php echo $row['id']; ?>"
                                    title="Băng đô make up Capybara basic face nơ lớn">
                                    <img data-sizes="auto" class="lazyautosizes ls-is-cached lazyloaded"
                                        src="<?php echo BASE_URL.$row['url_image']; ?>"
                                        data-src="<?php echo $row['url_image']; ?>"
                                        alt="<?php echo $row['name']; ?>" sizes="255px">
                                </a>
                                <div class="product-action d-flex align-center justify-content-center">
                                    <div class="wish" data-psid="37908433"></div>
                                    <div class="js-add-cart" data-psid="37908433" data-root="-2"></div>
                                </div>
                            </div>
                            <h3 class="name">
                                <a href="/"
                                    title="<?php echo $row['name']; ?>">
                                    <?php echo $row['name']; ?> </a>
                            </h3>
                            <div class="product-price">
                                <span class="price"><?php echo $row['price']; ?>đ</span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col text-center">
                    <a id="js-btn-load-product" data-offset="12" href="/product"
                        class="btn btn-pink pointer d-load-flex align-items-center">XEM THÊM</a>
                </div>
            </div>
        </div>
    </div>
</main>