
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <!-- <div class="col-md-4">

            <!-- Profile Image --
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                   <?php if($user['photo'] == '' ) { ?>
                     
                      <img class="profile-user-img img-fluid img-circle"
                            src="<?=base_url(); ?>public/dist/img/avatar5.png"
                            alt="User profile picture">

                    <?php } else { ?>

                      <img class="profile-user-img img-fluid img-circle"
                            src="<?=base_url($user['photo'] ); ?>"> 

                    <?php } ?>


                </div>

                <h3 class="profile-username text-center"><?=$user['firstname'];?></h3>
                             
               
              </div>
              <!-- /.card-body --
            </div>
            <!-- /.card --

            <!-- About Me Box --
           
          </div>
          !-- /.col -->
          <div class="col-md-8">
             <div class="card card-warning card-outline">
              
              <div class="card-body">

                
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted">
                  <?php echo $user['nama_lengkap']; ?>
                </p>
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted">
                  <?php echo $user['email']; ?>
                </p>
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted">
                  <?php echo $user['telp']; ?>
                </p>
               

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 <script>
  $("#pengguna").addClass('menu-open');
</script>
