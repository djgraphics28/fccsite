<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FCC APP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Navigation
    </div>

    <!-- Nav Item - Members Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMembers"
            aria-expanded="true" aria-controls="collapseMembers">
            <i class="fas fa-fw fa-users"></i>
            <span>Members</span>
        </a>
        <div id="collapseMembers" class="collapse" aria-labelledby="headingMembers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Members:</h6>
                <a class="collapse-item" href="{{ route('members.index') }}">View Members</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

     <!-- Nav Item - Groups Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroups"
            aria-expanded="true" aria-controls="collapseGroups">
            <i class="fas fa-fw fa-users"></i>
            <span>Groups</span>
        </a>
        <div id="collapseGroups" class="collapse" aria-labelledby="headingGroups" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Groups:</h6>
                <a class="collapse-item" href="{{ route('groups.index') }}">View Groups</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Families Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFamilies"
            aria-expanded="true" aria-controls="collapseFamilies">
            <i class="fas fa-fw fa-users"></i>
            <span>Families</span>
        </a>
        <div id="collapseFamilies" class="collapse" aria-labelledby="headingGroups" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Families:</h6>
                <a class="collapse-item" href="{{ route('families.index') }}">View Families</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Birthday Celebrators -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('birthday.celebrators') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Birthday Celebrators</span></a>
    </li>

    <!-- Nav Item - VBS Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVbs"
            aria-expanded="true" aria-controls="collapseVbs">
            <i class="fas fa-fw fa-users"></i>
            <span>VBS</span>
        </a>
        <div id="collapseVbs" class="collapse" aria-labelledby="headingVbs" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage VBS:</h6>
                <a class="collapse-item" href="{{ route('vbs.index') }}">View VBS Lists</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Certificate Generator Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCertGen"
            aria-expanded="true" aria-controls="collapseCertGen">
            <i class="fas fa-fw fa-pdf-alt"></i>
            <span>Certificate Generator</span>
        </a>
        <div id="collapseCertGen" class="collapse" aria-labelledby="headingCertGen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Certificates:</h6>
                <a class="collapse-item" href="{{ route('cert.index') }}">View Templates</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Users Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">View User Lists</a>
                {{-- <a class="collapse-item" href="{{ route('members.index', 1) }}">Verified Members</a> --}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
