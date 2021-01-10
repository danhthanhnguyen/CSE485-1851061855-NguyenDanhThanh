<nav class="navbar navbar-expand-lg navbar-white bg-white">
  <button type="button" id="sidebarCollapse" class="btn btn-light">
    <i class="fas fa-bars"></i><span></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <div class="nav-dropdown">
          <a
            href=""
            class="nav-item nav-link dropdown-toggle text-secondary"
            data-toggle="dropdown"
            ><i class="fas fa-user"></i> <span><?php echo explode(" ", $admin[0]["name"])[count(explode(" ", $admin[0]["name"])) - 1]; ?></span>
            <i style="font-size: 0.8em" class="fas fa-caret-down"></i
          ></a>
          <div class="dropdown-menu dropdown-menu-right nav-link-menu">
            <ul class="nav-list">
              <li>
                <a href="<?php echo constant("URL")."/server/profile.php"?>" class="dropdown-item"
                  ><i class="fas fa-address-card"></i> Profile</a
                >
              </li>
              <div class="dropdown-divider"></div>
              <li>
                <a href="<?php echo constant("URL")."/server/config/logout.php"?>" class="dropdown-item"
                  ><i class="fas fa-sign-out-alt"></i> Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>