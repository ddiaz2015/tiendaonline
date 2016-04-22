      <header class="main-header">
        <!-- Logo -->
        <a href="?mod=inicio" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="img/tienda-online.jpg" alt="Inicio" class="img-circle" width="35" height="25"/></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Variedades</b> Jaqueline</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/user_icon.png" style="background: #ffffff;"  class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo "Nombre usuario"//echo($_SESSION["nombre"]); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="img/user_icon.png" style="background: #ffffff;" class="img-circle" alt="User Image">
                    <p>
                      <?php echo($_SESSION["cargo"]); ?>
                      <small><?php echo($_SESSION["id_rol"]); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?mod=contrasena" class="btn btn-default btn-flat">Cambiar contrase&ntilde;a</a>
                    </div>
                    <div class="pull-right">
                      <a href="?mod=logout" class="btn btn-default btn-flat">Cerrar sesion</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>