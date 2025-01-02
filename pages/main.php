<?php
    ob_start();
?>
<div id ="main">
    <div class ="row">
        <div class= "col-lg-2 col-md-3 col-sm-12 col-xs-12">
            <?php  
                include("sidebar/sidebar.php");
            ?>
        </div>
    <div class ="col-lg-10 col-md-9 col-sm-12 col-xs-12">
        <div class="maincontent">
        <?php
        if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }
        if ($tam == 'danhmucsanpham') {
            include("main/danhmuc.php");
        } elseif ($tam == 'giohang') {
            include("main/giohang.php");
        } elseif ($tam == 'lienhe') {
            include("main/lienhe.php");
        } elseif ($tam == 'sanpham') {
            include("main/sanpham.php");
        } elseif ($tam == 'dangky') {
            include("main/dangky.php");
        } elseif ($tam == 'thanhtoan') {
            include("main/thanhtoan.php");
        } elseif ($tam == 'dangnhap') {
            include("main/dangnhap.php");
        } elseif ($tam == 'timkiem') {
            include("main/timkiem.php");
        } elseif ($tam == 'doimatkhau') {
            include("main/doimatkhau.php");
        } elseif ($tam == 'thongtinvanchuyen') {
            include("main/thongtinvanchuyen.php");
        } else {
            include("main/index.php");
        }
        ob_end_flush();
        ?>
        <div class="clear"></div>
    </div>
    </div>
    </div>
</div>
