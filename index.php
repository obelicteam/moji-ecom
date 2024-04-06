<?php 
    require_once('header.php');
?>

<div class="slider-group">
    <div class="row">
        <div class="col-slider col-lg-9 col-12">
            <div class="banner-full owl-full owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item active" style="width: 1258px;">
                            <a href="<?php echo BASE_URL ?>" target="_blank">
                                <img src="https://pos.nvncdn.com/cba2a3-7534/bn/20220426_i1xLL6tLxnnTR6iS7Lr5Bjv7.jpg"
                                    alt="Banner QR code">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-slider col-lg-3 d-none d-lg-block">
            <div class="banner-right owl-full owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item active" style="width: 413px;">
                            <a href="<?php echo BASE_URL ?>" target="_blank">
                                <img src="https://pos.nvncdn.com/cba2a3-7534/bn/20240404_1BjP6nTB.gif" alt="YT - Một ngày cuối tuần">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-right owl-full owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item active" style="width: 413px;">
                            <a href="<?php echo BASE_URL ?>" target="_self">
                                <img src="https://pos.nvncdn.com/cba2a3-7534/bn/20240301_Ld3QyvUj.gif" alt="PTC - Into the Dreamy life"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                <a href="<?php echo BASE_URL; ?>/product.php?id=<?php echo $row['id']; ?>"
                                    title="Băng đô make up Capybara basic face nơ lớn">
                                    <img data-sizes="auto" class="lazyautosizes ls-is-cached lazyloaded"
                                        src="<?php echo BASE_URL.$row['url_image']; ?>"
                                        data-src="<?php echo $row['url_image']; ?>" alt="<?php echo $row['name']; ?>"
                                        sizes="255px">
                                </a>
                            </div>
                            <h3 class="name">
                                <a href="/" title="<?php echo $row['name']; ?>">
                                    <?php echo $row['name']; ?>
                                </a>
                            </h3>
                            <div class="product-price">
                                <span class="price">
                                    <?php echo $row['price']; ?>đ
                                </span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require_once('footer.php');
?>