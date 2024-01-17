@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')

    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <div class="">
        <?php

        // echo "<pre>";
        // print_r($role_set);
        // echo "</pre>";
        ?>
    </div>
        
@endsection

@section('script')
<script>

</script>


@endsection