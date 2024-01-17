@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$aaa = 'AAAAAAA';


$url = 'http://127.0.0.1:8000/uploads/1695725433.jpg';
$name = basename($url);
$destinationPath = public_path('/uploads/test/');
// file_put_contents($destinationPath.$name, file_get_contents($url));

$temp_file = tempnam(sys_get_temp_dir(), 'Tux');


echo "<pre>";
print_r($temp_file);
echo "</pre>";
?>

    

@endsection

@section('script')

<script>
    
</script>
@endsection
