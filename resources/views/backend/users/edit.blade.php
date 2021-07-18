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
                                    <div class="card-body card-dashboard ">
                                        <form class="form" method="POST" action="{{ route('users.update', $user->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control round" name="name" value="{{$user->name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control round" name="email" value="{{$user->email}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" class="form-control round" name="password" value="">
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
                                                                <option value={{ $role }} @if(in_array($role, $userRole )){{"selected='selected'"}}@endif >
                                                                    {{ $role }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> <a href="{{ route('users.index') }}">Cancel</a>
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
