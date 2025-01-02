<?php
require_once("config_vnpay.php");
?>

<div class="lienhe">
    <h3>Vui lòng chọn hình thức thanh toán.</h3>
    <form action="" method="POST">
        <input class="btn btn-primary" type="submit" name="tienmat" value="Tiền mặt">
        <input class="btn btn-primary" type="submit" name="vnpay" value="Ngân hàng">
    </form>

    <?php

    use Carbon\Carbon;

    require("../carbon/autoload.php");
    // Đây là hàm lấy thông tin ID Shipping
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
    $row = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row['id_shipping'];
    $code_order = rand(0, 9999);
    //
    // Tính tổng tiền
    $tongtien = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $thanhtien = $value['soluong'] * $value['giasp'];
        $tongtien += $thanhtien;
    }

    if (isset($_POST['tienmat'])) {
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        if (isset($_SESSION['cart'])) {

            $tienmat = $_POST['tienmat'];
            $id_khachhang = $_SESSION['id_khachhang'];


            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping)
            VALUE ('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $tienmat . "','" . $id_shipping . "')";

            $cart_query = mysqli_query($conn, $insert_cart);

            if ($cart_query) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $id_sanpham = $value['id'];
                    $soluong = $value['soluong'];
                    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua)
                    VALUE ('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
                    $insert_sell = "UPDATE tbl_sanpham SET soluongdaban = soluongdaban + $soluong  WHERE id_sanpham = '$id_sanpham'";
                    mysqli_query($conn, $insert_sell);
                    mysqli_query($conn, $insert_order_details);
                }
            }
            unset($_SESSION['cart']);
            header("location:index.php?quanly=thanhtoan");
        }
    } else if (isset($_POST['vnpay'])) {
        $vnp_TxnRef = $code_order; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $tongtien; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $_SESSION['code_cart'] = $code_order;

        $now = Carbon::now('Asia/Ho_Chi_Minh');

        if (isset($_SESSION['cart'])) {

            $vnpay = $_POST['vnpay'];
            $id_khachhang = $_SESSION['id_khachhang'];


            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping)
            VALUE ('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $vnpay . "','" . $id_shipping . "')";

            $cart_query = mysqli_query($conn, $insert_cart);

            if ($cart_query) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $id_sanpham = $value['id'];
                    $soluong = $value['soluong'];
                    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua)
                    VALUE ('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
                    $insert_sell = "UPDATE tbl_sanpham SET soluongdaban = soluongdaban + $soluong  WHERE id_sanpham = '$id_sanpham'";
                    mysqli_query($conn, $insert_sell);
                    mysqli_query($conn, $insert_order_details);
                }
            }
            unset($_SESSION['cart']);
            header('Location: ' . $vnp_Url);
            die();
        }
    }
    ?>
</div>