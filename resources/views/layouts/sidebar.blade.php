<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-grid"></i> <!-- Ikon grid dari Bootstrap Icons -->
                </button>
                <div class="sidebar-logo">
                    <a href="#">DelCafe</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{route('menus.tampilan')}}" class="sidebar-link">
                        <i class="bi bi-menu-up"></i>  <!-- Ikon menu makanan -->
                        <span>Menu Makanan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('jadwals.tampilan')}}" class="sidebar-link">
                        <i class="bi bi-clock"></i> <!-- Ikon jadwal/jam -->
                        <span>Jadwal</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="bi bi-shield-lock"></i> <!-- Ikon auth -->
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="bi bi-layers"></i> <!-- Ikon multi level -->
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bell"></i> <!-- Ikon notifikasi -->
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-gear"></i> <!-- Ikon setting -->
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link" style="border: none; background: none; padding: 0; margin: 0; color: inherit; cursor: pointer;">
                <a class="sidebar-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
            </div>
        </div>
    </div>
</body>
