@extends('backend.layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    @if (session('success'))

                    <div class="alert alert-success bg-success alert-icon-left alert-arrow-left alert-dismissible" role="alert">
                            <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           <p>{{session('success') }}</p>
                    </div>
                    @endif

                    <h3 class="content-header-title">Customers</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Customers</a>
                                </li>
                                <li class="breadcrumb-item active">All Customers
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addCustomer" ><i class="ft-plus icon-left"></i> Add Customers</button>

                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Customers </h4>
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
                                                    <th>Phone</th>
                                                    <th>Town</th>
                                                    <th>Location Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        <td>{{ $customer->user->name }}</td>
                                                        <td> {{ $customer->phone }}</td>
                                                        <td>{{ $customer->town }}</td>
                                                        <td>{{ $customer->location_description }}</td>
                                                        <td>
                                                            <span><i class="ft-edit-1"
                                                                id="editCustomer"
                                                                    data-id="{{ $customer->id }}"
                                                                    data-name="{{ $customer->user->name }}"
                                                                    data-email=" {{ $customer->user->email }}"
                                                                    data-phone=" {{ $customer->phone }}"
                                                                    data-town="{{ $customer->town }}"
                                                                    data-location_description="{{ $customer->location_description }}"
                                                                    title="edit">
                                                                </i>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('customer.delete', $customer->id) }}"
                                                                class="edit" style="color:#967ADC"><i
                                                                    class="ft-trash-2"></i></a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Town</th>
                                                    <th>Location Description</th>
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
    <div class="modal fade text-left" id="customer_info" data-backdrop="false" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('customer.store') }}">
                        <input type="hidden" id="add_customer_method" name="_method" value="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control round" name="name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control round" name="email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control round" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="town">Town</label>
                                <input type="text" id="town" class="form-control round" name="town">
                            </div>

                            <div class="form-group">
                                <label for="location_description">Location Description</label>
                                <input type="text" id="location_description" class="form-control round"
                                    name="location_description">
                            </div>


                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="">
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

         /* ===================== Add Customer Toggle ============================ */
         $(document).on("click", "#addCustomer", function (e) {
            e.preventDefault();

            $('#submit_btn').text("Save");
            $('#myModalLabel11').text("Add Customer");
            $('#add_customer_method').val('POST');

            $('#email').prop('disabled', false)
            $('#name').prop('disabled', false)



            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#town').val('');
            $('#location_description').val('');


            $('#customer_info').modal('show');
        });

         /* ===================== Edit Customer Toggle ============================ */
         $(document).on("click", "#editCustomer", function (e) {
            e.preventDefault();

            $('#submit_btn').text("Update");
            $('#myModalLabel11').text("Edit Customer");

            $('#email').prop('disabled', true)
            $('#name').prop('disabled', true)


           let id = $(this).attr('data-id'),
                name = $(this).attr('data-name'),
                email = $(this).attr('data-email'),
                phone = $(this).attr('data-phone'),
                town = $(this).attr('data-town'),
                location_description = $(this).attr('data-location_description');


            $('#add_customer_method').val('PUT');


            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#town').val(town);
            $('#location_description').val(location_description);

            $('#customer_info').modal('show');
        });
    </script>



@endsection
