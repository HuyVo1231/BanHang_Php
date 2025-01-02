<h4 class="danhmuc">Chi tiết của sản phẩm</h4>
<?php
$sql = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND
    tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
?>
<div class ="row">
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img width="100%" src="../admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
    </div>
    <form action="main/themgiohang.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="POST">
        <div class="chitiet_sanpham">
            <h3>Tên sản phẩm: <?php echo $row['tensanpham'] ?></h3>
            <p>Mã sản phẩm: <?php echo $row['masp'] ?></p>
            <p>Giá sản phẩm: <?php echo number_format($row['giasp'], 0, '.', ',') ?></p>
            <p>Số lượng: <?php echo $row['soluong'] ?></p>
            <p>Danh mục sản phẩm: <?php echo $row['tendanhmuc'] ?></p>
            <p> <input class="btn btn-danger" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
        </div>
    </form>
</div>
</div>
<?php
}
?>