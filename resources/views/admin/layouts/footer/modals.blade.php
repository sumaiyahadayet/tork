<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h6 class="modal-title text-center"  id="exampleModalLabel">Confirm Delete..</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div> --}}
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel btn-elevate btn-pill kt-margin-r-60" data-dismiss="modal">Cancel</button>

               <form action="" method="post">
                    @csrf
                    <input type="hidden" name="admission_id" id="admission_id" value="">
                    <button type="submit" class="btn btn-danger btn-elevate btn-pill">Delete</button>
               </form>
            </div>
        </div>
    </div>
</div>
