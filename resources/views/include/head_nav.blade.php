<div class="nav-menu d-flex flex-wrap shadow p-2">
    <div class="menu-item">
        <a class="btn btn-primary me-1" href="/user-management">User Management</a>
    </div>
    <div class="menu-item">
        <a class="btn btn-primary me-1" href="/roles">Roles</a>
    </div>
    <div class="menu-item">
        <a class="btn btn-primary me-1" href="/departments">Department</a>
    </div>
    <div class="menu-item">
        <a class="btn btn-primary me-1" href="/monitoring">Monitoring</a>
    </div>
    <div class="menu-item me-1">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</div>