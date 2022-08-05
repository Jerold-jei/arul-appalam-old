<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Admin Panel</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Admin Dashboard</span>
            <div class="badge badge-info badge-pill"></div>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Components</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Product Details</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="category.php">Product Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="products.php">Products</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="discount.php">
            <i class="mdi mdi-check-decagram menu-icon"></i>
            <span class="menu-title">Coupons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="banner.php">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">Banner</span>
          </a>
        </li>              
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi  mdi-cart menu-icon"></i>
            <span class="menu-title">Orders</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic1">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="detail-table.php">Products Table</a></li>
              <li class="nav-item"> <a class="nav-link" href="basic-table.php">Order History</a></li>
              <li class="nav-item"> <a class="nav-link" href="basic-table.php">Order Status</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php">
            <i class="mdi mdi-message-text menu-icon"></i>
            <span class="menu-title">Notifications</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="payment_history.php">
            <i class="mdi mdi-information menu-icon"></i>
            <span class="menu-title">Payment History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account-circle menu-icon"></i>
            <span class="menu-title">Admin Settings</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="admin.php"> Admin Details </a></li>              
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">General Settings</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth1">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="#"> Change Theme </a></li>
              <li class="nav-item"> <a class="nav-link" href="#"> Change Theme </a></li>
             </ul>
          </div>
        </li>        
      </ul>
    </nav>