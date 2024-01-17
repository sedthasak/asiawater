<meta charset="utf-8">
<?php
	if(empty($_title)) 			$_title ='RodPromptkai | รถพร้อมขาย.com';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>

    <title>
        <?php echo $_title;?>
    </title>
    <meta name="keywords" content="<?php echo $_keywords;?>" />
    <meta name="description" content="<?php echo $_description;?>" />
    <meta name="robot" content="index, follow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link type="image/ico" rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/layout.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/dropzone.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}" />
    

    @if(1==2)
        <meta http-equiv="refresh" content="3;url={{route('editprofilePage_afterregis')}}">
    @endif
    
   
    
    