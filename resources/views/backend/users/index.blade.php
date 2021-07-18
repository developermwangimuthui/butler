@extends('backend.layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Users</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">User Management</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Users</a>
                                </li>
                                <li class="breadcrumb-item active">All Users
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addUser" data-toggle="modal" data-target="#user_info" ><i class="ft-plus icon-left"></i> Add Users</button>

                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Users </h4>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Roles</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $user)
                                                <tr>
                                                  <td>{{ $user->name }}</td>
                                                  <td>{{ $user->email }}</td>
                                                  <td>
                                                    @if(!empty($user->getRoleNames()))
                                                      @foreach($user->getRoleNames() as $v)
                                                         <label class="badge badge-success">{{ $v }}</label>
                                                      @endforeach
                                                    @endif
                                                  </td>
                                                  <td>
                                                        <a class="btn btn-info" href="#" id="showUser" title="show">Show</a>

                                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                                        <form class="form" method="POST" action="{{ route('users.destroy', $user->id)}}" style="display: inline">
                                                            @method('delete')
                                                            @csrf
                                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                                        </form>
                                                  </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Roles</th>
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
    <div class="modal fade text-left" id="user_info" data-backdrop="false" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('users.store') }}">
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
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control round" name="password">
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" id="password" class="form-control round" name="confirm-password">
                            </div>

                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <select class="select2 form-control block" id="roles"
                                    name="roles[]" multiple="multiple">
                                        @foreach ($roles as $role)
                                            <option value={{ $role }}>
                                                {{ $role }}</option>
                                        @endforeach
                                </select>
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