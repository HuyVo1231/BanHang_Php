<?php
    include("../config/config.php");
    require("../../carbon/autoload.php");
    use Carbon\Carbon;
    if(isset($_POST['thoigian'])) {
        $thoigian = $_POST['thoigian'];
    }
    else {
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }
    if($thoigian =='7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    }
    elseif($thoigian =='30ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    }
    elseif($thoigian =='90ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
    }
    elseif($thoigian =='365ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $sql = "SELECT * FROM tbl_thongke WHERE Ngaydat BETWEEN '$subdays' AND '$now'";

    if(isset($_POST['from_date'])) {
            $tungay = $_POST['from_date'];
            $denngay = $_POST['to_date'];
            $sql = "SELECT * FROM tbl_thongke WHERE Ngaydat BETWEEN '$tungay' AND '$denngay'";
    }   
    $sql_query = mysqli_query($conn,$sql);  
    while($val = mysqli_fetch_array($sql_query)) {
        $chart_data[] = array(
            'date'=>$val['ngaydat'],
            'order'=>$val['donhang'],
            'sales'=>$val['doanhthu'],
            'quanlity'=>$val['soluongban'],
        );
    }
    echo $data = json_encode($chart_data);

?>