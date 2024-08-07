@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($page_name);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <a href="{{route('BN_stores_add')}}" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white mr-2 shadow-md" >เพิ่มร้าน</a>    
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="lg:flex intro-y mt-5 mb-5">

        <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="ชื่อ หรือ อีเมล ยูสเซอร์..." value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg> 
        </div>

    </div>
    <!-- <div id="fetchUserss"></div> -->

    @if(isset($query) && count($query)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap"></th>
                    <th class="whitespace-nowrap">ชื่อ</th>
                    <th class="whitespace-nowrap">อีเมล</th>
                    <th class="whitespace-nowrap">ราคา RO</th>
                    <th class="whitespace-nowrap">ราคา ALKALINE</th>
                    <th class="whitespace-nowrap">ราคา OXYGEN</th>
                    <th class="text-center whitespace-nowrap"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
                @php
                // $profile_img = ($res->photo)?asset($res->photo):asset('frontend/images/avatar.jpeg');
                @endphp
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*24)+$keyres+1}}</td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    {{-- <img alt="{{$res->firstname.' '.$res->lastname}}" class="tooltip rounded-full" src="{{$profile_img}}" > --}}
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->name}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->email}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->ro}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->alkaline}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->oxygen}}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('BN_stores_edit', ['id' => $res->id])}}">
                                    <i data-lucide="edit" class="w-4 h-4 mr-1"></i> แก้ไข
                                </a>
                                <a class="flex items-center btn-delete" data-id="{{$res->id}}" href="javascript:void(0);">
                                    <i data-lucide="trash" class="w-4 h-4 mr-1"></i> ลบข้อมูล
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <div class="d-flex">
    {!! $query->appends(request()->input())->links() !!}
    </div>

    @endif
    




@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function applyFilters() {
        var keyword = document.getElementById('keyword').value;
        var newUrl = `{{ route('BN_stores') }}?keyword=${keyword}`;
        window.location.href = newUrl;
    }
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-delete').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false // Use Bootstrap classes instead of default SweetAlert2 styles
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('backend/stores/delete') }}/" + id;
                    }
                })
            });
        });
    });
</script>


@endsection