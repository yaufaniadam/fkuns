
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=$title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
	</section>
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">        
          <div class="col-md-12">
			<?=$deskripsi; ?>

			<?php if($query) { 
				echo "<pre>";
				print_r($query);
				echo "</pre>";
			}
			?>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 <script>
  $("#<?=$id_menu; ?>").addClass('menu-open');
  $("#<?=$id_menu; ?> .<?=$class_menu; ?> a.nav-link").addClass('active');
</script>
