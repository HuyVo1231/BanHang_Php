<?php
session_start();
include("../../admincp/config/config.php");

// cong 1 sp
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
            $_SESSION['cart'] = $product;
        } else {
            $sql = "select * from tbl_sanpham where id_sanpham = '" . $id . "'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);

            $tangsoluong = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < $row['soluong']) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong,
                    'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header("location:../index.php?quanly=giohang");
}
// tru 1 sp
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong,
                    'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                );
            } else {
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
    header("location:../index.php?quanly=giohang");
}

// xoa 1 sp
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
        }
    }
    $_SESSION['cart'] = $product;
    header("location:../index.php?quanly=giohang");
}

// xoa tat ca
if (isset($_GET['xoatatca']) && isset($_GET['xoatatca']) == 1) {
    unset($_SESSION['cart']);
    header("location:../index.php?quanly=giohang");
}
if (isset($_POST['themgiohang'])) {
    //  session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $id . "'LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array(
            'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong,
            'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']
        ));
        // kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1,
                        'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                    );
                    $found = true;
                } else {
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                        'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
                    );
                }
            }
            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header("location:../index.php?quanly=giohang");
}
