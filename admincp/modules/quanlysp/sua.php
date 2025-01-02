<h4>Sửa sản phẩm </h4>
<?php
$id = $_GET['idsanpham'];
$sql = "select * from tbl_sanpham where id_sanpham = '" . $id . "'";
$query =  mysqli_query($conn, $sql);
?>

<table class="table text-center">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <form action="quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" method="POST" enctype="multipart/form-data">
            <tr>
                <th>Tên Sản Phẩm</th>
                <td> <input type="text" value="<?= $row['tensanpham'] ?>" name="tensanpham"></td>
            </tr>

            <tr>
                <th>Mã Sản Phẩm</th>
                <td><input type="text" value="<?= $row['masp'] ?>" name="masp"></td>
            </tr>
            <tr>
                <th>Giá Sản Phẩm</th>
                <td><input type="text" value="<?= $row['giasp'] ?>" name="giasp"></td>
            </tr>

            <tr>
                <th>Số Lượng</th>
                <td><input type="text" value="<?= $row['soluong'] ?>" name="soluong"></td>
            </tr>
            <tr>
                <th>Hình Ảnh</th>
                <td><input type="file" name="hinhanh" value="<?= $row['hinhanh'] ?>">
                    <img src="quanlysp/uploads/<?= $row['hinhanh'] ?>" width="150px">
                </td>
            </tr>
            <tr>
                <th>Tóm Tắt</th>
                <td><textarea rows="10" name="tomtat" style="resize:none"><?= $row['tomtat'] ?></textarea> </td>
            </tr>

            <tr>
                <th>Nội Dung</th>
                <td><textarea rows="10" name="noidung" style="resize:none"> <?= $row['noidung'] ?> </textarea></td>
            </tr>

            <tr>
                <th>Danh Mục Sản Phẩm</th>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= $row['id_danhmuc'] ?>"><?= $row['tendanhmuc'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
                <th>Tình Trạng</th>
                <td>
                    <select name="tinhtrang">
                        <?php
                        if ($row['tinhtrang'] == 1) {
                        ?>
                            <option value="1" selected>Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                        <?php
                        } else {
                        ?>
                            <option value="1">Kích Hoạt</option>
                            <option value="0" selected>Ẩn</option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>


            <tr>
                <td colspan="2"> <input type="submit" name="suasanpham" class="btn btn-primary" value="Sửa  sản phẩm"></td>
            </tr>
        </form>

    <?php
    }
    ?>


</table>