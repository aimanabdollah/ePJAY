<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        @php
            $logoPath = 'assets/sistem/' . $configuration->logo_sistem;
            $defaultImagePath = 'assets/no-img.jpg';
            
            if (!file_exists(public_path($logoPath)) || empty($configuration->logo_sistem)) {
                $logoPath = $defaultImagePath;
            }
        @endphp
        <img src="{{ asset($logoPath) }}" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-bold">{{ $configuration->singkatan_sistem }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                @php
                    $logoPath = 'assets/profile-img/' . Auth::user()->gambar;
                    $defaultImagePath = 'assets/no-img.jpg';
                    
                    if (!file_exists(public_path($logoPath)) || empty(Auth::user()->gambar)) {
                        $logoPath = $defaultImagePath;
                    }
                @endphp
                <img src="{{ asset($logoPath) }}" class="img-circle" alt="User Image" style="height: 33px">

            </div>
            <div class="info">
                <a href="#" class="d-block">Hi, {{ Auth::user()->nama_panggilan }}!</a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                @if (Auth::user()->role == 1)
                    <li class="nav-item">
                        <a href="{{ url('admin-home') }}"
                            class="nav-link {{ Request::is('admin-home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Halaman Utama
                            </p>
                        </a>
                    </li>

                    <li class="nav-item application">
                        <a href="#"
                            class="nav-link {{ Request::is('application-record*') || Request::is('application-approval*') || Request::is('application-registration*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Permohonan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('application-approval') }}"
                                    class="nav-link {{ Request::is('application-approval*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pengesahan @if ($countApplicationApproval > 0)
                                            <span class="badge badge-info right">{{ $countApplicationApproval }}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('application-record') }}"
                                    class="nav-link {{ Request::is('application-record*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Senarai Permohonan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('application-registration') }}"
                                    class="nav-link {{ Request::is('application-registration*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pendaftaran @if ($countApplicationRegistration > 0)
                                            <span
                                                class="badge badge-info right">{{ $countApplicationRegistration }}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin-orphan') }}"
                            class="nav-link {{ Request::is('admin-orphan*') || Request::is('report-orphan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Anak Jagaan
                            </p>
                        </a>
                    </li>


                    <li class="nav-item transaction">
                        <a href="#"
                            class="nav-link {{ Request::is('admin-category*') || Request::is('admin-income*') || Request::is('admin-expense*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Kewangan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin-category') }}"
                                    class="nav-link {{ Request::is('admin-category*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Kategori
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-income') }}"
                                    class="nav-link {{ Request::is('admin-income*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pendapatan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-expense') }}"
                                    class="nav-link {{ Request::is('admin-expense*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Perbelanjaan
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin-user') }}"
                            class="nav-link {{ Request::is('admin-user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Pengguna
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin-configuration') }}"
                            class="nav-link {{ Request::is('admin-configuration*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Konfigurasi
                            </p>
                        </a>
                    </li>

                    {{-- <li class="nav-item transaction">
                        <a href="#"
                            class="nav-link {{ Request::is('admin-category*') || Request::is('admin-income*') || Request::is('admin-expense*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Rekod Penghapusan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin-category') }}"
                                    class="nav-link {{ Request::is('admin-category*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Kategori
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-income') }}"
                                    class="nav-link {{ Request::is('admin-income*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pendapatan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-expense') }}"
                                    class="nav-link {{ Request::is('admin-expense*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Perbelanjaan
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                @endif


                @if (Auth::user()->role == 2)
                    <li class="nav-item">
                        <a href="{{ url('staf-home') }}"
                            class="nav-link {{ Request::is('staf-home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Halaman Utama
                            </p>
                        </a>
                    </li>

                    <li class="nav-item application">
                        <a href="#"
                            class="nav-link {{ Request::is('application-record*') || Request::is('application-approval*') || Request::is('application-registration*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Permohonan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('application-approval') }}"
                                    class="nav-link {{ Request::is('application-approval*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pengesahan @if ($countApplicationApproval > 0)
                                            <span class="badge badge-info right">{{ $countApplicationApproval }}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('application-record') }}"
                                    class="nav-link {{ Request::is('application-record*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Senarai Permohonan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('application-registration') }}"
                                    class="nav-link {{ Request::is('application-registration*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pendaftaran @if ($countApplicationRegistration > 0)
                                            <span
                                                class="badge badge-info right">{{ $countApplicationRegistration }}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin-orphan') }}"
                            class="nav-link {{ Request::is('admin-orphan*') || Request::is('report-orphan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Anak Jagaan
                            </p>
                        </a>
                    </li>


                    <li class="nav-item transaction">
                        <a href="#"
                            class="nav-link {{ Request::is('admin-category*') || Request::is('admin-income*') || Request::is('admin-expense*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Kewangan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin-category') }}"
                                    class="nav-link {{ Request::is('admin-category*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Kategori
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-income') }}"
                                    class="nav-link {{ Request::is('admin-income*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Pendapatan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin-expense') }}"
                                    class="nav-link {{ Request::is('admin-expense*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right nav-icon"></i>
                                    <p>Perbelanjaan
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif



                @if (Auth::user()->role == 3)
                    <li class="nav-item">
                        <a href="{{ url('user-home') }}"
                            class="nav-link {{ Request::is('user-home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Halaman Utama
                            </p>
                        </a>
                    </li>

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
                            class="nav-link {{ Request::is('list-orphan*') || Request::is('admin-orphan*') || Request::is('report-orphan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Anak Jagaan
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('profile.edit', ['user' => Auth::user()->id]) }}"
                        class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Profil
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
