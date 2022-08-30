<div class="sidebar d-none d-lg-block">
    <div class="title">
        <h4>User</h4>
    </div>
    <ul class="nav-list">
        <li class="nav-items {{ Route::is('user.dashboard') ? 'active':'' }}">
            <a href="{{ route('user.dashboard') }}"><span class="mr-2"><i class="fas fa-tachometer-alt"></i></span>Dashboard</a>
        </li>
        <li class="nav-items {{ Route::is('user.exam') ? 'active':'' }}">
            <a href="{{ route('user.exam') }}"><span class="mr-2"><i class="fas fa-edit"></i></span>Exam</a>
        </li>
    </ul>
</div>