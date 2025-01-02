<h4>Thêm Sản Phẩm</h4>

<table class="table text-center" border="1" width="100%" style="border-collapse:collapse;">
    <form action="quanlysp/xuly.php" method="POST" enctype="multipart/form-data">
        <tr>
            <th>Tên Sản Phẩm</th>
            <td> <input type="text" name="tensanpham"></td>
        </tr>

        <tr>
            <th>Mã Sản Phẩm</th>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <th>Giá Sản Phẩm</th>
            <td><input type="text" name="giasp"></td>
        </tr>

        <tr>
            <th>Số Lượng</th>
            <td><input type="text" name="soluong"></td>
        </tr>

        <tr>
            <th>Hình Ảnh</th>
            <td><input type="file" name="hinhanh"></td>
        </tr>


        <tr>
            <th>Tóm Tắt</th>
            <td><textarea rows="10" name="tomtat" style="resize:none"></textarea> </td>
        </tr>

        <tr>
            <th>Nội Dung</th>
            <td><textarea rows="10" name="noidung" style="resize:none"></textarea></td>
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
                    <option value="1">Kích Hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>


        <tr>
            <td colspan="2"> <input type="submit" name="themsanpham" class="btn btn-primary" value="Thêm  sản phẩm"></td>
        </tr>
    </form>
</table>