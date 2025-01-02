<?php
    if (isset($_POST['themthongtin'])) {
        $hoten = $_POST['username'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu']; 
        $sdt = $_POST['sdt']; 
        $id_dangky = $_SESSION['id_khachhang'];
        if($hoten && $email && $diachi && $ghichu) {
            $sql_vanchuyen = mysqli_query($conn,"INSERT INTO tbl_shipping(ten,email,sdt,diachi,ghichu,id_dangky) VALUES
             ('$hoten','$email','$sdt','$diachi','$ghichu','$id_dangky')");
            if($sql_vanchuyen) {
                header("location:index.php?quanly=lienhe");
            }
        }
        else {
            echo ' <p class="wrapper_res" style = "color:red">Bạn vui lòng nhập đầy đủ thông tin.</p>';
        }
    }
    elseif (isset($_POST['capnhatthongtin'])) {
        $hoten = $_POST['username'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu']; 
        $sdt = $_POST['sdt']; 
        $id_dangky = $_SESSION['id_khachhang'];
        if($hoten && $email && $diachi && $ghichu) {
            $sql_capnhat_vanchuyen = mysqli_query($conn,"UPDATE Tbl_shipping SET ten = '$hoten', email = '$email' ,
        sdt = '$sdt', diachi = '$diachi', ghichu = '$ghichu', id_dangky = '$id_dangky' WHERE id_dangky = '$id_dangky'");
            if($sql_capnhat_vanchuyen) {
                header("location:index.php?quanly=lienhe");
            }
        }
        else {
            echo ' <p class="wrapper_res" style = "color:red">Bạn vui lòng nhập đầy đủ thông tin.</p>';
        }
    }
?>

<?php
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($conn,"SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
    $count = mysqli_num_rows($sql_get_vanchuyen);
    if($count > 0 ) {
        $row = mysqli_fetch_array($sql_get_vanchuyen);
        $hoten = $row['ten'];
        $email = $row['email'];
        $sdt = $row['sdt'];
        $diachi = $row['diachi'];
        $ghichu = $row['ghichu'];
    }
    else {
        $hoten = '';
        $email = '';
        $sdt = '';
        $diachi = '';
        $ghichu = '';
    }
?>

<div class="wrapper_res d-flex justify-content-center">
    <form class=w-50 action="" autocomplete="off" method="POST" class="form" id="form-3">
        <!-- Email input -->
        <h2 class="fw-bold mb-2 text-uppercase">Thông tin vận chuyển</h2>
        <p class="text-black-50 mb-5">Please input your info!</p>
        <div class="form-outline mb-4 form-group">
            <input type="text" id="form3Example1" class="form-control" value= "<?php echo $hoten?>"   placeholder="Họ và tên" name="username" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>
        <!-- -->
        <div class="form-outline mb-4 form-group">
            <input type="email" id="form3Example2" class="form-control" value= "<?php echo $email?>" placeholder="Email" name="email" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>
        <!-- -->
        <div class="form-outline mb-4 form-group">
            <input type="number" id="form3Example5" class="form-control" value= "<?php echo $sdt?>" placeholder="Số điện thoại" name="sdt" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>
        <!-- -->
        <div class="form-outline mb-4 form-group">
            <input type="text" id="form3Example3" class="form-control" value= "<?php echo $diachi?>" placeholder="Địa chỉ" name="diachi" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>
        <!--Email -->
        <div class="form-outline mb-4 form-group">
            <input type="text" id="form3Example4" class="form-control" value= "<?php echo $ghichu?>" placeholder="Ghi chú" name="ghichu" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>

        <!-- Submit button -->
        <?php 
            if($email == '' && $diachi == '') {
            
        ?>
        <button type="submit" class="btn btn-primary btn-block mb-4" name="themthongtin">Thêm vận chuyển</button>

        <!-- Register buttons -->
        <?php
            } elseif ($email !='' && $diachi !='') {
        ?>
        <button type="submit" class="btn btn-success btn-block mb-4" name="capnhatthongtin">Cập nhật  vận chuyển</button>
        <?php
            }
            ?>
    </form>
</div>

<div class= "gh">
<h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center">Sản phẩm đã chọn</h2>
    <table class="table">
        <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
            $stt = 0;
            $thanhtien = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $stt++;
                $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                $tongtien += $thanhtien;
        ?>
                <tr>
                    <td><?php echo $cart_item['tensanpham'] ?></td>
                    <td> <img width=100px src="../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"></td>
                    <td>
                        <?php echo $cart_item['soluong'] ?>
                    </td>
                    <td><?php echo number_format($thanhtien, 0, ',', '.') . ' vnđ' ?></td>
                </tr>
            <?php
            } ?>
            <td colspan="8">
                <h3 style="float:center;color:red;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' vnđ' ?>
                </h3>
                <div style="clear:both"></div>
                <?php

        }
            ?>
        </td>
    </table>
</div>