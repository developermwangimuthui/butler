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
                                    <h4 class="card-title">Validation Example</h4>
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
                                        <form class="steps-validation wizard-notification" method="POST"
                                            action="{{ route('shipment.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- Step 1 -->
                                            <h6>Step 1 (General)</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="customer_id">Customer Name:</label>
                                                            <select class="select2 form-control block" id="customer_id"
                                                                name="customer_id" required>
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Customers">
                                                                    @foreach ($customers as $customer)
                                                                        <option value={{ $customer->id }}>
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
                                                                        <option value={{ $truck->id }}>
                                                                            {{ $truck->registration }}
                                                                            {{ $truck->load_capacity }}
                                                                            {{ $truck->truck_type->type }}</option>
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

                                                            <select class="select2 form-control block" id="complaintinput1"
                                                                name="loading_point" required>
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Location Details">
                                                                    @foreach ($locations as $location)
                                                                        <option value={{ $location->id }}>
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
                                                                required value="{{ old('shipment_dispatch_date') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cargo_description">Cargo Description:</label>
                                                            <input type="text" id="cargo_description"
                                                                class="form-control round" name="cargo_description" required
                                                                value="{{ old('cargo_description') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shipment_dispatch_time">Shipment Dispatch
                                                                Time</label>
                                                            <input type="time" id="shipment_dispatch_time"
                                                                class="form-control round" name="shipment_dispatch_time"
                                                                required value="{{ old('shipment_dispatch_time') }}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>Step 2 (Delivery points)</h6>
                                            <fieldset>
                                                <div class="repeater-default">
                                                    <div data-repeater-list="delivery_points">
                                                        <div data-repeater-item>
                                                            <div class="card border-secondary">
                                                                @php
                                                                    $count=0;
                                                                    $count++;
                                                                @endphp
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Collapse Example</h4>
                                                                </div>
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">

                                                                                <div class="form-group mb-1">
                                                                                    <label for="deliveryPoint">Delivery
                                                                                        Point:</label>

                                                                                    <select
                                                                                        class="select2 form-control block"
                                                                                        id="deliveryPoint{{$count}}"
                                                                                        name="location_id" required>
                                                                                        <option disabled selected>Choose one
                                                                                        </option>
                                                                                        <optgroup label="Location Details">
                                                                                            @foreach ($locations as $location)
                                                                                                <option
                                                                                                    value={{ $location->id }}>
                                                                                                    {{ $location->name }}
                                                                                                    {{ $location->description }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="shipment_arrival_date">Shipment
                                                                                        Arrival Date</label>
                                                                                    <input type="date"
                                                                                        id="shipment_arrival_date"
                                                                                        class="form-control round"
                                                                                        name="shipment_arrival_date"
                                                                                        required
                                                                                        value="{{ old('shipment_arrival_date') }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="shipment_arrival_time">Shipment
                                                                                        Arrival Time</label>
                                                                                    <input type="time"
                                                                                        id="shipment_arrival_time"
                                                                                        class="form-control round"
                                                                                        name="shipment_arrival_time"
                                                                                        required
                                                                                        value="{{ old('shipment_arrival_time') }}">
                                                                                </div>


                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group  ">
                                                                                    <label for="order_delivery_status">Order
                                                                                        Delivery Status</label>

                                                                                    <select
                                                                                        class="select2 form-control block"
                                                                                        id="order_delivery_status"
                                                                                        name="order_delivery_status"
                                                                                        required
                                                                                        value="{{ old('order_delivery_status') }}">
                                                                                        <option disabled selected>Choose one
                                                                                        </option>
                                                                                        <optgroup
                                                                                            label="Order Delivery Status">
                                                                                            @foreach ($ORDER_DELIVERY_STATUS as $key => $order_delivery_status)
                                                                                                <option
                                                                                                    value={{ $key }}>
                                                                                                    {{ $order_delivery_status }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group  ">
                                                                                    <label
                                                                                        for="delivery_note_number">Delivery
                                                                                        Note Number</label>
                                                                                    <input type="text"
                                                                                        id="delivery_note_number"
                                                                                        class="form-control round"
                                                                                        name="delivery_note_number" required
                                                                                        value="{{ old('delivery_note_number') }}">
                                                                                </div>
                                                                                <label class="file center-block">
                                                                                    <input type="file"
                                                                                        id="delivery_note_image"
                                                                                        name="delivery_note_image" required>
                                                                                    <span class="file-custom"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="card-footer border-0 text-muted">
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-2 float-right text-center mt-2">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-repeater-delete> <i class="ft-x"></i>
                                                                            Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group overflow-hidden">
                                                        <div class="col-12">
                                                            <a data-repeater-create class="btn btn-primary countme">
                                                                <i class="ft-plus"></i> Add
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </fieldset>

                                            <!-- Step 3 -->
                                            <h6>Step 3 (Delivery Details)</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group   ">
                                                            <label for="invoice_date">Invoice Date</label>
                                                            <input type="date" id="invoice_date" class="form-control round"
                                                                name="invoice_date" required
                                                                value="{{ old('invoice_date') }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="order_payment_status">Order payment Status</label>
                                                            <select class="select2 form-control block"
                                                                id="order_payment_status" name="order_payment_status"
                                                                required value="{{ old('order_payment_status') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Order Payment Status">
                                                                    @foreach ($ORDER_PAYMENT_STATUS as $key => $order_payment_status)
                                                                        <option value={{ $key }}>
                                                                            {{ $order_payment_status }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group  ">
                                                            <label for="transporter_rate_per_trip">Transporter Rate Per
                                                                Trip</label>
                                                            <input type="text" id="transporter_rate_per_trip"
                                                                class="form-control round" name="transporter_rate_per_trip"
                                                                required value="{{ old('transporter_rate_per_trip') }}">
                                                        </div>

                                                        <div class="form-group  ">
                                                            <label for="trip_challenges">Trip Challenges</label>

                                                            <select class="select2 form-control block" id="trip_challenges"
                                                                name="trip_challenges" required
                                                                value="{{ old('trip_challenges') }}">
                                                                <option disabled selected>Choose one</option>
                                                                <optgroup label="Trip Challenges">
                                                                    @foreach ($TRIP_CHALLENGES as $key => $trip_challenges)
                                                                        <option value={{ $key }}>
                                                                            {{ $trip_challenges }} </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>


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
        $(function() {

            let counter = 0;

            $('.countme').on('click', function () {
                counter++

            })
            $("#delivery_note_image").on('change', function() {
                preview_image();
            });

            function preview_image() {


                var reader = new FileReader();
                reader.onload = function() {

                    var output = document.getElementById('image_preview');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            $('select').select2({
                width: '100%'
                //theme: "bootstrap"
            });


          /*   if ($('.repeater-default').length) {
                var reportRepeater = $('.repeater-default').repeater({
                    defaultValues: {
                        'textarea-input': 'foo',
                        'text-input': 'bar',
                    },
                    show: function() {
                        $(this).slideDown();
                        $('.select2-container').remove();
                        $('select').select2({
                            width: '100%',
                            placeholder: "Placeholder text",
                            allowClear: true
                        });
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this?')) {
                            $(this).slideUp(deleteElement);
                        }
                    }

                });
            } */

        });
    </script>
@endsection
