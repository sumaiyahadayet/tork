<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
     var KTAppOptions = {
          "colors": {
               "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
               },
               "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
               }
          }
     };
</script>
<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/js/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/js/fullcalendar.bundle.js')}}" type="text/javascript"></script>
{{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script> --}}
<script src="{{asset('assets/js/gmaps.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->



<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('assets/js/dashboard.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->


<!--begin::Global App Bundle(used by all pages) -->
<script src="{{asset('assets/js/app.bundle.js')}}" type="text/javascript"></script>
<!--end::Global App Bundle -->

<!--begin::Bootstrap Selectpicker) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.js" type="text/javascript"></script>

<script type="text/javascript">

jQuery(document).ready(function(){
// onkeydown="if (event.keyCode == 13) return false"
     $('form').find('input[type=text],select').keypress(function(e) {

          if (event.keyCode == 13){

               return false;

          }
     });

LoadBootstrapSelect();

});


function LoadBootstrapSelect(){

     $(".kt-selectpicker").selectpicker();

}


</script>
<!--end::Global App Bundle -->

<script>

function UpdateSmsStatusSetting(id, name, input_type) {


    var value = document.getElementById(id).checked;

    if (value == true) {
       document.getElementById('sms_type_settings').classList.remove("hidden");
       document.getElementById('exam_sms_settings').classList.remove("hidden");

    } else {
       document.getElementById('sms_type_settings').classList.add("hidden");
       document.getElementById('exam_sms_settings').classList.add("hidden");
    }


    UpdateSettingInfo(id, name, input_type);



}


function UpdateSettingInfo(id, name, input_type) {

    if (input_type == 'checkbox') {

       var value = document.getElementById(id).checked;

    } else {
       var value = document.getElementById(id).value;
    }

    $.ajax({
       url: '/admin/setting/update',
       type: 'GET',
       data: {
            name: name,
            value: value,
       },
       success: function(response) {
            console.log(response);
       }
    });
}

function UpdateSmsSetting(id, name, column, input_type) {

    if (input_type == 'checkbox') {

       var value = document.getElementById(id).checked;

    } else {
       var value = document.getElementById(id).value;
    }

    $.ajax({
       url: '/admin/setting/sms-update',
       type: 'GET',
       data: {
            name: name,
            value: value,
            column: column,
       },
       success: function(response) {

            console.log(response);
       }
    });
}



function ViewFilteredAdmissions(ajax_view,output_id) {
     var search=null,batch_id=null,class_id=null,course_id=null,batchday_id=null,batchtime_id=null, admission_date=null,institute_id=null,group_id=null,session=null,version=null,birthday=null,status=null;

     if (document.getElementById('search')) {

          search = document.getElementById('search').value;

     }

     if (document.getElementById('batch_id')) {

          batch_id = document.getElementById('batch_id').value;

     }


     if (document.getElementById('class_id')) {

          class_id = document.getElementById('class_id').value;

     }

     if (document.getElementById('course_id')) {

          course_id = document.getElementById('course_id').value;

     }

     if (document.getElementById('batchday_id')) {

          batchday_id = document.getElementById('batchday_id').value;

     }

     if (document.getElementById('batchtime_id')) {

          batchtime_id = document.getElementById('batchtime_id').value;

     }

     if (document.getElementById('admission_date')) {

          admission_date = document.getElementById('admission_date').value;

     }

     if (document.getElementById('institute_id')) {

          institute_id = document.getElementById('institute_id').value;


     }


     if (document.getElementById('group_id')) {

          group_id = document.getElementById('group_id').value;

     }

     if (document.getElementById('session')) {

          session = document.getElementById('session').value;

     }


     if (document.getElementById('version')) {

          version = document.getElementById('version').value;

     }

     if (document.getElementById('birthday')) {

          birthday = document.getElementById('birthday').value;

     }

     if (document.getElementById('status')) {

          status = document.getElementById('status').value;

     }
// console.log(search+" && "+class_id+" && "+course_id+" && "+batchday_id+" && "+batchtime_id+" && "+admission_date+" && "+institute_id+" && "+group_id+" && "+session+" && "+version+" && "+birthday+" && "+status+" && "+ajax_view);

     $.ajax({
       url: '/admin/filtered-admissions',
       type: 'GET',
       data: {
           search: search,
           batch_id: batch_id,
           class_id: class_id,
           course_id: course_id,
           batchday_id: batchday_id,
           batchtime_id: batchtime_id,
           admission_date: admission_date,
           institute_id: institute_id,
           group_id: group_id,
           session: session,
           version: version,
           birthday: birthday,
           status: status,
           ajax_view: ajax_view,
       },
       success: function(response) {

           document.getElementById(output_id).innerHTML = response;
       }
     });

}




function ViewFilteredStudents(ajax_view,output_id) {

     var search = document.getElementById('search').value;
     var class_id = document.getElementById('class_id').value;
     var institute_id = document.getElementById('institute_id').value;
     var group_id = document.getElementById('group_id').value;
     var session = document.getElementById('session').value;
     var version = document.getElementById('version').value;
     var birthday = document.getElementById('birthday').value;
     var status = document.getElementById('status').value;

     $.ajax({
       url: '/admin/filtered-admissions',
       type: 'GET',
       data: {
           search: search,
           class_id: class_id,
           institute_id: institute_id,
           group_id: group_id,
           session: session,
           version: version,
           birthday: birthday,
           status: status,
           ajax_view: ajax_view,
       },
       success: function(response) {

           document.getElementById(output_id).innerHTML = response;
       }
     });

}



function ViewFilteredDuePayments(ajax_view,output_id) {

     var search = document.getElementById('search').value;
     var name = document.getElementById('name').value;
     var phone = document.getElementById('phone').value;
     var class_id = document.getElementById('class_id').value;
     var course_id = document.getElementById('course_id').value;
     var batchday_id = document.getElementById('batchday').value;
     var batchtime_id = document.getElementById('batchtime').value;
     var payment_month = document.getElementById('payment_month').value;
     var payment_year = document.getElementById('payment_year').value;
     var institute_id = document.getElementById('institute_id').value;
     var group_id = document.getElementById('group_id').value;
     var session = document.getElementById('session').value;
     var version = document.getElementById('version').value;
     var birthday = document.getElementById('birthday').value;
     var status = document.getElementById('status').value;

     $.ajax({
       url: '/admin/filtered-admissions',
       type: 'GET',
       data: {
           name: name,
           phone: phone,
           class_id: class_id,
           course_id: course_id,
           batchday_id: batchday_id,
           batchtime_id: batchtime_id,
           admission_date: admission_date,
           institute_id: institute_id,
           group_id: group_id,
           session: session,
           version: version,
           birthday: birthday,
           status: status,
           ajax_view: ajax_view,
       },
       success: function(response) {

           document.getElementById(output_id).innerHTML = response;
       }
     });

}


function ResponseAlert() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}



function Delete(output_id,value){

     document.getElementById(output_id).value=value;

     $('#delete_modal').modal({
            show: true
       });
}

</script>
