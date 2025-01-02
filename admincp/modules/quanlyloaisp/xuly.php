<?php
    include("../../config/config.php");
    $tendanhmuc = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])) {
        // thêm
        if($tendanhmuc && $thutu) {
            $sql_them = "INSERT INTO tbl_danhmuc (tendanhmuc,thutu) VALUES ('".$tendanhmuc."','".$thutu."')";
            mysqli_query($conn,$sql_them);
            header("Location:../index.php?action=quanlydanhmucsanpham&query=them");
        }
        else {
            header("Location:../index.php?action=quanlydanhmucsanpham&query=them");
        }
    }
    elseif(isset($_POST['suadanhmuc'])) {
        // sửa
        $sql_update = "UPDATE TBL_DANHMUC SET tendanhmuc = '".$tendanhmuc."', thutu = '".$thutu."' where id_danhmuc = '$_GET[iddanhmuc]'";
        mysqli_query($conn,$sql_update);
        header("Location:../index.php?action=quanlydanhmucsanpham&query=them");
    }
    else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "delete from tbl_danhmuc where id_danhmuc = '" . $id ."'";
        mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlydanhmucsanpham&query=them");
    }
?>