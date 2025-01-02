<?php

if (isset($_GET['dangxuat'])) {
    unset($_SESSION['dangky']);
}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="../img/logo-shop-giay-5.jpg" width="100px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i>
                    Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?quanly=giohang"><i class="fa-solid fa-cart-shopping"></i> Giỏ
                    hàng</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> Tài khoản
                </a>
                <ul class="dropdown-menu">
                    <?php
                    if (isset($_SESSION['dangky'])) {
                    ?>
                        <li><a class="dropdown-item" href="index.php?dangxuat">Đăng xuất</a></li>

                    <?php
                    } else {
                    ?>
                        <li><a class="dropdown-item" href="index.php?quanly=dangky"><i class="fa-solid fa-registered"></i>
                                Đăng ký</a></li>
                        <li><a class="dropdown-item" href="index.php?quanly=dangnhap"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
        <form class="d-flex" role="search" action="index.php?quanly=timkiem" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="tukhoa" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" name="timkiem" type="submit">Search</button>
        </form>
    </div>
</nav>