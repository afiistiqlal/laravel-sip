<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}} " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{Auth::user()->name}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{URL::to("/dashboard")}} " class="nav-link {{Request::is('dashboard*')?'active' :''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
        <li class="nav-item has-treeview {{Request::is('admin*')?'menu-open':''}}">
          <a href="#" class="nav-link {{Request::is('admin*')?'active':''}}">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{URL::to("/admin/category")}}" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/admin/product')}}" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="{{URL::to("/admin/transaction")}} " class="nav-link {{Request::is('admin/transaction*')?'active' :''}}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Sales
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('logout')}} " class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>

       
      </nav>
      <!-- /.sidebar-menu -->
    </div>