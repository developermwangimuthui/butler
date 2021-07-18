<div class="main-menu material-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{Request::routeIs('home') ? 'active' : ''}}"><a href="{{route('home')}}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard</span></a>
            </li>
            <li class=" nav-item {{Request::routeIs('truck.index') ? 'active' : ''}}"><a href="{{route('truck.index')}}"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Calendar">Trucks</span></a>
            </li>
            <li class=" nav-item {{Request::routeIs('customer.index') ? 'active' : ''}}"><a href="{{route('customer.index')}}"><i class="material-icons">people_outline</i><span class="menu-title" data-i18n="Calendar">Customers</span></a>
            </li>
            <li class=" nav-item {{Request::routeIs('location.index') ? 'active' : ''}}"><a href="{{route('location.index')}}"><i class="material-icons">language</i><span class="menu-title" data-i18n="Calendar">Locations</span></a>
            </li>
            <li class=" nav-item {{Request::routeIs('shipment.index') ? 'active' : ''}}"><a href="{{route('shipment.index')}}"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Calendar">Shipments</span></a>
            </li>
            <li class=" nav-item "><a href="full-calender-basic.html"><i class="material-icons">done</i><span class="menu-title" data-i18n="Calendar">Driver Assesments</span></a>
            </li>
            <li class=" nav-item {{Request::routeIs('report.index') ? 'active' : ''}}"><a href="{{route('report.index')}}"><i class="material-icons">playlist_add_check</i><span class="menu-title" data-i18n="Calendar">Reports</span></a>
            </li>
            @can('user-create')
            <li><a class="menu-item" href="#"><i class="material-icons">people_outline</i><span data-i18n="Users">User Management</span></a>
                <ul class="menu-content">
                    <li class="{{Request::routeIs('users.index') ? 'active' : ''}}"><a class="menu-item " href="{{route('users.index')}}"><i class="material-icons"></i><span data-i18n="User Summary">User Summary</span></a>
                    </li>
                    <li class="{{Request::routeIs('roles.index') ? 'active' : ''}}"><a class="menu-item" href="{{route('roles.index')}}"><i class="material-icons"></i><span data-i18n="Roles">Roles</span></a>
                    </li>
                </ul>
            </li>
            @endcan
            

        </ul>
    </div>
</div>
