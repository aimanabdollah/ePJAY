   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="" class="brand-link">
           <img src="/assets/img/logo-sistem.png" class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text">ePJAY</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user (optional) -->
           {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
               </div>

           </div> --}}

           <!-- SidebarSearch Form -->
           {{-- <div class="form-inline">
               <div class="input-group" data-widget="sidebar-search">
                   <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                   <div class="input-group-append">
                       <button class="btn btn-sidebar">
                           <i class="fas fa-search fa-fw"></i>
                       </button>
                   </div>
               </div>
           </div> --}}

           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   <li class="nav-item">
                       <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Dashboard
                           </p>
                       </a>

                   </li>

                   {{-- <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-inbox"></i>
                           <p>
                               Permohonan
                               <i class="fas fa-angle-left right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ url('add-application') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Permohonan Baharu</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ url('application') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Semakan Permohonan</p>
                               </a>
                           </li>
                       </ul>
                   </li> --}}

                   <li class="nav-item">
                       <a href="{{ url('add-application') }}"
                           class="nav-link {{ Request::is('add-application*') ? 'active' : '' }}">
                           <i class="nav-icon fas fa-inbox"></i>
                           <p>
                               Permohonan Baharu
                           </p>
                       </a>
                   </li>

                   <li class="nav-item">
                       <a href="{{ url('application') }}"
                           class="nav-link {{ Request::is('application*') ? 'active' : '' }}">
                           <i class="nav-icon fas fa-inbox"></i>
                           <p>
                               Semakan Permohonan
                           </p>
                       </a>
                   </li>


                   <li class="nav-item">
                       <a href="{{ url('list-orphan') }}"
                           class="nav-link {{ Request::is('list-orphan*') ? 'active' : '' }}">
                           <i class="nav-icon fas fa-user-alt"></i>
                           <p>
                               Anak Jagaan
                           </p>
                       </a>
                   </li>


                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                           <i class="nav-icon fas fa-sign-out-alt"></i>
                           <p>Log Keluar</p>
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>

                   </li>

               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->



   </aside>
