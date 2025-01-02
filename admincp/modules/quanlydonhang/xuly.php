<?php
    require('../../../carbon/autoload.php');
    include("../../config/config.php");
    use Carbon\Carbon;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    if (isset($_GET['code'])) {
        $code_cart = $_GET['code'];
        $sql = "UPDATE tbl_cart set cart_status = 0 where code_cart = '" . $code_cart . "'";
        $query = mysqli_query($conn, $sql);
        // Sau khi đã update thì lấy các ra đơn hàng để làm doanh thu.
        $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE
         tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham
        AND tbl_cart_details.code_cart = '$code_cart' 
        ORDER BY tbl_cart_details.id_cart_details DESC";
        $query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);

        // Tìm tất cả sản phẩm cùng ngày. Để tính doanh thu ngày.
        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat = '$now'";
        $query_thongke = mysqli_query($conn,$sql_thongke);


        // vòng while tính tổng số lượng mua và doanh thu
        $soluongmua = 0;
        $doanhthu = 0;

        while($row = mysqli_fetch_array($query_lietke_dh)) {
            $soluongmua += $row['soluongmua'];
            $doanhthu += $row['giasp'] * $row['soluongmua'];
            $soluongconlai = $row['soluong'] - $row['soluongmua'];
            $soluongconlai_update = mysqli_query($conn,"UPDATE tbl_sanpham SET SoLuong = $soluongconlai where id_sanpham  = ". $row['id_sanpham']);
        }
        //
        if(mysqli_num_rows($query_thongke)==0) {
            $soluongban = $soluongmua;
            $doanhthu = $doanhthu;
            $donhang = 1;
            $sql_update_thongke = "INSERT INTO tbl_thongke(ngaydat,soluongban,doanhthu,donhang)
            VALUE('$now','$soluongban','$doanhthu','$donhang')";
            $query_update_thongke = mysqli_query($conn,$sql_update_thongke);

        }elseif(mysqli_num_rows($query_thongke)!=0) {
            while($rowthongke = mysqli_fetch_array($query_thongke)) {
                $soluongban = $rowthongke['soluongban'] + $soluongmua;
                $doanhthu = $rowthongke['doanhthu'] + $doanhthu;
                $donhang = $rowthongke['donhang'] + 1;
                $sql_update_thongke = "UPDATE tbl_thongke SET soluongban = '$soluongban',doanhthu = '$doanhthu',donhang = '$donhang' WHERE ngaydat = '$now'";
                $query_update_thongke = mysqli_query($conn,$sql_update_thongke);
            }
        }
        header("location:../index.php?action=quanlydonhang&query=lietke");
    } else {
        $id = $_GET['codecart'];
        $sql_xoa = "delete from tbl_cart where code_cart = '" . $id . "'";
        mysqli_query($conn, $sql_xoa);
        header("location:../index.php?action=quanlydonhang&query=lietke");
    }
