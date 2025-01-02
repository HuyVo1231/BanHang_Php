<?php
$sql = "select * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc";
$query =  mysqli_query($conn, $sql);
?>

<h4 class="mt-5">Liệt kê sản phẩm</h4>

<div class ="col-md-12">
    <table class="table-responsive text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá </th>
            <th scope="col">Số lượng</th>
            <th scope="col">Danh Mục</th>
            <th scope="col">Mã SP</th>
            <th scope="col">Tóm tắt</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Quản lý</th>
        </tr>
        <?php
        $stt = 0;
        while ($row = mysqli_fetch_array($query)) {
            $stt++;
        ?>
        <tr>
            <td scope="col"> <?php echo $stt  ?> </td>
            <td scope="col"> <?= $row['tensanpham'] ?> </td>
            <td scope="col"> <img src="quanlysp/uploads/<?= $row['hinhanh'] ?>" width="150px"></td>
            <td scope="col"> <?= $row['giasp'] ?> </td>
            <td scope="col"> <?= $row['soluong'] ?> </td>
            <td scope="col"> <?= $row['tendanhmuc'] ?> </td>
            <td scope="col"> <?= $row['masp'] ?> </td>
            <td scope="col"> <?= $row['tomtat'] ?> </td>
            <td scope="col"> <?php if ($row['tinhtrang'] == 1) {
                            echo 'Kích Hoạt';
                        } else {
                            echo 'Ẩn';
                        }
                        ?> </td>
            <td>
                <a href="quanlysp/xuly.php?idsanpham=<?= $row['id_sanpham'] ?>">Xóa</a>
                |
                <a href="?action=quanlysanpham&query=sua&idsanpham=<?= $row['id_sanpham'] ?>">Sửa</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>