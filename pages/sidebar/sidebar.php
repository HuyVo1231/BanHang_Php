<?php
$sql = "SELECT * FROM tbl_danhmuc";
$query = mysqli_query($conn, $sql);
?>
    <ul class="list_sidebar">
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?>
                </a></li>
        <?php
        }
        ?>
    </ul>
