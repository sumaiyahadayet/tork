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
<div class="d-print-none" id="snackbar">

    <div class="alert kt-padding-l-30 kt-padding-r-30 kt-padding-0 alert-@if (isset($alert)&&$alert!=''){{$alert_type}}@endif" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        @if (isset($alert)&&$alert!=''){{$alert}}
        @endif</div>
    </div>

</div>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg d-print-none">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Student
                <small> Registered student profile list.</small>
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">

                    <div class="dropdown dropdown-inline">
                        <a href="{{route('add-team')}}" class="btn btn-success btn-icon-sm">
                            <i class="la la-plus"></i>
                            New Data
                        </a>
                    </div>

                    &nbsp;

                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-primary btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i> Filter By
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Choose an option</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{url('admin/student?type=Active')}}" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-print"></i>
                                        <span class="kt-nav__link-text">Active</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="{{url('admin/student?type=Inactive')}}" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-copy"></i>
                                        <span class="kt-nav__link-text">Inactive</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    &nbsp;
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-danger btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i> Export
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Choose an option</span>
                                </li>

                                <li class="kt-nav__item">
                                    <a onclick="window.print()" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                        <span class="kt-nav__link-text">PDF</span>
                                    </a>
                                </li>


                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                        <span class="kt-nav__link-text">Excel</span>
                                    </a>
                                </li>


                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-text-o"></i>
                                        <span class="kt-nav__link-text">CSV</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body d-print-none">
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="row align-items-center">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-input-icon kt-input-icon--left">
                                <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 kt-align-right">

                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
        <!--begin: Datatable -->
        <table class="kt-datatable" id="html_table" width="100%">
            <thead>
                <tr>
                    <th title="Field #2">name</th>
                    <th title="Field #3">Image</th>
                    <th title="Field #4">job</th>
                    <th title="Field #5">fb</th>
                    <th title="Field #5">email</th>
                         <th title="Field #5">linkedin</th>
                              <th title="Field #5">instra</th>
                                   <th title="Field #5">order</th>
<th class="d-print-none" title="Field #8">Actions</th>
                    <th title="Field #5">Created At</th>

                </tr>
            </thead>
            <tbody>

                @foreach($data as $team)

                <tr>
                    {{-- <td>
                       <span class="custom-checkbox">
                           <input type="checkbox" id="checkbox1" name="options[]" value="1">
                           <label for="checkbox1"></label>
                       </span>
                   </td> --}}
                    {{-- <td>{{$serial}}</td> --}}
                    <td>{{$team->name}}</td>
                    <td>
                        <img src="{{asset($team->image)}}" style="height:80px;width:auto" alt="">
                    </td>
                    <td>{{$team->job}}</td>
                    <td>{{$team->fb}}</td>
                    <td>{{$team->email}}</td>
                    <td>{{$team->linkedin}}</td>
                    <td>{{$team->instra}}</td>
                    <td>{{$team->ordr}}</td>
                    {{-- <td>
                      @if (Category($portfolio->category))

                    {{Category($portfolio->category)->title}}

                    @else

                    Not Found

                    @endif
                  </td> --}}

                     <td>
                     <a href="/admin/edit-team/{{$team->id}}" class="edit"><i class="la la-edit" data-toggle="tooltip" title="Edit"></i></a>
                     <a href="/admin/delete-team/{{$team->id}}" class="delete"> <i class="la la-trash" data-toggle="tooltip" title="Delete"></i> </a>
                    </td>
                    <td>{{$team->created_at}}</td>
                    {{--<td class="d-print-none">
                        <span>
                            <a href="/admin/student/update/1" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                <i class="la la-edit"></i>
                            </a>
                            <a title="Delete" data-toggle="modal" onclick="Delete('student_id',1)" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                <i class="la la-trash"></i>
                            </a>
                    </td> --}}
                </tr>
                @endforeach

            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection

{{--
@section('modals')
<div id="addPortfolioModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('add-portfolio')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>serial</label>
                        <input type="text" name="serial" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>url</label>
                        <input type="url" name="url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>category</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div> --}}
{{-- <div id="updatePortfolioModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('update-portfolio')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>serial</label>
                        <input type="text" name="serial" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>url</label>
                        <input type="url" name="url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>category</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
            </form>
        </div>
    </div>
</div> --}}

{{-- <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                     <h6 class="modal-title text-center"  id="exampleModalLabel">Confirm Delete..</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     </button>
                 </div> --}}
            {{-- <div class="modal-body">
                <br>
                <div class="modal-icon text-center">

                    <div class="trash-icon">
                        <i class="fa fa-trash"></i>
                    </div>
                    <br>


                </div>
                <h1 class="text-center">Delete this Data ?</h1>
                <p class="text-center kt-padding-t-10 kt-padding-r-100-desktop kt-padding-l-100-desktop"><b>Note:</b> This action is final and you will unable to recover any data. </p>

            </div>

            <form action="" method="post">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel btn-elevate btn-pill kt-margin-r-60" data-dismiss="modal">Cancel</button>

                    <input type="hidden" name="student_id" id="student_id" value="">
                    <button type="submit" class="btn btn-danger btn-elevate btn-pill">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection --}}
