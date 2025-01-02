<?php
include("../../config/config.php");

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
// xu ly hinh anh day ne
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_temp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;
//
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
if (isset($_POST['themsanpham'])) {
    // thêm
    if ($tensanpham && $masp && $giasp && $soluong && $danhmuc && $hinhanh) {
        $sql_them = "INSERT INTO tbl_sanpham (tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
        VALUES ('" . $tensanpham . "','" . $masp . "','" . $giasp . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";
        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_temp, 'uploads/' . $hinhanh);
        header("Location:../index.php?action=quanlysanpham&query=them");
    } else {
        header("Location:../index.php?action=quanlysanpham&query=them");
    }
} elseif (isset($_POST['suasanpham'])) {
    // sửa
    if ($hinhanh_temp != '') {
        move_uploaded_file($hinhanh_temp, 'uploads/' . $hinhanh);
        $id = $_GET['idsanpham'];
        $sql_update = "UPDATE tbl_sanpham SET tensanpham = '" . $tensanpham . "', masp = '" . $masp . "',giasp = '
        " . $giasp . "',soluong = '" . $soluong . "', hinhanh = '" . $hinhanh . "',tomtat = '" . $tomtat .
            "',noidung = '" . $noidung . "',tinhtrang = '" . $tinhtrang . "',id_danhmuc = '" . $danhmuc .
            "' where id_sanpham = '$_GET[idsanpham]'";

        $sql = "SELECT * FROM tbl_sanpham where id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
    } else {
        $sql_update = "UPDATE tbl_sanpham SET tensanpham = '" . $tensanpham . "', masp = '" . $masp . "',giasp = '
        " . $giasp . "',soluong = '" . $soluong . "',tomtat = '" . $tomtat . "',noidung = '" . $noidung . "',tinhtrang = '" . $tinhtrang . "',id_danhmuc = '" . $danhmuc . "' where id_sanpham = '$_GET[idsanpham]'";
    }
    $update =  mysqli_query($conn, $sql_update);
    header("Location:../index.php?action=quanlysanpham&query=them");
} else {
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham where id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "delete from tbl_sanpham where id_sanpham = '" . $id . "'";
    mysqli_query($conn, $sql_xoa);
    header("Location:../index.php?action=quanlysanpham&query=them");
}
