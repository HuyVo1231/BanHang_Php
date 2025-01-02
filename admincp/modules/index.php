<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <title>AdminCP</title>
    <link rel="stylesheet" href="../css/admincp.css">
</head>

<body>
    <div class="container_fuild">
        <?php
        include("../config/config.php");
        include("header.php");
        include("menu.php");
        include("main.php");
        ?>
    </div>
    <script>
        // Date picker
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

        $(document).ready(function() {
            thongke();
            var char = new Morris.Area({
                element: 'elements',
                xkey: 'date',
                ykeys: ['order', 'sales', 'quanlity'],
                labels: ['Đơn hàng', 'Doanh thu', 'Số lượng đã bán'],
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors: ['brown', '#6495ED']
            });
            // Xử lý từ ngày mấy đến ngày mấy
            $('#buttondash').click(function() {
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
                $.ajax({
                    url: 'thongke2.php',
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    },
                    success: function(data) {
                        char.setData(data);
                    }
                });
            })
            // Xử lý 7-30-90-365 ngày
            $('.select-date').change(function() {
                var thoigian = $(this).val();
                if (thoigian == '7ngay') {
                    var text = '7 ngày';
                } else if (thoigian == '30ngay') {
                    var text = '30 ngày';
                } else if (thoigian == '90ngay') {
                    var text = '90 ngày';
                } else {
                    var text = '365 ngày';
                }
                $.ajax({
                    url: 'thongke2.php',
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        thoigian: thoigian
                    },
                    success: function(data) {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            })

            function thongke() {
                var text = '365 ngày';
                $.ajax({
                    url: "thongke2.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            }
        });
    </script>
</body>

</html>