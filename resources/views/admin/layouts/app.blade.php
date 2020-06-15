<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->

<head>

     <title>{{ config('app.name', 'RMS') }} </title>
    @include('admin.layouts.header.meta')
    @yield('meta')


    <!-- Favicon icon -->
    <link rel="shortcut icon" href="" type="image/x-icon">


    @include('admin.layouts.assets.font')

    @yield('css')
    @include('admin.layouts.assets.css')

</head>
<!-- end::Head -->

<!-- begin::Body -->

<!-- begin::Body -->
<body  class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >


<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
<div class="kt-header-mobile__logo">
      <a href="{{route('dashboard')}}">
           <img alt="Logo" src="{{asset('assets/logo-light.png')}}"/>
      </a>
</div>
<div class="kt-header-mobile__toolbar">
      <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

      <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
      <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
</div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

     @include('admin.layouts.sidebar.sidebar')

           <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
               @include('admin.layouts.header.navbar')

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">


@yield('content-head')


<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<!--Begin::Dashboard 1-->

{{-- @if (RoleCheck(Auth::User()->id)!='' && MyRole(Auth::User()->id)=='super-admin') --}}

     @yield('content')

{{-- @else
     <div class="alert alert-danger" role="alert">
          <div class="alert-icon"></div>
               <div class="alert-text">
                    <h1 class="text-center">
                         <br>
                         <i class="flaticon-questions-circular-button"></i> &nbsp You Are Not Permitted To Access This!
                         <br>
                         <br>
                    </h1>

               </div>
     </div>

@endif --}}
<!--End::Dashboard 1-->
</div>
<!-- end:: Content -->
</div>

<!-- begin:: Footer -->
<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop d-print-none">
<div class="kt-footer__copyright">
      2019&nbsp;&copy;&nbsp;<a href="https://pentaface.com" target="_blank" class="kt-link">PentaFace</a>
</div>
<div class="kt-footer__menu">
      <a href="#" target="_blank" class="kt-footer__menu-link kt-link">About</a>
      <a href="#" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
      <a href="#" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
</div>
</div>
<!-- end:: Footer -->
</div>
</div>
</div>

<!-- end:: Page -->






@include('admin.layouts.sidebar.sticky-toolbar')

@yield('modals')

@include('admin.layouts.assets.js')

@yield('js')

<script type="text/javascript">

setInterval(
     function(){


          $.ajax({
             url: '/admin/payment/update-due-payments',
             type: 'GET',
             data: {

             },
             success: function(response) {

                     // alert(response);

             }
         });


    }, 3600000);



@if($errors->any())

    ShortToast('','{{$errors->first('message')}}', '{{$errors->first('type')}}')

@endif


</script>

</body>
<!-- end::Body -->

</html>
