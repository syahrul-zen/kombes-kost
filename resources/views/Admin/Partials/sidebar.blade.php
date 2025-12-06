            <!-- Sidebar Start -->
            <div class="sidebar pb-3 pe-4">
                <nav class="navbar bg-light navbar-light">
                    <a href="{{ url("dashboard") }}" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>KOMBES KOST</h3>
                    </a>
                    <div class="d-flex align-items-center mb-4 ms-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="{{ asset("FE/img/user.jpg") }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div
                                class="bg-success rounded-circle position-absolute bottom-0 end-0 border border-2 border-white p-1">
                            </div>
                        </div>
                        <div class="ms-3">

                            @if (Auth::guard("admin")->check())
                                <h6 class="mb-0">{{ Auth::guard("admin")->user()->name }}</h6>
                                <span>Admin</span>
                            @else
                                <h6 class="mb-0">Owner</h6>
                                <span>Owner</span>
                            @endif

                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ url("dashboard") }}" class="nav-item nav-link"><i
                                class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="fa fa-laptop me-2"></i>Elements</a>
                            <div class="dropdown-menu border-0 bg-transparent">
                                <a href="button.html" class="dropdown-item">Buttons</a>
                                <a href="typography.html" class="dropdown-item">Typography</a>
                                <a href="element.html" class="dropdown-item">Other Elements</a>
                            </div>
                        </div> --}}
                        {{-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a> --}}

                        @if (Auth::guard("admin")->check())
                            <a href="{{ url("room") }}" class="nav-item nav-link"> <i
                                    class="fas fa-hospital me-2"></i>Kamar</a>
                        @endif

                        <a href="{{ url("booking-admin") }}" class="nav-item nav-link"><i
                                class="fas fa-key me-2"></i>Booking</a>

                        @if (Auth::guard("admin")->check())
                            <a href="{{ url("member") }}" class="nav-item nav-link"><i
                                    class="fas fa-user-friends me-2"></i>Member</a>
                        @endif
                        {{-- <a href="{{ url(path: '/akun') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Akun</a> --}}
                        {{-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="far fa-file-alt me-2"></i>Pages</a>
                            <div class="dropdown-menu border-0 bg-transparent">
                                <a href="signin.html" class="dropdown-item">Sign In</a>
                                <a href="signup.html" class="dropdown-item">Sign Up</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                                <a href="blank.html" class="dropdown-item">Blank Page</a>
                            </div>
                        </div> --}}
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->
