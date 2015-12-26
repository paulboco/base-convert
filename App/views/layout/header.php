<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vue JS Demo</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php self::inject('layout/navbar') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <?php self::inject('layout/sidenav') ?>
            </div>
            <div class="col-sm-9 col-md-10 content">
