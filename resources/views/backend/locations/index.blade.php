@extends('backend.layouts.app')
@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Locations</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Locations</a>
                                </li>
                                <li class="breadcrumb-item active">All Locations
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addLocation"><i class="ft-plus icon-left"></i> Add Locations</button>

                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Butler Logistics Locations </h4>
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

                                        <table class="table table-striped table-bordered file-export">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>City</th>
                                                    <th>Town</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($locations as $location)
                                                    <tr>
                                                        <td>{{ $location->name }}</td>
                                                        <td> {{$location->city }}</td>
                                                        <td> {{ $location->town }}</td>
                                                        <td> {{ $location->description }}</td>
                                                        <td>
                                                            <span><i class="ft-edit-1" id="editLocation"
                                                                    data-id="{{ $location->id }}"
                                                                    data-name="{{ $location->name }}"
                                                                    data-city="{{ $location->city }}"
                                                                    data-town="{{ $location->town }}"
                                                                    data-description="{{ $location->description }}"
                                                                    title="edit"
                                                                    >
                                                                </i>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('location.delete', $location->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>City</th>
                                                    <th>Town</th>
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

            </div>
        </div>
    </div>





<!-- Modal -->
<div class="modal fade text-left" id="location_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ route('location.store') }}">
                    <input type="hidden" id="add_location_method" name="_method" value="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Location Name</label>
                                    <input type="text" id="name" class="form-control round" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" class="form-control round" name="city">
                                </div>
                               
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="description">Location Description</label>
                                    <input type="text" id="description" class="form-control round"
                                        name="description">
                                </div>
                                
                                <div class="form-group">
                                    <label for="town">Town</label>
                                    <input type="text" id="town" class="form-control round" name="town">
                                </div>
        
                            </div>
                        </div>

                        


                        <div class="form-actions">
                            <input type="hidden" name="id" id="id">
                            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" id="submit_btn" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>
<script>

     /* ===================== Add Location Toggle ============================ */
     $(document).on("click", "#addLocation", function (e) {
        e.preventDefault();

        $('#submit_btn').text("Save");
        $('#myModalLabel11').text("Add Location");

        $('#add_location_method').val('POST');


        $('#id').val('');
        $('#name').val('');
        $('#city').val('');
        $('#town').val('');
        $('#description').val('');



        $('#location_info').modal('show');
    });

     /* ===================== Edit Truck Toggle ============================ */
     $(document).on("click", "#editLocation", function (e) {
        e.preventDefault();

        $('#submit_btn').text("Update");
        $('#myModalLabel11').text("Edit Location");


       let id = $(this).attr('data-id'),
            name = $(this).attr('data-name'),
            city = $(this).attr('data-city'),
            town = $(this).attr('data-town'),
            description = $(this).attr('data-description');


        $('#add_location_method').val('PUT');


        $('#id').val(id);
        $('#name').val(name);
        $('#city').val(city);
        $('#town').val(town);
        $('#description').val(description);


        $('#location_info').modal('show');
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
