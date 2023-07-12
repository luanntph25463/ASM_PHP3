<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/luan.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Xin chào Luân</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/luan.jpeg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nguyễn Thành Luân</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-chart-simple"></i>
              <p>
                Thống kê
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="" class="nav-link ">
                <i class="fa-brands fa-discourse"></i>
              <p>
                Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('courses.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('courses.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.list', ['id'=>1]) }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa-solid fa-image"></i>              <p>
                Banners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('banners.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('banners.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa-solid fa-comment"></i>              <p>
                Đánh Gía
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('reviews.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reviews.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Giáo Viên
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('teachers.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('teachers.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa-solid fa-tag"></i>              <p>
                Phiếu Giảm Giá
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('promotions.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('promotions.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa-solid fa-screen-users"></i>
                <p>
                Lớp
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('classes.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('classes.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="fa-solid fa-user"></i>              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.list') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ asset('users/list') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset('users/list') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Thoát
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
