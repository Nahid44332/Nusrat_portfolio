<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ url('/admin/dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Nusrat Jahan</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('frontend/assets/img/blog/Nusrat Jahan.png') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Nusrat Jahan</h6>
                <span>Admin</span>
            </div>
        </div>

        <div class="navbar-nav w-100">

            <!-- Dashboard -->
            <a href="{{ url('/admin/dashboard') }}"
                class="nav-item nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- About Section -->
            <a href="{{ url('/about') }}" class="nav-item nav-link {{ request()->is('about*') ? 'active' : '' }}">
                <i class="fa fa-user me-2"></i>About Section
            </a>

            <!-- Portfolio -->
            <a href="{{ url('/admin/protfolio') }}"
                class="nav-item nav-link {{ request()->is('admin/protfolio*') ? 'active' : '' }}">
                <i class="fa fa-briefcase me-2"></i>Portfolio
            </a>

            <!-- Services -->
            <a href="{{ url('/admin/service') }}"
                class="nav-item nav-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                <i class="fa fa-cogs me-2"></i>Services
            </a>

            <a href="{{ url('/admin/category') }}"
                class="nav-item nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class="fa fa-tags me-2"></i>Category
            </a>
            <!-- Banner -->
            <a href="{{ url('/admin/banner') }}"
                class="nav-item nav-link {{ request()->is('admin/banner*') ? 'active' : '' }}">
                <i class="fa fa-image me-2"></i>Banner
            </a>

            <!-- Blog -->
            <a href="{{ url('/admin/blog') }}"
                class="nav-item nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}">
                <i class="fa fa-blog me-2"></i>Blog
            </a>

            <!-- Experience -->
            <a href="{{ url('/admin/education') }}"
                class="nav-item nav-link {{ request()->is('admin/education*') ? 'active' : '' }}">
                <i class="fa fa-graduation-cap me-2"></i>Experience
            </a>

            <!-- Messages -->
            <a href="{{ url('/admin/messages') }}"
                class="nav-item nav-link {{ request()->is('admin/messages*') ? 'active' : '' }}">
                <i class="fa fa-envelope me-2"></i>Messages
            </a>

            <!-- Testimonials -->
            <a href="{{ url('/admin/testimonials') }}"
                class="nav-item nav-link {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                <i class="fa fa-comment-dots me-2"></i>Testimonials
            </a>

            <!-- Users -->
            <a href="{{ url('/admin/users') }}"
                class="nav-item nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>User
            </a>

            <!-- Site Settings -->
            <a href="{{ url('admin/setting') }}"
                class="nav-item nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                <i class="fa-solid fa-gear me-2"></i>Site Settings
            </a>

        </div>
    </nav>
</div>
