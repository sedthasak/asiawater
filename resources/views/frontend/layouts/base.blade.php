<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode??false ? 'dark' : '' }}{{ $color_scheme??'default' != 'default' ? ' ' . $color_scheme??'default' : '' }}">
<!-- BEGIN: Head -->
<head>




    <meta charset="utf-8">
    <?php
        if(empty($_title)) 			$_title ='RodPromptkai | รถพร้อมขาย.com';
        if(empty($_keywords)) 		$_keywords ='';
        if(empty($_description)) 	$_description ='';
    ?>

    <meta name="keywords" content="<?php echo $_keywords;?>" />
    <meta name="description" content="<?php echo $_description;?>" />
    <meta name="robot" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <link type="image/ico" rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/layout.css')}}" />

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <!-- <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" /> -->
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
