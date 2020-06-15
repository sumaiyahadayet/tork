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
						Create New Teammate
					</h3>
				</div>
			</div>
			<!--begin::Form-->
               <form method="post" action="{{route('submit-add-team')}}" class="kt-form kt-form--fit kt-form--label-right" enctype="multipart/form-data">
                   @csrf

				<div class="kt-portlet__body">
					<div class="form-group row">

						<label class="col-lg-2 col-form-label">Name</label>
						<div class="col-lg-3">
							<input type="text" name="name"  class="form-control" placeholder="Enter Name">
							<span class="form-text text-muted">Please enter  Name</span>
						</div>

            <label class="col-lg-2 col-form-label">Image</label>
            <div class="col-lg-3 col-xl-3">


                <div class="kt-avatar" id="kt_user_avatar_2">
                    <div class="kt-avatar__holder" style="background-image:url({{asset('assets/images/profile-avater.png')}})"></div>
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
         <label class="col-lg-2 col-form-label">Order *</label>
         <div class="col-lg-3">
             <input type="text" name="ordr" class="form-control" placeholder="Enter Order" required>
             <span class="form-text text-muted">Please enter Order</span>
         </div>


         <label class="col-lg-2 col-form-label">Job</label>
         <div class="col-lg-3">
             <input type="text" name="job" class="form-control" placeholder="Enter job" required>
             <span class="form-text text-muted">Please enter job</span>
         </div>
     </div>
     <div class="form-group row">
    <label class="col-lg-2 col-form-label">Facebook Id</label>
    <div class="col-lg-3">
        <input type="text" name="fb" class="form-control" placeholder="Enter FB ID" required>
        <span class="form-text text-muted">Please enter FB ID</span>
    </div>


    <label class="col-lg-2 col-form-label">Email</label>
    <div class="col-lg-3">
        <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
        <span class="form-text text-muted">Please enter Email</span>
    </div>
</div>
<div class="form-group row">
<label class="col-lg-2 col-form-label">Linkedin</label>
<div class="col-lg-3">
   <input type="text" name="linkedin" class="form-control" placeholder="Enter Linkedin" required>
   <span class="form-text text-muted">Linkedin</span>
</div>


<label class="col-lg-2 col-form-label">Instragram</label>
<div class="col-lg-3">
   <input type="text" name="instra" class="form-control" placeholder="Enter Instragram" required>
   <span class="form-text text-muted">Please enter Instragram</span>
</div>
</div>
            {{-- <div class="col-lg-3">
              <select class="form-control" name="category">
                <option value="">--Select Category--</option>

                {{-- @foreach ($categories as $category)

                @foreach (Categories() as $category)

                  <option value="{{$category->id}}">{{$category->title}}</option>

                @endforeach



              </select>
              <span class="form-text text-muted">Please enter Category</span>
            </div> --}}


          </div>





	            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<button type="submit" class="btn btn-success">Submit</button>
								<a href="/admin/team"  class="btn btn-secondary">Cancel</a>
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
