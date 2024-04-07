<?php
require_once ('header.php');
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require_once ('sidebar.php'); ?>
        <?php
        if (isset($_POST['form_add_product'])) {
            try {
                $statement_add_product = $pdo->prepare("INSERT INTO tbl_product(name, description, price, url_image, category_id) VALUE (?,?,?,?,?)");
                $statement_add_product->execute(
                    array(
                        $_POST['p_name'],
                        $_POST['p_description'],
                        $_POST['p_price'],
                        $_POST['p_url_image'],
                        $_POST['p_category_id']
                    )
                );
                header("location: product.php");
                exit;
            } catch (PDOException $e) {
                echo "<script>alert('Lỗi : Không tạo được sản phẩm'); </script>";
            }
        }
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php require_once ('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nhập thông tin sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" id="add_form">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_name" name="p_name"
                                        placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_description"
                                        name="p_description" placeholder="Mô tả sản phẩm">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_price"
                                        name="p_price" placeholder="Đơn giá">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="p_url_image"
                                        name="p_url_image" placeholder="URL ảnh">
                                </div>
                                <div class="form-group">
                                    <select type="text" class="form-control form-control-user" id="p_category_id"
                                        name="p_category_id" placeholder="Danh mục">
                                        <?php
                                        $statement_category = $pdo->prepare("SELECT * FROM tbl_category");
                                        $statement_category->execute();
                                        $result_category = $statement_category->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result_category as $row) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>">
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
            <footer class=" sticky-footer bg-white">
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