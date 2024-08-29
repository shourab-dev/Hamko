<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <img src="{{ asset('images/logo.webp') }}" alt="" class="w-50 d-block mx-auto">

        </a>


    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ activeLink('dashboard') }} ">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <!-- SHIFT -->
        <li class="menu-item {{ activeLink('shift.*') }} ">
            <a href="{{ route('shift.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Shifts</div>
            </a>
        </li>
        <li class="menu-item  {{ activeLink('employee.*', true) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Employee Management</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ activeLink('employee.addOrEdit') }}">
                    <a href="{{ route('employee.addOrEdit') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Add Employee</div>
                    </a>
                </li>
                <li class="menu-item {{ activeLink('employee.all') }}">
                    <a href="{{ route('employee.all') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">All Employees</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item  {{ activeLink('dine.*', true) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dine Management</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ activeLink('dine.type.addOrEdit') }}">
                    <a href="{{ route('dine.type.addOrEdit') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Dine Periods</div>
                    </a>
                </li>
                <li class="menu-item {{ activeLink('dine.food.addOrEdit') }}">
                    <a href="{{ route('dine.food.addOrEdit') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Foods</div>
                    </a>
                </li>

            </ul>
        </li>


    </ul>
</aside>