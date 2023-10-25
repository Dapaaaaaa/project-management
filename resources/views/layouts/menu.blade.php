<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@role('project-management')
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Projects</p>
    </a>
</li>
@endrole

<li class="nav-item">
    <a href="{{ route('projectStatuses.index') }}" class="nav-link {{ Request::is('projectStatuses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Project Status</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('projectUsers.index') }}" class="nav-link {{ Request::is('projectUsers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Project Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('todos.index') }}" class="nav-link {{ Request::is('todos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Todos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('todoStatuses.index') }}" class="nav-link {{ Request::is('todoStatuses*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Todo Statuses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Roles</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('permissions.index') }}" class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Permissions</p>
    </a>
</li>
