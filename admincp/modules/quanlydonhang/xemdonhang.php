<?php
    $sql = "select * from tbl_cart_details,tbl_sanpham  where tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham
        AND tbl_cart_details.code_cart = '$_GET[code]'";
    $query =  mysqli_query($conn, $sql);
?>

<div class="container_fuild py-5">
<table class="table text-center">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng mua</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Thành tiền</th>
    </tr>
    <?php
    $stt = 0;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($query)) {
        $stt++;
        $thanhtien =  $row['giasp'] * $row['soluongmua'];
        $tongtien += $thanhtien;
    ?>
        <tr>
            <td> <?php echo $stt  ?> </td>
            <td> <?= $row['code_cart'] ?> </td>
            <td> <?= $row['tensanpham'] ?> </td>
            <td> <?= $row['soluongmua'] ?> </td>
            <td> <?= number_format($row['giasp'], 0, ',', '.') . ' vnd' ?> </td>
            <td> <?= number_format($row['giasp'] * $row['soluongmua'], 0, ',', '.') . ' vnđ' ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="6">
            <p style="text-align:center" class ="text-danger">Tổng tiền: <?= number_format($tongtien, 0, ',', '.') . ' vnđ' ?></p>
            <p style = "text-align:right"><a href="index.php?action=quanlydonhang&query=lietke" class ="text-danger">Quay về</a></p>

        </td>
    </tr>
</table>
</div>