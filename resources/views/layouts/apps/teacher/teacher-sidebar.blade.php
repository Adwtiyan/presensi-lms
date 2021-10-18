<ul class="sidebar-nav">
    <li class="sidebar-header">
        MAIN
    </li>

    <li class="sidebar-item {{ request()->is('teachers/dashboard') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('teachers.dashboard') }}">
            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('teachers/schedules') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('dashboard.teachers.schedules') }}">
            <i class="align-middle " data-feather="calendar"></i> <span class="align-middle">Schedules</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a class="sidebar-link" href="#">
            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Courses</span>
        </a>
    </li>

    <li class="sidebar-item">
        <a class="sidebar-link" href="#">
            <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Resume</span>
        </a>
    </li>
</ul>
