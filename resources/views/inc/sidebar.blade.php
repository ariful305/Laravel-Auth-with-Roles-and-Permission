
<a href="{{ route('admin.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light ">
        
        Admin 
    </span> 
    Dashboard
</a>
        
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if ( Auth::user()->images!=NULL)
            <img src="{{ asset(Auth::user()->images) }}" class="img-circle elevation-2" alt="User Image">
            @else
            <img src="{{ asset('img/user/1678975331.jpg') }}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
            <a href="{{ route('admin.profile') }}" class="d-block"> {{ Auth::user()->name }} </a>
        </div>
    </div>


    <!-- Sidebar Menu -->
   
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link @if (Request::is('admin/dashboard*')) active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.filemanager') }}" class="nav-link @if (Request::is('admin/filemanager*')) active @endif">
                    <i class="fas fa-folder nav-icon"></i>
                    <p>
                        File manager

                    </p>
                </a>
            </li>

           
            <li class="nav-item menu-is-opening {{ Request::routeIs('admin.user*') || Request::routeIs('admin.roles*')  ||  Request::routeIs('admin.permissions*') ? 'is-opening menu-open' : ' ' }}">
                <a href="#" class="nav-link {{ Request::routeIs('admin.user*') || Request::routeIs('admin.roles*')  ||  Request::routeIs('admin.permissions*')  ? 'active' : ' '}}">
                    <i class="nav-icon fas fa-users"></i>
                  <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" {{ Request::routeIs('admin.user*') || Request::routeIs('admin.roles*')  ||  Request::routeIs('admin.permissions*')  ? 'style="display: none;"' : ' ' }}>
                 
                  <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::routeIs('admin.user*') ? 'active' : ' '}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            User List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::routeIs('admin.roles*') ? 'active' : ' '}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Roles List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ Request::routeIs('admin.permissions*') ? 'active' : ' '}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Permissions List
                        </p>
                    </a>
                </li>
                </ul>
              </li>
            <li class="nav-item">
                <a href="{{ route('admin.profile') }}" class="nav-link {{ Request::routeIs('admin.profile') ? 'active' : ' '}}">
                   <i class="nav-icon fas fa-user-circle"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>


        </ul>
    </nav>
 


        </ul>
    </nav>

    <!-- /.sidebar-menu -->
</div>
