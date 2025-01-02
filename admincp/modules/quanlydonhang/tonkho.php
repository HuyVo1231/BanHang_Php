<?php
    $sql = "select * from tbl_sanpham";
    $query =  mysqli_query($conn, $sql);
?>
<h4 class="mt-5">THỐNG KÊ TỒN KHO</h4>
<div class ="col-md-12">
    <table class="table-responsive text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá </th>
            <th scope="col">Số lượng Tồn</th>
            <th scope="col">Số lượng Đã Bán</th>
            <th scope="col">Doanh thu</th>
        </tr>
        <?php
        $stt = 0;
        while ($row = mysqli_fetch_array($query)) {
            $stt++;
        ?>
        <tr>
            <td scope="col"> <?php echo $stt  ?> </td>
            <td scope="col"> <?= $row['tensanpham'] ?> </td>
            <td scope="col"> <img src="quanlysp/uploads/<?= $row['hinhanh'] ?>" width="100px"></td>
            <td scope="col"> <?= $row['giasp'] ?> </td>
            <td scope="col"> <?= $row['soluong'] ?> </td>
            <td scope="col"> <?= $row['soluongdaban'] ?></td>
            <td scope="col"> <?= $row['soluongdaban']*$row['giasp'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>