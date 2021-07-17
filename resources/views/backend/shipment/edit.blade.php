@extends('backend.layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    @if ($errors->any())

                        <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <li> {{ $error }}</li>

                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="content-header-title">Shipments</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href={{ route('shipment.index') }}>Shipments</a>
                                </li>
                                <li class="breadcrumb-item active">Add Shipment
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                </div>
            </div>
            <div class="content-body">

                <!-- Form wzard with step validation section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Edit Shipment</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                                    <div class="card-body">
                                        <form class="form" method="POST" action="{{ route('shipment.update') }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"> General</h4>
                                                <div class="row">
                                                    <input type="hidden" name="id" id="id" value="{{ $shipment->id }}">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="customer_id">Customer Name:</label>
                                                            <select class="select2 form-control block" id="customer_id"
                                                                name="customer_id" required>
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Customers">
                                                                    @foreach ($customers as $customer)
                                                                        <option value={{ $customer->id }}
                                                                            {{ $shipment->customer_id == $customer->id ? 'selected' : '' }}>
                                                                            {{ $customer->user->name }}</option>
                                                                    @endforeach
                                                                </optgroup>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="truck">Truck Details: </label>
                                                            <select class="select2 form-control block" id="truck"
                                                                name="truck_id" required>
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Truck Details">
                                                                    @foreach ($trucks as $truck)
                                                                        <option value={{ $truck->id }}
                                                                            {{ $shipment->truck_id == $truck->id ? 'selected' : '' }}>
                                                                            {{ $truck->registration }}
                                                                            {{ $truck->load_capacity }}
                                                                            {{ $truck->truck_type->type }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col s12 m4 l3">
                                                        <div class="form-group">
                                                            <label for="complaintinput1">Loading Point:</label>

                                                            <select class="select2 form-control block" id="complaintinput1"
                                                                name="loading_point" required
                                                                value="{{ old('trip_challenges') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Trip Challenges">
                                                                    @foreach ($locations as $location)
                                                                        <option value={{ $location->id }}
                                                                            {{ $shipment->loading_point == $location->id ? 'selected' : '' }}>
                                                                            {{ $location->name }}
                                                                            {{ $location->description }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="complaintinput2">Shipment Dispatch Date</label>
                                                            <input type="date" id="complaintinput2"
                                                                class="form-control round" name="shipment_dispatch_date"
                                                                required value="{{ $shipment->shipment_dispatch_date }}">
                                                        </div>
                                                    </div>

                                                    <div class="col s12 m4 l3">
                                                        <div class="form-group">
                                                            <label for="cargo_description">Cargo Description:</label>
                                                            <input type="text" id="cargo_description"
                                                                class="form-control round" name="cargo_description" required
                                                                value="{{ $shipment->cargo_description }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipment_dispatch_time">Shipment Dispatch
                                                                Time</label>
                                                            <input type="time" id="shipment_dispatch_time"
                                                                class="form-control round" name="shipment_dispatch_time"
                                                                required value="{{ $shipment->shipment_dispatch_time }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Delivery Details</h4>
                                                @php
                                                    $deliveryPoint = 0;
                                                @endphp

                                                @foreach ($shipment->delivery_points as $key => $delivery_point)

                                                    <div class="card border-secondary deliverypoint"
                                                        id="{{ $deliveryPoint}}">
                                                        <div class="card-header">
                                                            <div class="align-center"></div>
                                                            <h4 class="card-title">Delivery Point {{ $key }} </h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col s12 m4 l3">

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="deliveryPoint{{ $key }}">Delivery
                                                                                Point:</label>

                                                                            <select class="select2 form-control block"
                                                                                id="deliveryPoint{{ $key }}"
                                                                                name="delivery_points[{{ $key }}][location_id]"
                                                                                required>
                                                                                <option disabled selected>Choose one
                                                                                </option>
                                                                                <optgroup label="Location Details">
                                                                                    @foreach ($locations as $location)
                                                                                        <option value={{ $location->id }}
                                                                                            {{ $delivery_point['location_id'] == $location->id ? 'selected' : '' }}>
                                                                                            {{ $location->name }}
                                                                                            {{ $location->description }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="shipment_arrival_date{{ $key }}">Shipment
                                                                                Arrival Date</label>
                                                                            <input type="date"
                                                                                id="shipment_arrival_date{{ $key }}"
                                                                                class="form-control round"
                                                                                name="delivery_points[{{ $key }}][shipment_arrival_date]"
                                                                                required
                                                                                value="{{ $delivery_point['shipment_arrival_date'] }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="shipment_arrival_time{{ $key }}">Shipment
                                                                                Arrival Time</label>
                                                                            <input type="time"
                                                                                id="shipment_arrival_time{{ $key }}"
                                                                                class="form-control round"
                                                                                name="delivery_points[{{ $key }}][shipment_arrival_time]"
                                                                                required
                                                                                value="{{ $delivery_point['shipment_arrival_time'] }}">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col s12 m4 l3">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <fieldset class="form-group">
                                                                                    <label
                                                                                        for="delivery_note_image{{ $key }}"
                                                                                        aria-describedby="delivery_note_image{{ $key }}">Delivery
                                                                                        Note Image</label>
                                                                                    <input type="file"
                                                                                        class=" form-control-file"
                                                                                        name="delivery_points[{{ $key }}][delivery_note_image]"
                                                                                        id="delivery_note_image{{ $key }}"
                                                                                        onchange="showHidded('delivery_note_image_prev{{ $key }}')">
                                                                                </fieldset>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="{{ URL::asset('/uploads/delivery_notes/' . $delivery_point['delivery_note_image']) }}"
                                                                                    class="" style="height: 70px;" alt="">
                                                                                <input
                                                                                    id="delivery_note_image_prev{{ $key }}"
                                                                                    type="hidden"
                                                                                    name="delivery_points[{{ $key }}][delivery_note_image_prev]"
                                                                                    value="{{ $delivery_point['delivery_note_image'] }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="delivery_note_number{{ $key }}">Delivery
                                                                                Note Number</label>
                                                                            <input type="text"
                                                                                id="delivery_note_number{{ $key }}"
                                                                                class="form-control round"
                                                                                name="delivery_points[{{ $key }}][delivery_note_number]"
                                                                                required
                                                                                value="{{ $delivery_point['delivery_note_number'] }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="order_delivery_status{{ $key }}">Order
                                                                                Delivery Status</label>

                                                                            <select class="select2 form-control block"
                                                                                id="order_delivery_status{{ $key }}"
                                                                                name="delivery_points[{{ $key }}][order_delivery_status]"
                                                                                required>
                                                                                <option disabled selected>Choose one
                                                                                </option>
                                                                                <optgroup label="Order Delivery Status">
                                                                                    @foreach ($ORDER_DELIVERY_STATUS as $key => $order_delivery_status)
                                                                                        <option value={{ $key }}
                                                                                            {{ $delivery_point['order_delivery_status'] == $key ? 'selected' : '' }}>
                                                                                            {{ $order_delivery_status }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer border-0 text-muted">
                                                            <div
                                                                class="form-group col-sm-12 col-md-2 float-left text-center mt-2">
                                                                <button id="remove{{ $key }}" type="button"
                                                                    class="btn btn-danger remove"> <i class="ft-x"></i>
                                                                    Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @php
                                                        $deliveryPoint++;
                                                    @endphp
                                                @endforeach
                                                <div id="newDeliveryPoints"></div>

                                                <div class="form-group overflow-hidden">
                                                    <div class="col-12">
                                                        <a class="btn btn-primary" onclick="addDeliveryPoint()">
                                                            <i class="ft-plus"></i> Add
                                                        </a>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Transporter Details</h4>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group   ">
                                                            <label for="invoice_date">Invoice Date</label>
                                                            <input type="date" id="invoice_date" class="form-control round"
                                                                name="invoice_date" required
                                                                value="{{ $shipment->invoice_date }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="transporter_rate_per_trip">Transporter Rate Per
                                                                Trip</label>
                                                            <input type="text" id="transporter_rate_per_trip"
                                                                class="form-control round" name="transporter_rate_per_trip"
                                                                required
                                                                value="{{ $shipment->transporter_rate_per_trip }}">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group  ">
                                                            <label for="order_payment_status">Order payment Status</label>
                                                            <select class="select2 form-control block"
                                                                id="order_payment_status" name="order_payment_status"
                                                                required value="{{ old('order_payment_status') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Order Payment Status">
                                                                    @foreach ($ORDER_PAYMENT_STATUS as $data => $order_payment_status)
                                                                        <option value={{ $data }}
                                                                            {{ $shipment->order_payment_status == $data ? 'selected' : '' }}>
                                                                            {{ $order_payment_status }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="trip_challenges">Trip Challenges</label>

                                                            <select class="select2 form-control block" id="trip_challenges"
                                                                name="trip_challenges" required
                                                                value="{{ old('trip_challenges') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Trip Challenges">
                                                                    @foreach ($TRIP_CHALLENGES as $data => $trip_challenges)
                                                                        <option value={{ $data }}
                                                                            {{ $shipment->trip_challenges == $data ? 'selected' : '' }}>
                                                                            {{ $trip_challenges }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <a href="{{ route('shipment.index') }}">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> Cancel
                                                    </button>
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wzard with step validation section end -->

            </div>
        </div>
    </div>
    </div>
    <script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>

    <script>

    </script>
@endsection

@section('scripts')
    <script>
        let val = {{$deliveryPoint}};

        const addDeliveryPoint = () => {

            var html = '';
            html += '<div class="card border-secondary deliverypoint" id="' + val + '">';
            html += '<div class="card-header">';
            html += '<div class="align-center"></div>';
            html += '<h4 class="card-title">Delivery Point ' + val + ' </h4>';
            html += '</div>';
            html += '<div class="card-content">';
            html += '<div class="card-body">';
            html += '<div class="row">';
            html += '<div class="col s12 m4 l3">';

            html += '<div class="form-group">';
            html += '<label for="deliveryPoint'+ val +'">Delivery Point:</label>';
            html +='<select class="select2 now form-control block" id="deliveryPoint'+ val +'" name="delivery_points['+ val +'][location_id]" required>';
            html += '<option disabled selected>Choose one</option>';
            html += '<optgroup label="Location Details">';
            html +='@foreach ($locations as $location)';
                html += '<option value={{ $location->id }} >'; 
                html+='{{ $location->name }} {{ $location->description }}' ;
                html +=' </option>' ; 
            html+=' @endforeach';
            html += '</optgroup>';
            html += '</select>';
            html += '</div>';

            html += '<div class="form-group">';
            html += '<label for="shipment_arrival_date'+ val +'">Shipment Arrival Date</label>';
            html += '<input type="date"';
            html += 'id="shipment_arrival_date'+ val +'"';
            html += 'class="form-control round"';
            html += 'name="delivery_points['+ val +'][shipment_arrival_date]" required';
            html += 'value="">';
            html += '</div>';

            html += '<div class="form-group">';
            html += '<label for="shipment_arrival_time'+ val +'">Shipment Arrival Time</label>';
            html += '<input type="time"';
            html += 'id="shipment_arrival_time'+ val +'"';
            html += 'class="form-control round"';
            html += 'name="delivery_points['+ val +'][shipment_arrival_time]"';
            html += 'required';
            html += 'value="">';
            html += '</div>';

            html += '</div>';
            html += '<div class="col s12 m4 l3">';
            html += '<div class="row">';
            html += '<div class="col-md-8">';
            html += '<fieldset class="form-group">';
            html +='<label for="delivery_note_image'+ val +'" aria-describedby="delivery_note_image'+ val +'">Delivery Note Image</label>';
            html += '<input type="file" class=" form-control-file"';
            html += 'name="delivery_points['+ val +'][delivery_note_image]"';
            html += 'id="delivery_note_image'+ val +'"';
            html += '</fieldset>';
            html += '<div class="col-md-8">';
            html += '<input  type="hidden" id="delivery_note_image_prev'+ val +'" name="delivery_points['+ val +'][delivery_note_image_prev]" value="">';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            html += '<div class="form-group">';
            html += '<label for="delivery_note_number'+ val +'"> Delivery Note Number </label>"' ;
            html += '<input type="text"';
            html += 'id="delivery_note_number'+ val +'"';
            html += 'class="form-control round"';
            html += 'name="delivery_points['+ val +'][delivery_note_number]" required';
            html += 'value="">';
            html += '</div>';

            html += '<div class="form-group">';
            html += '<label for="order_delivery_status'+ val +'">Order Delivery Status</label>';
            html += '<select class="select2 form-control block"';
            html += 'id="order_delivery_status'+ val +'"';
            html += ' name="delivery_points['+ val +'][order_delivery_status]" required>';
            html += '<option disabled selected>Choose one </option>';
            html += '<optgroup label="Order Delivery Status">';
                html +='@foreach ($ORDER_DELIVERY_STATUS as $key => $order_delivery_status)';
                html +=' <option value='+ val +'>';
                    html +='{{ $order_delivery_status }}';
                    html +='</option>';
                html +=' @endforeach';
            html += '</optgroup>';
            html += '</select>';
            html += '</div>';

            html += '</div>';
            html += '</div>';

            html += '</div>';
            html += '</div>';
            html += '<div class="card-footer border-0 text-muted">';
            html += '<div';
            html += ' class="form-group col-sm-12 col-md-2 float-left text-center mt-2">';
            html +=
                '<button id="remove'+ val +'" type="button" class="btn btn-danger remove"> <i class="ft-x"></i> Delete</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            
            $('#newDeliveryPoints').append(html);
            $('.select2').select2();
            val++

        }

        $(document).on('click', '.remove', function() {

            $(this).parents('.deliverypoint').remove();

        });

        const showHidded = (val) => {
            $(`#${val}`).val('')

        }
    </script>
@endsection
