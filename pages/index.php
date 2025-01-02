<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shoes Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            session_start();
            include("../admincp/config/config.php");
            include("menu.php");
            include("header.php");
            include("main.php");
            include("rating.php");
            ?>
        </div>
    </div>
    <div class="container_fuild">
        <?php
        include("footer.php");
        ?>
    </div>
</body>


<script src="../pages/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#form1Example1', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.minLength('#form1Example2', 6),
            ],
        });

        Validator({
            form: '#form2',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#form2Example1', 'Vui lòng nhập tên tài khoản của bạn.'),
                Validator.minLength('#form2Example2', 6),
                Validator.isRequired('#form2Example3'),
                Validator.isRequired('#form2Example4'),
                Validator.isConfirmed('#form2Example3', function() {
                    return document.querySelector('#form2 #form2Example2').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
        });

        Validator({
            form: '#form-3',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#form3Example1', 'Vui lòng nhập đầy đủ thông tin.'),
                Validator.isEmail('#form3Example2', 'Trường này là email'),
                Validator.isRequired('#form3Example3', 'Vui lòng nhập đầy đủ thông tin.'),
                Validator.isRequired('#form3Example4', 'Vui lòng nhập đầy đủ thông tin.'),
                Validator.isRequired('#form3Example5', 'Vui lòng nhập đầy đủ thông tin.'),
            ],
        });
    });
</script>

</html>