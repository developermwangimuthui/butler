@extends('backend.layouts.app')
@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Shipments</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="">Shipments</a>
                                </li>
                                <li class="breadcrumb-item active">All Shipments
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <a  href={{route('shipment.create')}}>
                            <button class="btn btn-info round  box-shadow-2 px-2 mb-1"
                                ><i class="ft-plus icon-left"></i>
                                Add Shipment
                            </button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Shipments </h4>
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
                                    <div class="card-body card-dashboard dataTables_wrpper dt-bootstrap">

                                        <table class="table table-striped table-bordered file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Shipment dispatch date</th>
                                                    <th>Shipment dispatch time</th>
                                                    <th>Truck Details </th>
                                                    <th>Loading Point</th>
                                                    <th>Cargo Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shipments as $shipment)
                                                    <tr>
                                                        <td>{{ $shipment->customer->user->name }}</td>
                                                        <td>
                                                            {{ Carbon\Carbon::parse($shipment->shipment_dispatch_date)->toFormattedDateString() }}

                                                        </td>

                                                        <td>
                                                            {{ Carbon\Carbon::parse($shipment->shipment_dispatch_time)->toTimeString() }}

                                                        </td>
                                                        <td> {{ $shipment->truck->owners_name }}</td>
                                                        <td>
                                                            {{ $shipment->location->name }}
                                                        </td>
                                                        <td> {{ $shipment->cargo_description }}</td>
                                                        <td>
                                                            <span><a class="ft-edit-1" href="{{route('shipment.edit',$shipment->id)}}" title="edit"></a></span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('shipment.delete', $shipment->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Shipment dispatch date</th>
                                                    <th>Shipment dispatch time</th>
                                                    <th>Truck Details </th>
                                                    <th>Loading Point</th>
                                                    <th>Cargo Description</th>
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


    <script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>

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
