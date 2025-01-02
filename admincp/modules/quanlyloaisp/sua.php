<h4>Sửa danh mục sản phẩm </h4>
<?php
$id = $_GET['iddanhmuc'];
$sql = "select * from tbl_danhmuc where id_danhmuc = '" . $id . "'";
$query =  mysqli_query($conn, $sql);
?>
<div class ="container_fuild">
    <table  class="table text-center">
        <form action="quanlyloaisp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="POST">
            <?php
            while ($dong = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <th scope="col">Tên danh mục</th>
                    <td> <input type="text" value="<?= $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
                </tr>
                <tr>
                    <th scope="col">Thứ tự:</th>
                    <td><input type="text" value="<?= $dong['thutu'] ?>" name="thutu"></td>
                </tr>
                <tr>
                    <td colspan="2"> <input class="btn btn-primary mt-1 mb-1" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
                </tr>
            <?php
            }
            ?>
        </form>
    </table>
</div>
