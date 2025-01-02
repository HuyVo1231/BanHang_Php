<?php
$sql = "select * from tbl_danhmuc";
$query =  mysqli_query($conn, $sql);
?>

<div class="container-fluid">
    <table class="table text-center">
        <h4>Liệt kê sản phẩm</h4>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Danh mục</th>
                <th scope="col">ID</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            while ($row = mysqli_fetch_array($query)) {
                $stt++;
            ?>
                <tr>
                    <th scope="row"> <?php echo $stt  ?></th>
                    <td> <?= $row['tendanhmuc'] ?> </td>
                    <td> <?= $row['id_danhmuc'] ?> </td>
                    <td><a href="quanlyloaisp/xuly.php?iddanhmuc=<?= $row['id_danhmuc'] ?>">Xóa</a>|
                        <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?= $row['id_danhmuc'] ?>">Sửa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>