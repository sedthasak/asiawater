<?php

// echo "<pre>";
// print_r($carfromstatus);
// echo "</pre>";
?>
<div class="menu-mycar">
    <ul>
        <li><a href="{{route('profilePage')}}">ออนไลน์ <div>({{count($carfromstatus['approved'])??0}})</div></a></li>
        <li><a href="{{route('profilecheckPage')}}">รอตรวจสอบ <div>({{count($carfromstatus['created'])??0}})</div></a></li>
        <li><a href="{{route('profileeditcarinfoPage')}}">รอแก้ไข <div>({{count($carfromstatus['rejected'])??0}})</div></a></li>
        <li><a href="{{route('profileexpirePage')}}">หมดอายุ <div>({{count($carfromstatus['expired'])??0}})</div></a></li>
    </ul>
</div>