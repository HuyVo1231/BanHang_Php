<?php
if (isset($_SESSION['cart'])) {
}
?>

<?php if (isset($_SESSION['dangky'])) {
    echo '<span style= "padding-left:20px"> Xin chào: </span>' . '<span style= "color:red;font-size:30px">' . $_SESSION['dangky'] . '</span>';
}
?>

<div class= "gh">
    <table class="table">
        <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Quản lý</th>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
            $stt = 0;
            $thanhtien = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $stt++;
                $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                $tongtien += $thanhtien;
        ?>
                <tr>
                    <td><?php echo $cart_item['tensanpham'] ?></td>
                    <td> <img width=100px src="../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"></td>
                    <td>
                        <a href="main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                        <?php echo $cart_item['soluong'] ?>
                        <a href="main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-minus"></i></a>
                    </td>
                    <td><?php echo number_format($thanhtien, 0, ',', '.') . ' vnđ' ?></td>
                    <td><a style="color:red" href="main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php
            } ?>
            <td colspan="8">
                <h4 style="float:center;color:red;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' vnđ' ?>
                </h4>
                <h5 style="float:right;"><a href="main/themgiohang.php?xoatatca=1"> <i class="fa-solid fa-trash"></i></a>
                </h5>
                <div style="clear:both"></div>


                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <a class ="btn btn-primary" href="index.php?quanly=thongtinvanchuyen">Đặt hàng</a>
                <?php
                } else {
                ?>
                    <a class ="btn btn-primary" href="index.php?quanly=dangnhap">Đăng nhập đặt hàng</a>

                <?php
                }
                ?>
            </td>

        <?php

        } else {
        ?>
            <tr>
                <td colspan="8">
                    <p>Hiện tại chưa giỏ hàng trống.</p>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
