@extends('../frontend/layouts/layout')

@section('subhead')
    <title>รถพร้อมขาย - customer-contact</title>
@endsection

@section('content')

<?php


// $qqq = 7;
// echo "<pre>";
// print_r(count($query_contact_back));
// echo "</pre>";
// echo "<pre>";
// print_r($query_contact_back);
// echo "</pre>";

foreach($query_contact_back as $kkkk => $QRY){
    
    // echo strtoupper($QRY->modelyear." ".$QRY->brand_title." ".$QRY->model_name."<br>");
    // echo "<pre>";
    // print_r($QRY);
    // echo "</pre>";
}
?>
@include('frontend.layouts.inc_profile')	
<section class="row">
    <div class="col-12 page-profile">
        <div class="container">
            <div class="row">
                @include('frontend.layouts.inc-menuprofile-search')
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="desc-pageprofile">
                        <div class="wraptopic-pageprofile">
                            <div class="topic-profilepage"><i class="bi bi-circle-fill"></i> รอติดต่อกลับ</div>
                            <button class="show-menuprofile"><i class="bi bi-search"></i>ค้นหารถในบัญชี</button>
                        </div>
                        <!-- <div class="box-selectdate">
                            <div class="input-daterange input-group" id="datepicker">
                                <span class="txt-daterange">วันที่</span>
                                <input type="text" name="start" placeholder="วว / ดด / ปป"/>
                                <span>ถึง</span>
                                <input type="text" name="end" placeholder="วว / ดด / ปป"/>
                            </div>
                        </div> -->

                        <div class="wrap-detailcustomer mt-5">

                            @php 
                            $cont_count = 0;
                            @endphp
                            @foreach($query_contact_back as $keycont => $contact)
                            @php 
                            $cont_count++;
                            $resve_state = ($contact->contact_status=='contact')?'active':'';
                            @endphp
                            <div class="item_customer">
                                <div class="box-topiccustomer">
                                    <div class="row">
                                        <div class="col-12 col-md-5 col-xl-6">
                                            <div class="customer-carname">{{(($query_contact_back->currentPage()-1)*24)+$cont_count}}. <a href="{{route('cardetailPage', ['post' => $contact->cars_id])}}">{{strtoupper($contact->modelyear." ".$contact->brand_title." ".$contact->model_name)}}</a></div>
                                        </div>
                                        <div class="col-3 col-md-2 col-xl-2">
                                            <div class="customer-date">{{date('d/m/Y', strtotime($contact->created_at))}}</div>
                                        </div>
                                        <div class="col-9 col-md-5 col-xl-4 text-end">
                                            <!-- <button class="btn-cus-delete button-delete"><i class="bi bi-trash3-fill"></i></button> -->
                                            <!-- <div class="status-contactcus">


                                                <select name="color" id="color" data-post="{{$contact->cars_id}}">
                                                    <option value="create" {{($contact->status == 'create')?'selected':'';}}>ยังไม่ได้ติดต่อ</option>    
                                                    <option value="contact" {{($contact->status == 'contact')?'selected':'';}}>ติดต่อแล้ว</option>  
                                                </select>
                                            </div> -->
                                            <button class="mycar-reserve contact-already  {{$resve_state}}" data-post-id="{{$contact->contact_id}}" data-current-value="{{$contact->contact_status}}" >
                                            <img src="{{asset('frontend/images/icon-check.svg')}}" class="svg" alt=""> ติดต่อแล้ว</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="btn-contactcus"><img src="{{asset('frontend/images/icon-chev-grey.svg')}}" alt=""></div>
                                <div class="detail-contactcus">
                                    <p>ชื่อ - นามสกุล :  <span>{{$contact->name}}</span> </p> 
                                    <p>เบอร์โทรติดต่อ : <span><a href="tel:0812345678" target="_blank">{{$contact->tel}}</a></span> </p> 
                                    <p>เวลาที่สะดวกให้ติดต่อกลับ : <span>{{$contact->time}}</span></p> 
                                    <p>หมายเหตุ : <span>{{$contact->remark}}</span></p>
                                    <div class="share-contactcus">
                                        <div class="wrap-btnshare">
                                            แชร์ : 
                                            <a href="#" class="btn-popupshare icon-fb"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="btn-popupshare icon-messenger"><i class="bi bi-messenger"></i></a>
                                            <a href="#" class="btn-popupshare icon-line"><i class="bi bi-line"></i></a>
                                            <a class="btn-copy" data-link="{{route('cardetailPage', ['post' => $contact->cars_id])}}<br>ชื่อ - นามสกุล : {{$contact->name}}<br>เบอร์โทรติดต่อ : {{$contact->tel}}<br>เวลาที่สะดวกให้ติดต่อกลับ : {{$contact->time}}<br>หมายเหตุ : {{$contact->remark}}" ><i class="bi bi-link-45deg"></i> copy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <!-- <div class="item_customer">
                                <div class="box-topiccustomer">
                                    <div class="row">
                                        <div class="col-12 col-md-5 col-xl-6">
                                            <div class="customer-carname">1. <a href="car-detail.php">2023 BMW X1</a></div>
                                        </div>
                                        <div class="col-3 col-md-2 col-xl-2">
                                            <div class="customer-date">31/07/2023</div>
                                        </div>
                                        <div class="col-9 col-md-5 col-xl-4 text-end">
                                            <button class="btn-cus-delete button-delete"><i class="bi bi-trash3-fill"></i></button>
                                            <div class="status-contactcus">
                                                <select name="color" id='color' onchange="changeColor(this)">
                                                    <option value="#D82E2E">ยังไม่ได้ติดต่อ</option>    
                                                    <option value="#41AC6D">ติดต่อแล้ว</option>  
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-contactcus"><img src="{{asset('frontend/images/icon-chev-grey.svg')}}" alt=""></div>
                                <div class="detail-contactcus">
                                    <p>ชื่อ - นามสกุล :  <span>สมชาย ใจดี</span> </p> 
                                    <p>เบอร์โทรติดต่อ : <span><a href="tel:0812345678" target="_blank">0812345678</a></span> </p> 
                                    <p>เวลาที่สะดวกให้ติดต่อกลับ : <span>10.00น.</span></p> 
                                    <p>หมายเหตุ : <span>-</span></p>
                                    <div class="share-contactcus">
                                        <div class="wrap-btnshare">
                                            แชร์ : 
                                            <a href="#" class="btn-popupshare icon-fb"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="btn-popupshare icon-messenger"><i class="bi bi-messenger"></i></a>
                                            <a href="#" class="btn-popupshare icon-line"><i class="bi bi-line"></i></a>
                                            <a href="#" class="btn-copy"><i class="bi bi-link-45deg"></i> copy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item_customer">
                                <div class="box-topiccustomer">
                                    <div class="row">
                                        <div class="col-12 col-md-5 col-xl-6">
                                            <div class="customer-carname">2. <a href="car-detail.php">2023 BMW X1</a></div>
                                        </div>
                                        <div class="col-3 col-md-2 col-xl-2">
                                            <div class="customer-date">31/07/2023</div>
                                        </div>
                                        <div class="col-9 col-md-5 col-xl-4 text-end">
                                            <button class="btn-cus-delete button-delete"><i class="bi bi-trash3-fill"></i></button>
                                            <div class="status-contactcus">
                                                <select name="color" id='color' onchange="changeColor(this)">
                                                    <option value="#D82E2E">ยังไม่ได้ติดต่อ</option>    
                                                    <option value="#41AC6D">ติดต่อแล้ว</option>  
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-contactcus"><img src="{{asset('frontend/images/icon-chev-grey.svg')}}" alt=""></div>
                                <div class="detail-contactcus">
                                    <p>ชื่อ - นามสกุล :  <span>สมชาย ใจดี</span> </p> 
                                    <p>เบอร์โทรติดต่อ : <span><a href="tel:0812345678" target="_blank">0812345678</a></span> </p> 
                                    <p>เวลาที่สะดวกให้ติดต่อกลับ : <span>10.00น.</span></p> 
                                    <p>หมายเหตุ : <span>-</span></p>
                                    <div class="share-contactcus">
                                        <div class="wrap-btnshare">
                                            แชร์ : 
                                            <a href="#" class="btn-popupshare icon-fb"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="btn-popupshare icon-messenger"><i class="bi bi-messenger"></i></a>
                                            <a href="#" class="btn-popupshare icon-line"><i class="bi bi-line"></i></a>
                                            <a href="#" class="btn-copy"><i class="bi bi-link-45deg"></i> copy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item_customer">
                                <div class="box-topiccustomer">
                                    <div class="row">
                                        <div class="col-12 col-md-5 col-xl-6">
                                            <div class="customer-carname">3. <a href="car-detail.php">2023 BMW X1</a></div>
                                        </div>
                                        <div class="col-3 col-md-2 col-xl-2">
                                            <div class="customer-date">31/07/2023</div>
                                        </div>
                                        <div class="col-9 col-md-5 col-xl-4 text-end">
                                            <button class="btn-cus-delete button-delete"><i class="bi bi-trash3-fill"></i></button>
                                            <div class="status-contactcus">
                                                <select name="color" id='color' onchange="changeColor(this)">
                                                    <option value="#D82E2E">ยังไม่ได้ติดต่อ</option>    
                                                    <option value="#41AC6D">ติดต่อแล้ว</option>  
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-contactcus"><img src="{{asset('frontend/images/icon-chev-grey.svg')}}" alt=""></div>
                                <div class="detail-contactcus">
                                    <p>ชื่อ - นามสกุล :  <span>สมชาย ใจดี</span> </p> 
                                    <p>เบอร์โทรติดต่อ : <span><a href="tel:0812345678" target="_blank">0812345678</a></span> </p> 
                                    <p>เวลาที่สะดวกให้ติดต่อกลับ : <span>10.00น.</span></p> 
                                    <p>หมายเหตุ : <span>-</span></p>
                                    <div class="share-contactcus">
                                        <div class="wrap-btnshare">
                                            แชร์ : 
                                            <a href="#" class="btn-popupshare icon-fb"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="btn-popupshare icon-messenger"><i class="bi bi-messenger"></i></a>
                                            <a href="#" class="btn-popupshare icon-line"><i class="bi bi-line"></i></a>
                                            <a href="#" class="btn-copy"><i class="bi bi-link-45deg"></i> copy</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                        </div>
                        <div class="d-flex">
                            {!! $query_contact_back->links() !!}
                        </div>
                    </div>
                    <div class="totop-mb"><a id="button-top">กลับสู่ด้านบน</a></div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')


