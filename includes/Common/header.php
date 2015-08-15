<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manage Water System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link href="assets/css/login.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="container">
<header class="row">
    <h1 class="col-md-3"><a class="text-hide" href="index.php?module=home" title="A link">Manager Water System</a></h1>
    <h2 class="caption col-md-5">Hệ Thống Quản lý nước 172</h2>
    <?php if( Session::exist('level') && Session::get('level') === '2' ) : ?>
             <div class="col-md-4 info-acount pull-right">
                 <span class="acount">Xin Chào: <?php echo Session::get('uname'); ?></span>
                 <a href="index.php?module=logout" onclick="return confirm('Do you exit?');" class="btn-default">Đăng Xuất</a>
             </div>
     <?php endif;
    ?>

    <div class="clearfix"></div>
</header>
