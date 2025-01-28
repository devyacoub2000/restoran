<div id="sidebar_color" class=""> 
             
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> {{env('APP_NAME')}} </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.show_booking')}}">
                <i class="fas fa-box"></i>
                <span>All Reservations</span>
            </a>
        </li>

         <hr class="sidebar-divider my-0">


          <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.contact')}}">
                <i class="fas fa-box"></i>
                <span>All Contacts</span>
            </a>
        </li>


        <!-- Divider -->


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Service -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseservice"
               aria-expanded="true" aria-controls="collapseservice">
                <i class="fas fa-concierge-bell"></i>
                <span>Service</span>
            </a>
            <div id="collapseservice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Service Management:</h6>
                    <a class="collapse-item" href="{{route('admin.service.index')}}">All Services</a>
                    <a class="collapse-item" href="{{route('admin.service.create')}}">Add Service</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Meal -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemeal"
               aria-expanded="true" aria-controls="collapsemeal">
                <i class="fas fa-utensils"></i>
                <span>Meal</span>
            </a>
            <div id="collapsemeal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Meal Management:</h6>
                    <a class="collapse-item" href="{{route('admin.meal.index')}}">All Meals</a>
                    <a class="collapse-item" href="{{route('admin.meal.create')}}">Add Meal</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Food -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefood"
               aria-expanded="true" aria-controls="collapsefood">
                <i class="fas fa-hamburger"></i>
                <span>Food</span>
            </a>
            <div id="collapsefood" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Food Management:</h6>
                    <a class="collapse-item" href="{{route('admin.food.index')}}">All Foods</a>
                    <a class="collapse-item" href="{{route('admin.food.create')}}">Add Food</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Chef -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsechef"
               aria-expanded="true" aria-controls="collapsechef">
                <i class="fas fa-user-tie"></i>
                <span>Chef</span>
            </a>
            <div id="collapsechef" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Chef Management:</h6>
                    <a class="collapse-item" href="{{route('admin.chef.index')}}">All Chefs</a>
                    <a class="collapse-item" href="{{route('admin.chef.create')}}">Add Chef</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
</div>