<script>

    document.querySelectorAll('.contact-already').forEach(button => {
        button.addEventListener('click', function () {
            var postId = this.getAttribute('data-post-id');
            var currentValue = this.getAttribute('data-current-value');

            // You can customize the Swal.fire() method according to your needs
            Swal.fire({
                title: 'เปลี่ยนสถานะการติดต่อ ?',
                // text: 'You are about to toggle the data for post ' + postId + '!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle the toggle action here using Ajax or any other method
                    // For example, you can use Axios to make an Ajax request
                    axios.post('/update-contackback', {
                        id: postId,
                        currentValue: currentValue,
                        // Other data to be sent for toggle
                    })
                    .then((response) => {
                        // Handle the success response
                        Swal.fire({
                            title: 'สำเร็จ !',
                            // text: 'Your data has been toggled for post ' + postId + '.',
                            icon: 'success'
                        }).then(() => {
                            // Reload the page after clicking "OK"
                            location.reload();
                        });
                        
                        // Update the button's data-current-value attribute after a successful toggle
                        this.setAttribute('data-current-value', response.data.newValue);
                    })
                    .catch((error) => {
                        // Handle the error response
                        Swal.fire(
                            'ล้มเหลว!',
                            'ไม่สามารถทำตามที่ร้องขอได้ !!!',
                            'error'
                        );
                    });
                }
            });
        });
    });




    document.addEventListener('DOMContentLoaded', function () {
        var colorSelect = document.getElementById('color');

        colorSelect.addEventListener('change', function () {
            var selectedValue = colorSelect.value;
            var contactId = colorSelect.getAttribute('data-post');

            var xhr = new XMLHttpRequest();
            var url = '/updateContactStatus/' + contactId;
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Reload the page upon successful update
                    location.reload();
                } else {
                    console.log('Error:', xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.log('Request failed');
            };

            var data = 'status=' + encodeURIComponent(selectedValue);
            xhr.send(data);
        });
    });
