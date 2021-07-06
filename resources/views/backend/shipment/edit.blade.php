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
                                        <form class="form" method="POST" action="{{ route('shipment.update') }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"> General</h4>
                                                <div class="row">
                                                    <input type="hidden" name="id" id="id" value="{{$shipment->id}}">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="customer_id">Customer Name:</label>
                                                            <select class="select2 form-control block" id="customer_id"
                                                                name="customer_id" required>
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Customers">
                                                                    @foreach ($customers as $customer)
                                                                        <option value={{ $customer->id }} {{ ( $shipment->customer_id == $customer->id) ? 'selected' : '' }}>
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
                                                                        <option value={{ $truck->id }} {{ ( $shipment->truck_id == $truck->id) ? 'selected' : '' }}>
                                                                            {{ $truck->registration }}
                                                                            {{ $truck->load_capacity }}
                                                                            {{ $truck->truck_type }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="complaintinput1">Loading Point:</label>
                                                            <input type="text" id="complaintinput1"
                                                                class="form-control round" name="loading_point" required
                                                                value="{{ $shipment->loading_point}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cargo_description">Cargo Description:</label>
                                                            <input type="text" id="cargo_description"
                                                                class="form-control round" name="cargo_description" required
                                                                value="{{ $shipment->cargo_description }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Shipment</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="complaintinput2">Shipment Dispatch Date</label>
                                                            <input type="date" id="complaintinput2"
                                                                class="form-control round" name="shipment_dispatch_date"
                                                                required value="{{ $shipment->shipment_dispatch_date }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipment_dispatch_time">Shipment Dispatch
                                                                Time</label>
                                                            <input type="time" id="shipment_dispatch_time"
                                                                class="form-control round" name="shipment_dispatch_time"
                                                                required value="{{ $shipment->shipment_dispatch_time }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="shipment_arrival_date">Shipment Arrival Date</label>
                                                            <input type="date" id="shipment_arrival_date"
                                                                class="form-control round" name="shipment_arrival_date"
                                                                required value="{{ $shipment->shipment_arrival_date }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipment_arrival_time">Shipment Arrival Time</label>
                                                            <input type="time" id="shipment_arrival_time"
                                                                class="form-control round" name="shipment_arrival_time"
                                                                required value="{{ $shipment->shipment_arrival_time }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h4 class="form-section">Delivery Details</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="delivery_point_1">Delivery Point 1</label>
                                                            <input type="text" id="delivery_point_1"
                                                                class="form-control round" name="delivery_point_1" required
                                                                value="{{ $shipment->delivery_point_1 }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="delivery_point_3">Delivery Point 3</label>
                                                            <input type="text" id="delivery_point_3"
                                                                class="form-control round" name="delivery_point_3" required
                                                                value="{{ $shipment->delivery_point_3 }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="delivery_point_5">Delivery Point 5</label>
                                                            <input type="text" id="delivery_point_5"
                                                                class="form-control round" name="delivery_point_5" required
                                                                value="{{  $shipment->delivery_point_5 }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group   ">
                                                            <label for="delivery_point_2">Delivery Point 2</label>
                                                            <input type="text" id="delivery_point_2"
                                                                class="form-control round" name="delivery_point_2" required
                                                                value="{{  $shipment->delivery_point_2 }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="delivery_point_4">Delivery point 4</label>
                                                            <input type="text" id="delivery_point_4"
                                                                class="form-control round" name="delivery_point_4" required
                                                                value="{{ $shipment->delivery_point_4 }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="delivery_note_number">Delivery Note Number</label>
                                                            <input type="text" id="delivery_note_number"
                                                                class="form-control round" name="delivery_note_number"
                                                                required value="{{ $shipment->delivery_note_number }}">
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group   ">
                                                            <label for="invoice_date">Invoice Date</label>
                                                            <input type="date" id="invoice_date" class="form-control round"
                                                                name="invoice_date" required
                                                                value="{{ $shipment->invoice_date}}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="order_delivery_status">Order Delivery Status</label>

                                                            <select class="select2 form-control block"
                                                                id="order_delivery_status" name="order_delivery_status"
                                                                required value="{{ old('order_delivery_status') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Order Delivery Status">
                                                                    @foreach ($ORDER_DELIVERY_STATUS as $key => $order_delivery_status)
                                                                        <option value={{ $key }} {{ ( $shipment->order_delivery_status == $key) ? 'selected' : '' }}>
                                                                            {{ $order_delivery_status }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
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
                                                                    @foreach ($ORDER_PAYMENT_STATUS as $key => $order_payment_status)
                                                                        <option value={{ $key }} {{ ( $shipment->order_payment_status == $key) ? 'selected' : '' }} >
                                                                            {{ $order_payment_status }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>

                                                        <img style='height: 80px; width: 100px; border: 1px solid #000;' id="image_preview" src="{{ $shipment->delivery_note_image ? asset("uploads/delivery_notes/{$shipment->delivery_note_image}") : "https://via.placeholder.com/100?text=image"}}" alt=""/>

                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="delivery_note_image"
                                                                id="delivery_note_image">
                                                            <label class="custom-file-label" for="delivery_note_image"
                                                                aria-describedby="delivery_note_image">Delivery Note Image</label>
                                                        </div>

                                                    </div>
                                                </div>


                                                <h4 class="form-section">Transporter Details</h4>

                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group  ">
                                                            <label for="transporter_rate_per_trip">Transporter Rate Per
                                                                Trip</label>
                                                            <input type="text" id="transporter_rate_per_trip"
                                                                class="form-control round" name="transporter_rate_per_trip"
                                                                required value="{{ $shipment->transporter_rate_per_trip }}">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group  ">
                                                            <label for="trip_challenges">Trip Challenges</label>

                                                            <select class="select2 form-control block" id="trip_challenges"
                                                                name="trip_challenges" required
                                                                value="{{ old('trip_challenges') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Trip Challenges">
                                                                    @foreach ($TRIP_CHALLENGES as $key => $trip_challenges)
                                                                        <option value={{ $key }} {{ ( $shipment->trip_challenges == $key) ? 'selected' : '' }}>
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
    $(function () {

        $("#delivery_note_image").on('change', function () {
            preview_image();
        });

        function preview_image() {


            var reader = new FileReader();
            reader.onload = function () {

                var output = document.getElementById('image_preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    });
</script>
@endsection
