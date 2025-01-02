<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc  where  tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
     AND tbl_sanpham.tensanpham LIKE '%$tukhoa%'";
$query = mysqli_query($conn, $sql);
?>

<p class="danhmuc">Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></p>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="../admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="anhgiay_sneaker">
                <p class="name_product"><?php echo $row['tensanpham'] ?> </p>
                <p class="price_product"><?php echo number_format($row['giasp'], 0, '.', ',') . ' vnđ' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>