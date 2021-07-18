@extends('backend.layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Roles</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User Management</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Roles</a>
                                </li>
                                <li class="breadcrumb-item active">All Roles
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addRole" ><i class="ft-plus icon-left"></i> Add Roles</button>

                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Roles </h4>
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
                                        <table class="table table-striped table-bordered file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $key => $role)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                                         @can('role-edit')
                                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                                         @endcan
                                                         @can('role-delete')
                                                        <form class="form" method="POST" action="{{ route('roles.destroy', $role->id)}}" style="display: inline">
                                                            @method('delete')
                                                            @csrf
                                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                                          </form>
                                                         @endcan
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th width="280px">Action</th>
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
    <div class="modal fade text-left" id="role_info" data-backdrop="false" tabindex="-1" role="dialog"
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
                    <form class="form" method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control round" name="name" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="roles">Permissions</label>
                                @foreach ( $permission as $value )
                                <fieldset class="checkboxsas">
                                    <label>
                                        <input type="checkbox" value="{{$value->id}}" name="permission[]" id="{{$value->id}}">
                                       {{ $value->name}}
                                    </label>
                                </fieldset>
                                @endforeach
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
         $(document).on("click", "#addRole", function (e) {
            e.preventDefault();

            $('#submit_btn').text("Save");
            $('#myModalLabel11').text("Add Customer");

            $('#email').prop('disabled', false)
            $('#name').prop('disabled', false)



            $('#id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#town').val('');
            $('#location_description').val('');


            $('#role_info').modal('show');
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
