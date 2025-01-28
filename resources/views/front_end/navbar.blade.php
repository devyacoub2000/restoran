   <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{url('/')}}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{Auth::check() && Auth::user()->type == 'admin' ? route('admin.index') : url('/')}}" class="nav-item nav-link {{ request()->RouteIs('admin.index') ? 'active' : '' }} ">Home</a>

                        <a href="{{route('front.about')}}" class="nav-item nav-link {{ request()->RouteIs('front.about') ? 'active' : '' }}">About</a>

                        <a href="{{route('front.service')}}" class="nav-item nav-link {{ request()->RouteIs('front.service') ? 'active' : '' }}">Service</a>

                        <a href="{{route('front.menue')}}" class="nav-item nav-link {{ request()->RouteIs('front.menue') ? 'active' : '' }}">Menu</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            
                            <div class="dropdown-menu m-0">
                                <a href="{{route('front.booking')}}" 
                                class="dropdown-item {{ request()->RouteIs('front.booking') ? 'active' : '' }}">Booking</a>
                                <a href="{{route('front.team')}}" 
                                class="dropdown-item {{ request()->RouteIs('front.team') ? 'active' : '' }}">Our Team</a>
                                <a href="{{route('front.testimonial')}}" 
                                class="dropdown-item {{ request()->RouteIs('front.testimonial') ? 'active' : '' }}">Testimonial</a>
                            </div>
                        </div>
                         @guest
                         <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                         @endguest
                        @auth
                        <a href="#" class="nav-item nav-link">
                          <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-white p-0 m-0">
                              <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                          </form>
                        </a>
                        @endauth
                        <a href="{{route('front.contact')}}" 
                        class="nav-item nav-link {{ request()->RouteIs('front.contact') ? 'active' : '' }}">Contact</a>
                    </div>
                    <a href="{{route('front.booking')}}" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>