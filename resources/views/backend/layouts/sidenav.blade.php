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
            <li class=" nav-item "><a href="full-calender-basic.html"><i class="material-icons">playlist_add_check</i><span class="menu-title" data-i18n="Calendar">Reports</span></a>
            </li>










        </ul>
    </div>
</div>
