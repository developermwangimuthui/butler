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
                    <button class="btn btn-info round  box-shadow-2 px-2 mb-1" data-toggle="modal" data-backdrop="false" data-target="#info"><i class="ft-plus icon-left"></i> Add Trucks</button>

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

                                    <table class="table table-striped table-bordered file-export">
                                        <thead>
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
                                        </thead>
                                        <tbody>
                                            @foreach ($trucks as $truck)
                                            <tr>
                                                <td>{{$truck->truck_type}}</td>
                                                <td>{{$truck->registration}}</td>
                                                <td>{{$truck->model}}</td>
                                                <td>{{$truck->load_capacity}}</td>
                                                <td>{{$truck->cargo_bed_dimensions}}</td>
                                                <td>{{$truck->owners_name}}</td>
                                                <td>{{$truck->owners_phone}}</td>
                                                <td>
                                                    <span><a class="ft-edit-1" href="{{route('truck.edit',$truck->id)}}" title="delete"></a></span>
                                                    &nbsp;&nbsp;
                                                    <a href="{{route('truck.delete',$truck->id)}}" class="edit" style="color:#967ADC"><i class="ft-trash-2"></i></a>
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

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel11">Add Truck</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{route('truck.store')}}">
                    @csrf
                    <div class="form-body">

                        <div class="form-group">
                            <label for="complaintinput1">Registration</label>
                            <input type="text" id="complaintinput1" class="form-control round"  name="registration">
                        </div>

                        <div class="form-group">
                            <label for="complaintinput2">Truck Model</label>
                            <input type="text" id="complaintinput2" class="form-control round"  name="model">
                        </div>

                        <div class="form-group">
                            <label for="complaintinput3">Load Capacity</label>
                            <input type="text" id="complaintinput2" class="form-control round"  name="load_capacity">
                        </div>


                        <div class="form-group">
                            <label for="complaintinput4">Truck Type</label>
                            <input type="text" id="complaintinput4" class="form-control round"  name="truck_type">
                        </div>


                        <div class="form-group">
                            <label for="complaintinput5">Cargo Bed DImensions</label>
                            <input type="text" id="complaintinput4" class="form-control round"  name="cargo_bed_dimensions">
                        </div>


                        <div class="form-group">
                            <label for="complaintinput6">Owners Name</label>
                            <input type="text" id="complaintinput6" class="form-control round" name="owners_name">
                        </div>
                        <div class="form-group">
                            <label for="complaintinput6">Owners Phone</label>
                            <input type="text" id="complaintinput6" class="form-control round" name="owners_phone">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
