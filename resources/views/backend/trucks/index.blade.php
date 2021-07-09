@extends('backend.layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Trucks</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Trucks</a>
                                </li>
                                <li class="breadcrumb-item active">All Trucks
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addTruck"><i
                                class="ft-plus icon-left"></i> Add Trucks
                        </button>
                    </div>
                </div>

            </div>
            <div class="content-body">

                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Trucks</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">

                                        <table
                                            class="table table-striped table-bordered file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Truck Type</th>
                                                    <th>Registration</th>
                                                    <th>Make</th>
                                                    <th>Load Capacity</th>
                                                    <th>Cargo bed dimensions</th>
                                                    <th>Owners Name</th>
                                                    <th>Owners Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trucks as $truck)
                                                    <tr>
                                                        <td>{{ $truck->truck_type->type }}</td>
                                                        <td>{{ $truck->registration }}</td>
                                                        <td>{{ $truck->truck_make->make }}</td>
                                                        <td>{{ $truck->load_capacity }}</td>
                                                        <td>{{ $truck->cargo_bed_dimensions }}</td>
                                                        <td>{{ $truck->owners_name }}</td>
                                                        <td>{{ $truck->owners_phone }}</td>
                                                        <td>

                                                            <span><i class="ft-edit-1" id="editTruck"
                                                                    data-id="{{ $truck->id }}"
                                                                    data-truck_type="{{ $truck->type_id }}"
                                                                    data-registration=" {{ $truck->registration }}"
                                                                    data-model=" {{ $truck->make_id }}"
                                                                    data-load_capacity="{{ $truck->load_capacity }}"
                                                                    data-cargo_bed_dimensions="{{ $truck->cargo_bed_dimensions }}"
                                                                    data-owners_name="{{ $truck->owners_name }}"
                                                                    data-owners_phone="{{ $truck->owners_phone }}"
                                                                    title="edit">
                                                                </i>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('truck.delete', $truck->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>Truck Type</th>
                                                    <th>Registration</th>
                                                    <th>Model</th>
                                                    <th>Load Capacity</th>
                                                    <th>Cargo bed dimensions</th>
                                                    <th>Owners Name</th>
                                                    <th>Owners Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- File export table -->

                {{-- Truck Types --}}
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Trucks Types</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                            <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addTruckType"><i
                                                    class="ft-plus icon-left"></i> Add Truck Type</button>        
                                        </div>    

                                        <table class="table table-striped table-bordered file-export">
                                            <thead>
                                                <tr>
                                                    <th>Truck Type</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($truck_types as $truck_type)
                                                    <tr>
                                                        <td>{{ $truck_type->type }}</td>
                                                        <td>{{ $truck_type->description }}</td>
                                                        <td>

                                                            <span><i class="ft-edit-1" id="edit_truck_type"
                                                                    data-id="{{ $truck_type->id }}"
                                                                    data-truck_type="{{ $truck_type->type }}"
                                                                    data-description=" {{ $truck_type->description }}"
                                                                    title="edit">
                                                                </i>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('type.delete', $truck_type->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Truck Type</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- File export table -->

                {{-- Truck Makes --}}
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Truck Makes</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">

                                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                                            <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addMake"><i
                                                    class="ft-plus icon-left"></i> add Truck Make</button>                    
                                        </div>

                                        <table class="table table-striped table-bordered file-export">
                                            <thead>
                                                <tr>
                                                    <th>Truck Make</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($truck_makes as $truck_make)
                                                    <tr>
                                                        <td>{{ $truck_make->make }}</td>
                                                        <td>{{ $truck_make->description }}</td>
                                                        <td>

                                                            <span><i class="ft-edit-1" id="edit_Truck_Make"
                                                                    data-id="{{ $truck_make->id }}"
                                                                    data-make="{{ $truck_make->make }}"
                                                                    data-description=" {{ $truck_make->description }}"
                                                                    title="edit">
                                                                </i>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('make.delete', $truck_make->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Truck Make</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- File export table -->
            </div>
        </div>
    </div>

    @include('backend.trucks.modals.truck_type');
    @include('backend.trucks.modals.truck_make');

    <!-- Modal -->
    <div class="modal fade text-left" id="truck_info" tabindex="-1" data-backdrop="false" role="dialog"
        aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Add Truck</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('truck.store') }}" enctype="multipart/form-data">
                        <input type="hidden" id="add_truck_method" name="_method" value="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="registration">Registration</label>
                                    <input type="text" id="registration" class="form-control round" name="registration">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="truck_make">Truck Make:</label>
                                    <select class="select2 form-control block" id="truck_make" name="make_id" required>
                                        <option disabled selected>Choose one</option>
                                        <optgroup label="Truck Model">
                                            @foreach ($truck_makes as $truck_make)
                                                <option value={{ $truck_make->id }}>
                                                    {{ $truck_make->make }}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="load_capacity">Load Capacity</label>
                                    <input type="text" id="load_capacity" class="form-control round" name="load_capacity">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="truck_type">Truck Type:</label>
                                    <select class="select2 form-control block" id="truck_type" name="type_id" required>
                                        <option disabled selected>Choose one</option>
                                        <optgroup label="Truck Type">
                                            @foreach ($truck_types as $truck_type)
                                                <option value={{ $truck_type->id }}>
                                                    {{ $truck_type->type }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="cargo_bed_dimensions">Cargo Bed DImensions</label>
                                    <input type="text" id="cargo_bed_dimensions" class="form-control round"
                                        name="cargo_bed_dimensions" placeholder="LxWxH (cm)">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="owners_name">Owners Name</label>
                                    <input type="text" id="owners_name" class="form-control round" name="owners_name">
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="owners_phone">Owners Phone</label>
                                    <input type="text" id="owners_phone" class="form-control round" name="owners_phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="id" id="id" value="">

                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" id="submit_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>
    <script>
        /* ===================== Add Truck Toggle ============================ */
        $(document).on("click", "#addTruck", function(e) {
            e.preventDefault();

            $('#submit_btn').text("Save");
            $('#myModalLabel11').text("Add Truck");

            $('#add_truck_method').val('POST');

            $('#email').prop('disabled', false)
            $('#name').prop('disabled', false)



            $('#id').val('');
            $('#registration').val('');
            $('#model').val('');
            $('#load_capacity').val('');
            $('#truck_type').val('');
            $('#cargo_bed_dimensions').val('');
            $('#owners_name').val('');
            $('#owners_phone').val('');


            $('#truck_info').modal('show');
        });

        /* ===================== Edit Truck Toggle ============================ */
        $(document).on("click", "#editTruck", function(e) {
            e.preventDefault();

            $('#submit_btn').text("Update");
            $('#myModalLabel11').text("Edit Truck");


            let id = $(this).attr('data-id'),
                registration = $(this).attr('data-registration'),
                model = $(this).attr('data-model'),
                load_capacity = $(this).attr('data-load_capacity'),
                truck_type = $(this).attr('data-truck_type'),
                cargo_bed_dimensions = $(this).attr('data-cargo_bed_dimensions');
            owners_name = $(this).attr('data-owners_name');
            owners_phone = $(this).attr('data-owners_phone');


            $('#add_truck_method').val('PUT');


            $('#id').val(id);
            $('#registration').val(registration);
            $('#model').val(model);
            $('#load_capacity').val(load_capacity);
            $('#truck_type').val(truck_type);
            $('#cargo_bed_dimensions').val(cargo_bed_dimensions);
            $('#owners_name').val(owners_name);
            $('#owners_phone').val(owners_phone);


            $('#truck_info').modal('show');
        });
       /*  */
      
       
        // Position Bottom Right
        function showToastr(msg) {
            toastr.error('I do not think that word means what you think it means.', 'Bottom Right!', {
                positionClass: 'toast-bottom-right',
                containerId: 'toast-bottom-right',
                "progressBar": true
            });

        }
         $('#position-bottom-right').on('click', function () {
             toastr.error('I do not think that word means what you think it means.', 'Bottom Right!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

         });
    </script>

@endsection

@section('scripts')
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}", 'INFO', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    toastr.warning("{{ Session::get('message') }}", 'WARNING', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}", 'SUCCESS', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}", 'OOPS!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right', "progressBar": true });

                    break;
            }
        @endif 
    </script>
@endsection
