@extends('frontend.layouts.header')


    {{-- @include('frontend.includes.inc_topmenu') --}}

    <div class="ColBodyDetail">

        <div class="Col-Logo-Home mt-5 mb-5">
            <img src="{{ asset('asiawater/images/logo.jpg') }}" alt="">
        </div>

        <div class="BoxBody-White">
            <div class="container">
                <div class="WarpCol-Detail">
                    <div class="d-flex flex-column align-items-center">
                        <a class="btn ButtonClose" href="{{ url('/') }}">
                            <img src="{{ asset('asiawater/images/ic-close.svg') }}" alt="">
                        </a>
                        <img class="ImgDetail" src="{{ asset('asiawater/images/oxygen.gif') }}" alt="">
                        <p class="Text-wt-detail">
                            Alkiline Water
                        </p>
                        <p class="TextDetail mt-4 mb-4">
                            น้ำดื่มอัลคาไลน์ (Alkiline Water)
                            น้ำอัลคาไลน์ หรือน้ำด่าง น้ำดื่มที่มีค่าความเป็นด่าง รวมถึงมีแว่ธาตุที่ร่างกายต้องการผสมอยู่อย่างมากมาย น้ำอัลคาไลน์เป็น
                            น้ำที่มีโมลกุลขนาดล็ก ทำให้ง่ายที่ร่างกายจะทำการดูดซึมน้ำเข้าไปใช้ประโยขน์ยังส่วนต่างๆ จึงทำให้น้ำด่างมีประโยชน์ต่อสุขภาพมากกว่าน้ำธรรมดา อีกทั้งยังมีความเป็นกรดค่างที่ให้สมดุล พอเหมาะกับร่างกายของมนุษข์ จึงเข้าไปช่วยป้องกันร่างกาย
                            จากการทำลายของกรดส่วนเกินที่เป็นต้นเหตุของโรคร้ายต่างๆ และช่ายฟื้นฟูร่างกายด้วยการชะล้างของเสียลงลึกถึงระดับเซลล์
                            ช่วยต่อต้านอนุมูลอิสระ ทำให้ร่างกายสร้างภูมิคุ้มกันได้ง่ายและแเข็งแรงมากขึ้นนั่นเอง
                        </p>
                    </div>
                    <div class="ColPrice">
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <form method="POST" id="myform" action="{{ url('quantity') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="quantity" class="input-box TextNumber" value="1" min="1" max="10">
                                <input type="hidden" name="watertype" value="alkaline">
                            </form>
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>

                        <button id="btnsubmit" type="button" class="btn ButtonDone">DONE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#btnsubmit').click(function(e){
            $('#myform').submit();
        });
    </script>

    @include('frontend.includes.inc_script')