</script>





<script>
    document.addEventListener('DOMContentLoaded', function () {
  var copyButtons = document.querySelectorAll('.btn-copy');

  copyButtons.forEach(function (copyButton) {
    copyButton.addEventListener('click', function () {
      var linkToCopy = copyButton.getAttribute('data-link');
      
      // Replace HTML line breaks with plain text line breaks
      linkToCopy = linkToCopy.replace(/<br>/g, '\n');

      // Create a textarea element to hold plain text content
      var tempInput = document.createElement('textarea');
      tempInput.value = linkToCopy;
      document.body.appendChild(tempInput);

      tempInput.select();
      document.execCommand('copy');

      document.body.removeChild(tempInput);

      // Change the button text temporarily for feedback
      copyButton.innerHTML = '<i class="bi bi-check"></i> Copied';
      setTimeout(function () {
        copyButton.innerHTML = '<i class="bi bi-link-45deg"></i> Copy';
      }, 2000);
    });
  });
});

// document.addEventListener('DOMContentLoaded', function () {
//   var copyButtons = document.querySelectorAll('.btn-copy');

//   copyButtons.forEach(function (copyButton) {
//     copyButton.addEventListener('click', function () {
//       var linkToCopy = copyButton.getAttribute('data-link');

//       // Create a textarea element to hold plain text content
//       var tempInput = document.createElement('textarea');
//       tempInput.value = linkToCopy;
//       document.body.appendChild(tempInput);

