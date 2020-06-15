@extends('admin.layouts.app')


@section('meta')
@endsection


@section('css')
@endsection


@section('js')
<script src="{{asset('assets/js/html-table.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    function ChangeStatus(student_id, output_id, status) {


        $.ajax({
            url: '/admin/student/update-status',
            type: 'GET',
            data: {
                student_id: student_id,
            },
            success: function(response) {

                if (response == 'Active') {


                    document.getElementById(output_id).innerHTML = 'Active';
                    document.getElementById(output_id).className = "kt-badge--inline kt-badge--pill kt-badge  kt-badge--primary";


                } else {


                    document.getElementById(output_id).innerHTML = 'Inactive';
                    document.getElementById(output_id).className = "kt-badge--inline kt-badge--pill kt-badge  kt-badge--danger";


                }



            }
        });

    }
</script>
@endsection


@section('content-head')

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item d-print-none" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Dashboard</h3>

        <span class="kt-subheader__separator kt-subheader__separator--v"></span>

        <span class="kt-subheader__desc">#XRS-45670</span>

        <a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
            Add New
        </a>

        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
            <input type="text" class="form-control" placeholder="Search order...">
            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                <span><i class="flaticon2-search-1"></i></span>
            </span>
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            <a href="#" class="btn kt-subheader__btn-secondary">Today</a>

            <a href="#" class="btn kt-subheader__btn-secondary">Month</a>

            <a href="#" class="btn kt-subheader__btn-secondary">Year</a>

            <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                <i class="flaticon2-calendar-1"></i>
            </a>

            <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path
                              d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                              id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                              d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                              id="Combined-Shape" fill="#000000" />
                        </g>
                    </svg>
                    <!--<i class="flaticon2-plus"></i>-->
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

@endsection


@section('content')

<style media="screen">
    .text-muted {
        display: none;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Create New Category
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form method="post" action="{{route('submit-edit-category')}}" class="kt-form kt-form--fit kt-form--label-right" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">



                <div class="kt-portlet__body">
                    <div class="form-group row">

                        <label class="col-lg-2 col-form-label">Title</label>
                        <div class="col-lg-3">
                            <input type="text" name="title" value="{{$data->title}}"  class="form-control" placeholder="Enter Title">
                            <span class="form-text text-muted">Please enter a title</span>
                        </div>
                        <label class="col-lg-2 col-form-label">Order *</label>
                        <div class="col-lg-3">
                            <input type="text" name="order" value="{{$data->order}}" class="form-control" placeholder="Enter Order" required>
                            <span class="form-text text-muted">Please enter the order</span>
                        </div>
                    </div>

                    <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>

@endsection


@section('modals')



@endsection
