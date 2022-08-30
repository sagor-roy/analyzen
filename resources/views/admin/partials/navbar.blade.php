<nav class="navbar navbar-light bg-white fixed-top fixed-navbar">
    <div class="container-fluid">
        <button type="button" id="menu-bar" class="btn bg-transparent d-none"><i
                class="fas fa-bars"></i></button>
        <div class="coll-nav">
            <ul class="d-flex mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
            <div class="right-menu">
                <ul class="navbar px-0 py-2">
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                    <li>
                        <a href="#"><i class="far fa-comments"></i></a>
                        <span class="rebon">5</span>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-bell"></i></a>
                        <span class="rebon">5</span>
                    </li>
                    <li><a href="#"><i class="fas fa-th-large"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>