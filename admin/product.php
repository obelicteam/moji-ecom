<?php require_once('header.php'); ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require_once('sidebar.php'); ?>

        <?php 
        $statement_product = $pdo->prepare("SELECT tbl_product.id, tbl_product.name, tbl_product.price, tbl_product.description, tbl_product.url_image, tbl_product.created_date, tbl_category.name as category_name FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id");
        $statement_product->execute();
        $result_product = $statement_product->fetchAll(PDO::FETCH_ASSOC);

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
                        <h1 class="h3 mb-0 text-gray-800">Quản lý sản phẩm</h1>
                        <a href="<?php echo ADMIN_URL.'/product-add.php'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>
                            Thêm sản phẩm
                        </a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên</th>
                                            <th>Đơn giá</th>
                                            <th>Danh mục</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày chỉnh sửa</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($result_product as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['price']; ?>₫</td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['created_date']; ?></td>
                                            <td>00:00:00 01/01/2024</td>
                                            <td>
                                                <a href="<?php echo ADMIN_URL.'/product-edit.php?id='.$row['id'] ?>" class="btn btn-sm btn-info btn-circle ml-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo ADMIN_URL.'/product-delete.php?id='.$row['id'] ?>" class="btn btn-sm btn-danger btn-circle ml-2">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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