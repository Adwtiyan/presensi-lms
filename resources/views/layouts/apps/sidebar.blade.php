<ul class="sidebar-nav">
    <li class="sidebar-header">
        Atendance System
    </li>

    <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('dashboard') }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('rooms') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('rooms.index') }}">
            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Rooms</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('courses') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('courses.index') }}">
            <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Courses</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('classrooms') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('classrooms.index') }}">
            <i class="align-middle" data-feather="trello"></i> <span class="align-middle">Classrooms</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('batches') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('batches.index') }}">
            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Batches</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('schedules') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('schedules.index') }}">
            <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Schedules</span>
        </a>
    </li>

    <li class="sidebar-header">
        Learning Management System
    </li>

    <li class="sidebar-item {{ request()->is('cek') ? 'active' : '' }}">
        <a class="sidebar-link" href="ui-buttons.html">
            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Topic</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('cek') ? 'active' : '' }}">
        <a class="sidebar-link" href="ui-forms.html">
            <i class="align-middle" data-feather="server"></i> <span class="align-middle">Attachement</span>
        </a>
    </li>

    <li class="sidebar-header">
        Manage Users
    </li>

    <li class="sidebar-item {{ request()->is('cek') ? 'active' : '' }}">
        <a class="sidebar-link" href="charts-chartjs.html">
            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Students</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('cek') ? 'active' : '' }}">
        <a class="sidebar-link" href="maps-google.html">
            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Teachers</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('cek') ? 'active' : '' }}">
        <a class="sidebar-link" href="maps-google.html">
            <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Admin</span>
        </a>
    </li>
</ul>
