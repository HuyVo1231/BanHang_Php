<?php

$sql = "SELECT * FROM tbl_sanpham where tbl_sanpham.id_danhmuc = '$_GET[id]'";
$query = mysqli_query($conn, $sql);
$sql_cate = "SELECT * FROM tbl_danhmuc where tbl_danhmuc.id_danhmuc = '$_GET[id]'";
$query_cate = mysqli_query($conn, $sql_cate);
$title = mysqli_fetch_array($query_cate);
?>

<p class="danhmuc"> Danh Mục: <?php echo $title['tendanhmuc'] ?> </p>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="../admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="anhgiay_sneaker">
                <p class="name_product"><?php echo $row['tensanpham'] ?></p>
                <p class="price_product"><?php echo number_format($row['giasp'], 0, ',', '.') . 'VND' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>