<?php
$realPath = dirname(__FILE__);
spl_autoload_register(function ($className) {
    include_once './classes/' . $className . '.php';
});
$siteSetting = new SiteSetting();
$setting = $siteSetting->getSiteSetting();
$pagination = $setting['pagination'];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $setting['site_title']??'Trendy Blog'; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <!-- Core CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/dark.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>