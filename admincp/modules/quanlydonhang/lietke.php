<?php
$sql = "select * from tbl_cart,tbl_dangky  where tbl_cart.id_khachhang = tbl_dangky.id_dangky ORDER BY cart_date DESC";
$query =  mysqli_query($conn, $sql);
?>

<h4>Liệt kê sản phẩm</h4>
    <table class="table" border="1" width="100%" style="border-collapse:collapse;">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Tình trạng</th>
            <th>Ngày đặt</th>
            <th>Quản lý</th>
            <th>In hóa đơn</th>
        </tr>
        <?php
    $stt = 0;
    while ($row = mysqli_fetch_array($query)) {
        $stt++;
    ?>
        <tr>
            <td> <?php echo $stt?> </td>
            <td> <?= $row['code_cart'] ?> </td>
            <td> <?= $row['tenkhach'] ?> </td>
            <td>
                <?php
                if ($row['cart_status'] == 1) {
                    echo '<a href="quanlydonhang/xuly.php?code=' . $row['code_cart'] . '">Chưa xử lý </a>';
                } else {
                    echo 'Đã xử lý';
                }
                ?>
            </td>
            <td> <?= $row['cart_date'] ?> </td>
            <td>
                <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn
                    hàng|</a>
                <a href="quanlydonhang/xuly.php?codecart=<?= $row['code_cart'] ?>">Xóa</a>
            </td>
            <td>
                <a href="quanlydonhang/inhoadon.php?code=<?php echo $row['code_cart'] ?>">In đơn
                    hàng</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
