@extends('admin.layouts.app')


@section('meta')
@endsection


@section('css')
@endsection


@section('js')
<!--begin::Page Scripts(used by this page) -->
     <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
     <script src="{{asset('assets/js/avatar.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->
@endsection


@section('content-head')

@include('admin.layouts.header.content-head')


@endsection


@section('content')
     <style media="screen">
          .text-muted{
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
						Update Teammate
					</h3>
				</div>
			</div>
			<!--begin::Form-->
               <form method="post" action="{{route('update-team')}}" class="kt-form kt-form--fit kt-form--label-right" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="id" value="{{$data->id}}">

				<div class="kt-portlet__body">
					<div class="form-group row">

						<label class="col-lg-2 col-form-label">Name</label>
						<div class="col-lg-3">
							<input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Url">
							<span class="form-text text-muted">Please enter  Name</span>
						</div>

            <label class="col-lg-2 col-form-label">Image</label>
            <div class="col-lg-3 col-xl-3">

              <input type="hidden" name="old_image" value="{{$data->image}}">

                <div class="kt-avatar" id="kt_user_avatar_2">
                    <div class="kt-avatar__holder" style="background-image: @if($data->image!='') url({{asset($data->image)}}) @else url({{asset('assets/images/profile-avater.png')}}) @endif"></div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change Image">
                        <i class="fa fa-pen"></i>
                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                    </label>
                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel Image">
                        <i class="fa fa-times"></i>
                    </span>
                </div>
                <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
            </div>
					</div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">Order</label>
						<div class="col-lg-3">
							<input type="text" name="ordr" value="{{$data->ordr}}" class="form-control" placeholder="Enter Order">
							<span class="form-text text-muted">Please enter  Order</span>
						</div>



                              <label class="col-lg-2 col-form-label">job</label>
                  						<div class="col-lg-3">
                  							<input type="text" name="job" value="{{$data->job}}" class="form-control" placeholder="Enter Order">
                  							<span class="form-text text-muted">Please enter  Order</span>
                  						</div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">fb</label>
                              <div class="col-lg-3">
                                   <input type="text" name="fb" value="{{$data->fb}}" class="form-control" placeholder="Enter Order">
                                   <span class="form-text text-muted">Please enter  fb</span>
                              </div>



                              <label class="col-lg-2 col-form-label">email</label>
                                             <div class="col-lg-3">
                                                  <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="Enter Order">
                                                  <span class="form-text text-muted">Please enter  email</span>
                                             </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-form-label">linkedin</label>
                              <div class="col-lg-3">
                                   <input type="text" name="linkedin" value="{{$data->linkedin}}" class="form-control" placeholder="Enter Order">
                                   <span class="form-text text-muted">Please enter linkedin</span>
                              </div>



                              <label class="col-lg-2 col-form-label">instra</label>
                                             <div class="col-lg-3">
                                                  <input type="text" name="instra" value="{{$data->instra}}" class="form-control" placeholder="Enter Order">
                                                  <span class="form-text text-muted">Please enter instra</span>
                                             </div>
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
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>

</div>


@endsection
