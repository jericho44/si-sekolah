        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="btn-group" role="group">
                        <a id="btnGroupDrop1" style="color: #fff; margin-right: 40px;" type="button"
                            class="dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="nav-icon fas fa-user-circle"></i> &nbsp; Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href=""><i class="nav-icon fas fa-user"></i>
                                &nbsp; My Profile</a>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Log Out</a>
                            <form id="logout-form" action="" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
