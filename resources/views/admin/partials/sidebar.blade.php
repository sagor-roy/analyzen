<div class="sidebar d-none d-lg-block">
    <div class="title">
        <h4>Admin</h4>
    </div>
    <ul class="nav-list">
        <li class="nav-items {{ Route::is('admin.dashboard') ? 'active':'' }}">
            <a href="{{ route('admin.dashboard') }}"><span class="mr-2"><i class="fas fa-tachometer-alt"></i></span>Dashboard</a>
        </li>
        <li class="nav-items {{ Route::is('admin.user') || Route::is('admin.user.detail') ? 'active':'' }}">
            <a href="{{ route('admin.user') }}"><span class="mr-2"><i class="fas fa-edit"></i></span>User List</a>
        </li>
        <li class="nav-items {{ Route::is('admin.quiz') || Route::is('admin.question.view') ? 'active':'' }}">
            <a href="{{ route('admin.quiz') }}"><span class="mr-2"><i class="fas fa-edit"></i></span>Add Quiz</a>
        </li>
        <li class="nav-items {{ Route::is('admin.exam') ? 'active':'' }}">
            <a href="{{ route('admin.exam') }}"><span class="mr-2"><i class="fas fa-edit"></i></span>Exam Attend</a>
        </li>
    </ul>
</div>