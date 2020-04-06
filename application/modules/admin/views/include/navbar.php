<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('profile'); ?>">
          <i class="fas fa-user"></i> &nbsp; <?php echo $this->session->userdata("firstname"); ?>         
        </a>        
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">
          <i class="fas fa-sign-out-alt"></i> Logout         
        </a>        
      </li>      
    </ul>
  </nav>
  <!-- /.navbar --> 