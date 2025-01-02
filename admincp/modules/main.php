<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
?>

    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
        include("quanlyloaisp/them.php");
        include("quanlyloaisp/lietke.php");
    } elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("quanlyloaisp/sua.php");
    } elseif ($tam == 'quanlysanpham' && $query == 'them') {
        include("quanlysp/them.php");
        include("quanlysp/lietke.php");
    } elseif ($tam == 'quanlysanpham' && $query == 'sua') {
        include("quanlysp/sua.php");
    } elseif ($tam == 'quanlydonhang' && $query == 'tonkho') {
        include("quanlydonhang/tonkho.php");
    } elseif ($tam == 'quanlydonhang' && $query == 'lietke') {
        include("quanlydonhang/lietke.php");
    } elseif ($tam == 'donhang' && $query == 'xemdonhang') {
        include("quanlydonhang/xemdonhang.php");
    } elseif ($tam == 'dangxuat') {
        unset($_SESSION['login']);
        header("location:login.php");
    } else {
        include("dashboard.php");
    }
    ?>
