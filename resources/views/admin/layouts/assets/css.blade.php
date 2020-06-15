<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{asset('assets/css/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->


<!--begin::Global Theme Styles(used by all pages) -->
<link href="{{asset('assets/css/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->
<link href="{{asset('assets/css/base_light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/menu_light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/brand_dark.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/aside_dark.css')}}" rel="stylesheet" type="text/css" />
<!--end::Layout Skins -->

<!--end::Layout Skins -->


<style media="screen">

     .hidden{
          display: none!important;
     }

     .datepicker{
          z-index: 999!important;
     }
     th,td{
          padding: 10px;
     }
     tr{
          border-bottom:1px solid #f0f3ff;
     }

     table input{
          width: 120px!important;
          border: 1px solid #077e5b!important;
     }

     table input[type='number'] {
    -moz-appearance:textfield;
     }

     table input::-webkit-outer-spin-button,
     table input::-webkit-inner-spin-button {
         -webkit-appearance: none;
     }

     .table-scroll-y{
          height: 300px;
          overflow-y: overlay;
          margin: 20px 0px;
     }
     .blue_background{
          background:#5867dd;
          color:#ffffff;
     }
     .pink_background{
          background:#e83e8c;
          color:#ffffff;
     }
     .modal{
          background: #00000099;
     }

     .modal .modal-content {
          border-radius: 20px;
          border: 0px;
     }
     .modal-footer{
          background: #7e1ad9;
          border-radius: 0px 0px 20px 20px;
          border: 0px;
          display: block;
          text-align: center;
     }

     .modal-header .modal-title{
          color: #7e1ad9!important;
          width: 100%;
          text-transform: uppercase;
          font-size: 14px!important;
     }

     .btn-cancel{
          background: #ffffff;
     }

     .btn-cancel:hover{
          background: #eeeeee;
     }
     .modal-icon .trash-icon i{
          padding: 10px;
          border: 5px solid;
          border-radius: 50%;
          width: 72px;
          height: 72px;
          color:#fd397a;
          font-size: 36px;
          line-height: 1.2;
     }
     .modal-footer{
          padding: 1rem;
     }
     .modal-footer button{
          padding: 1rem 2rem;
     }
     #snackbar{
          position: fixed;
          top: 10px;
          z-index: 9999;
          left: 50%;
          width: 500px;
          margin-left: -250px;
          visibility: hidden;
     }

     #snackbar.show {
          visibility: visible; /* Show the snackbar */
          /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
          However, delay the fade out process for 2.5 seconds */
          -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
          animation: fadein 0.5s, fadeout 0.5s 2.5s;
     }


     /* Animations to fade the snackbar in and out */
     @-webkit-keyframes fadein {
       from {bottom: 0; opacity: 0;}
       to {bottom: 30px; opacity: 1;}
     }

     @keyframes fadein {
       from {bottom: 0; opacity: 0;}
       to {bottom: 30px; opacity: 1;}
     }

     @-webkit-keyframes fadeout {
       from {bottom: 30px; opacity: 1;}
       to {bottom: 0; opacity: 0;}
     }

     @keyframes fadeout {
       from {bottom: 30px; opacity: 1;}
       to {bottom: 0; opacity: 0;}
     }


</style>
