  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="https://cdn.thukyluat.vn/nhch-images//CauHoi_Hinh/9eb6abaa-8cda-456c-ad66-26ba4da23ffe.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DoTrongNhan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://lambanner.com/wp-content/uploads/2020/04/MNT-DESIGN-10-MEO-THIET-KE-LOGO.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="display: flex;">
          <a href="#" class="d-block">@if(isset(auth()->user()->name)) {{auth()->user()->name}} @endif</a>
          <a href="{{route('admin.logout')}}" onclick="return confirm('Are you sure you want to logout?')" style="margin-left: 20px"><i class="fa-solid fa-right-from-bracket"></i></a>
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
            <li class="nav-item">
            <a class="nav-link part" style="color: orange">
                <i class="nav-icon fas fa-th"></i><p>Product Management</p>
            </a>
            </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.product_list')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Product List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product_insert')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Product Add</p>
                    </a>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link part" style="color: orange">
                <i class="nav-icon fas fa-th"></i><p>Category Management</p>
                </a>
            </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.category_list')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Category List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category_insert')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Category Add</p>
                    </a>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link part" style="color: orange">
                <i class="nav-icon fas fa-th"></i><p>Order Management</p>
                </a>
            </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.order_list')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Order List</p>
                    </a>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link part" style="color: orange">
                <i class="nav-icon fas fa-th"></i><p>Contact Management</p>
                </a>
            </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.contact_list')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>Contact List</p>
                    </a>
                </li>
            </ul>
            <li class="nav-item">
                <a class="nav-link part" style="color: orange">
                <i class="nav-icon fas fa-th"></i><p>User Management</p>
                </a>
            </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.user_list')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>User List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user_insert')}}" class="nav-link">
                    <i class="fa-solid fa-circle-right"></i> &nbsp; <p>User Add</p>
                    </a>
                </li>
            </ul>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>