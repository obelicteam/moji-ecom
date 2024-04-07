<?php 
    require_once('header.php');
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php 
        require_once('sidebar.php'); 
        
        if(!isset($_REQUEST['id'])) {
            header('location: product.php');
            exit;
        } else {
            $statement_get_product = $pdo->prepare('SELECT * FROM tbl_product WHERE id = ?');
            $statement_get_product->execute(array($_REQUEST['id']));
            $result_get_product = $statement_get_product->fetchAll(PDO::FETCH_ASSOC);
            foreach($result_get_product as $row) {
                $product_id = $row['id'];
                $product_name = $row['name'];
                $product_price = $row['price'];
                $product_description = $row['description'];
                $product_url_image = $row['url_image'];
                $product_created_date = $row['created_date'];
                $product_category_id = $row['category_id'];
            }
        }


        if (isset($_POST['form_add_product'])) {
            try {
                    $statement_add_product = $pdo->prepare("UPDATE tbl_product SET description = ?, price = ?, url_image = ?, category_id = ? WHERE id = ?");
                    $statement_add_product->execute(array(  $_POST['p_description'], 
                                                            $_POST['p_price'], 
                                                            $_POST['p_url_image'],   
                                                            $_POST['p_category_id'],
                                                            $product_id                                                          
                                                        ));
                    header("location: product.php");
                    exit;
                } catch (PDOException $e) {
                    echo "<script>alert('Lỗi : Không cập nhật được sản phẩm'); </script>";
                }
            }
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php require_once('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa sản phẩm</h1>                       
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" id="add_form">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_name" name="p_name" value="<?php echo $product_name ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_description" name="p_description" placeholder="Mô tả sản phẩm" value="<?php echo $product_description ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_price" name="p_price" placeholder="Đơn giá" value="<?php echo $product_price ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_url_image" name="p_url_image" placeholder="URL ảnh" value="<?php echo $product_url_image ?>">
                                </div>
                                <div class="form-group">
                                    <select type="text" class="form-control form-control-user"  id="p_category_id" name="p_category_id" placeholder="Danh mục">
                                        <?php 
                                        $statement_category = $pdo->prepare("SELECT * FROM tbl_category");
                                        $statement_category->execute();
                                        $result_category = $statement_category->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result_category as $row) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"
                                                <?php 
                                                    if($row['id'] == $product_category_id) {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >
                                                <?php echo $row['name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" name="form_add_product" value="Lưu"">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Moji 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>