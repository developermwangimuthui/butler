<!-- Modal -->
<div class="modal fade text-left" id="truck_make_info" tabindex="-1" data-backdrop="false" role="dialog"
    aria-labelledby="myModalLabel11" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Truck</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="repeater-default">
                    <form class="form" method="POST" action="{{ route('make.store') }}" enctype="multipart/form-data">
                        <input type="hidden" id="add_make_method" name="_method" value="POST">
                        @csrf
                        <div data-repeater-list="trucks">
                            <div data-repeater-item>
                                <div class="form-row">

                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                        <label for="make">Truck Make</label>
                                        <br>
                                        <input type="text" class="form-control" id="make" name="make"
                                            placeholder="Truck Make">
                                    </div>
                                    <div class="form-group mb-1 col-sm-12 col-md-4">
                                        <label for="description">Description</label>
                                        <br>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="optional">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                        <button type="button" class="btn btn-danger" data-repeater-delete> <i
                                                class="ft-x"></i>
                                            Delete</button>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="id" id="id" value="">

                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>

                            <a data-repeater-create class="btn btn-primary" id="repeat_btn" >
                                    <i class="ft-plus"></i> Add
                            </a>

                            <button type="submit" id="submit_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>

                </div>

                {{-- Edit Form --}}
                <div class="edit-form d-none">
                    <form action="">
                        <div class="form-row edit-form ">
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <label for="make">Truck Make</label>
                                <br>
                                <input type="text" class="form-control" id="make_make" name="make"
                                    placeholder="Truck Make">
                            </div>
                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                <label for="description">Description</label>
                                <br>
                                <input type="text" class="form-control" id="make_description" name="description"
                                    placeholder="optional">
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="id" id="make_id" value="">

                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>

                            <button type="submit" id="make_submit_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>
<script>
    /* ===================== Add Truck Make Toggle ============================ */
    $(document).on("click", "#addMake", function(e) {
        e.preventDefault();

        $('#submit_btn').text("Save");
        $('#myModalLabel11').text("Add Truck Make");

        $('#add_make_method').val('POST');

        $('#repeat_btn').prop('hidden', false)


        $('#id').val('');
        $('#make').val('');
        $('#description').val('');



        $('#truck_make_info').modal('show');
    });

    /* ===================== Edit Truck Make Toggle ============================ */
    $(document).on("click", "#edit_Truck_Make", function(e) {
        e.preventDefault();

        $('#submit_btn_1').text("Update");
        $('#myModalLabel11').text("Edit Truck Make");

        $('.repeater-default').hide()
        $('.edit-form').show()


        let id = $(this).attr('data-id'),
            make = $(this).attr('data-make'),
            description = $(this).attr('data-description');



        $('#add_make_method').val('PUT');


        $('#make_id').val(id);
        $('#make_make').val(make);
        $('#make_description').val(description);



        $('#truck_make_info').modal('show');
    });
</script>
