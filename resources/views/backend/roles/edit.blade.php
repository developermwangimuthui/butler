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
                                        <form class="form" method="POST" action="{{ route('roles.update', $role->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control round" name="name" placeholder="Name" value="{{$role->name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="roles">Permissions</label>
                                                    @foreach ( $permission as $value )
                                                    <fieldset class="checkboxsas">
                                                        <label>
                                                            <input type="checkbox" value="{{$value->id}}"  @if(in_array($value->id, $rolePermissions )){{"checked='checked'"}}@endif name="permission[]" id="{{$value->id}}">
                                                           {{ $value->name}}
                                                        </label>
                                                    </fieldset>
                                                    @endforeach
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> <a href="{{ route('roles.index') }}">Cancel</a>
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
                    </div>
                </section>

            </div>
        </div>
    </div>

    <script src="/backend/app-assets/js/core/libraries/jquery.min.js"></script>




@endsection
