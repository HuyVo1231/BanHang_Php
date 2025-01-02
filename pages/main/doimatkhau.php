<?php
if (isset($_POST['doimatkhau'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $matkhaumoi = $_POST['matkhaumoi'];
    $sql = "select * from tbl_dangky where tenkhach = '" . $taikhoan . "' AND matkhau = '" . $matkhau . "'";
    $row = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($row);
    if ($taikhoan && $matkhau && $matkhaumoi) {
        if ($count > 0) {
            if ($matkhau != $matkhaumoi) {
                $sql_update = "UPDATE tbl_dangky SET matkhau = '" . $matkhaumoi . "' WHERE tenkhach ='" . $taikhoan . "'";
                $query = mysqli_query($conn, $sql_update);
                echo '<p class ="wrapper_res" style = "color:green">Đã thay đổi mật khẩu thành công.</p>';
            } else {
                echo '<p class ="wrapper_res" style = "color:red">Mật khẩu phải khác nhau.</p>';
            }
        } else {
            echo '<p class ="wrapper_res" style = "color:red">Sai mật khẩu.</p>';
        }
    } else {
        echo '<p class ="wrapper_res" style = "color:red">Vui lòng nhập đầy đủ thông tin.</p>';
    }
}
?>


<div class="wrapper_res">
    <div class="wrapper_res d-flex justify-content-center">
        <form class=w-50 action="" autocomplete="off" method="POST">
            <!-- Email input -->
            <h2 class="fw-bold mb-2 text-uppercase">Change Password</h2>
            <p class="text-black-50 mb-5">Please enter your login and password!</p>
            <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control" placeholder="Nhập tài khoản"
                    name="taikhoan" />
                <label class="form-label" for="form2Example1"></label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" placeholder="Nhập mật khẩu cũ"
                    name="matkhau" />
                <label class="form-label" for="form2Example2"></label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" placeholder="Nhập  mật khẩu mới"
                    name="matkhaumoi" />
                <label class="form-label" for="form2Example2"></label>
            </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="index.php?quanly=doimatkhau">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="doimatkhau">Change</button>

            <!-- Register buttons -->
        </form>
    </div>
</div>