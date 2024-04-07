<?php 
include("config/config.php");
?>


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo ADMIN_URL ?> ">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Moji Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_URL ?> ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Đơn hàng</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý cửa hàng
    </div>
    <!-- 
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Danh mục</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_URL.'/product.php' ?> ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sản phẩm</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->