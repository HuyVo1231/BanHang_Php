<?php
include("../admincp/config/config.php");

if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BackCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $code_cart = $_SESSION['code_cart'];

    $vnpay_add = "INSERT INTO tbl_vnpay
        (vnp_amount,vnp_bankCode,vnp_banktranno,vnp_cardtype,
        vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno,code_cart)
        VALUES ('" . $vnp_Amount . "','" . $vnp_BackCode . "','" . $vnp_BankTranNo . "','" . $vnp_CardType . "','" . $vnp_OrderInfo . "','" . $vnp_PayDate . "','" . $vnp_TmnCode . "','" . $vnp_TransactionNo . "','" . $code_cart . "')";

    $cart_query = mysqli_query($conn, $vnpay_add);
    if ($cart_query && $vnp_BankTranNo) {
    } else {
        header("Location:index.php");
    }
}
?>
<div class="text-center mt-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" color="green" class="bi bi-check-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
    </svg>
    <p class="mt-3 fw-bold text-uppercase ">Cảm ơn bạn đã đặt hàng tại SHOPESSHOP. Đơn hàng của bạn sẽ dược giao trong
        thời gian sớm nhất</p>
</div>