//       tempInput.select();
//       document.execCommand('copy');

//       document.body.removeChild(tempInput);

//       // Change the button text temporarily for feedback
//       copyButton.innerHTML = '<i class="bi bi-check"></i> Copied';
//       setTimeout(function () {
//         copyButton.innerHTML = '<i class="bi bi-link-45deg"></i> Copy';
//       }, 2000);
//     });
//   });
// });

// document.addEventListener('DOMContentLoaded', function () {
//   var copyButtons = document.querySelectorAll('.btn-copy');

//   copyButtons.forEach(function (copyButton) {
//     copyButton.addEventListener('click', function () {
//       var linkToCopy = copyButton.getAttribute('data-link');

//       // Get text from <p> elements
//       var detailContact = copyButton.closest('.detail-contactcus');
//       var paragraphs = detailContact.querySelectorAll('p');
//       paragraphs.forEach(function (paragraph) {
//         linkToCopy += ' ' + paragraph.innerText;
//       });

//       var tempInput = document.createElement('input');
//       tempInput.value = linkToCopy;
//       document.body.appendChild(tempInput);

//       tempInput.select();
//       document.execCommand('copy');
      
//       document.body.removeChild(tempInput);

//       // Change the button text temporarily for feedback
//       copyButton.innerHTML = '<i class="bi bi-check"></i> Copied';
//       setTimeout(function () {
//         copyButton.innerHTML = '<i class="bi bi-link-45deg"></i> Copy';
//       }, 2000);
//     });
//   });
// });

</script>

<script>
    $('.input-daterange').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });
</script>
<script>
    function changeColor(e)
    {
        var color = e.value;
        e.style.color=color;
    }
</script>
<script>
    $(document).on('click', '.button-delete', function(e) {
        Swal.fire({
        title: 'ยืนยันการลบข้อมูล',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#C60D0D',
        cancelButtonColor: '#666',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
        denyButtonText: 'ยกเลิก'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'ลบข้อมูลสำเร็จ',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#C60D0D',
            })
        }
        })
  });
</script>
@endsection

