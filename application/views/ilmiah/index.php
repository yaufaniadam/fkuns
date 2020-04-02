<link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?= $title; ?> 
					<!-- <?php print_r($_SESSION) ?> -->
					<?php if ($this->session->role == 3) { ?>
						<a href="<?= base_url('admin/users/add') ?>" class="btn btn-sm btn-default">Tambah baru</a>
					<?php } ?>
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><?= $title; ?></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<!-- fash message yang muncul ketika proses penghapusan data berhasil dilakukan -->
			<?php if ($this->session->flashdata('msg') != '') : ?>
				<div class="alert alert-success flash-msg alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>Success!</h4>
					<?= $this->session->flashdata('msg'); ?>
				</div>
			<?php endif; ?>


			<br>
			<br>

			<div class="card">

				<div class="card-body">

					<table id="tb_penelitian" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width:80%">Judul Ilmiah</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($query as $ilmiah) {  ?>
								<tr>
									<td><?= $ilmiah['judul_ilmiah']; ?></td>

									<td class="text-center">
									<a class="btn btn-default btn-sm" >
										<i class="fa fa-search" style="color:;"></i>
									</a>
									<a class="btn btn-default btn-sm" >
										<i class="fas fa-pencil-alt" style="color:;"></i>
									</a>
									<a href="" style="color:#fff;" title="Hapus" class="delete btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-trash-alt"></i></a>
								</td>
								</tr>
							<?php } ?>
						</tbody>
						</tfoot>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->


<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Perhatian</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Tutuo">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Yakin ingin menghapus data ini?&hellip;</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a class="btn btn-danger btn-ok">Hapus</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div> 
<!-- /.modal -->

<!-- DataTables -->
<script src="<?= base_url() ?>/public/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

<!-- page script -->
<script>
	$(function() {
		$("#tb_penelitian").DataTable();
	});


	$("#<?= $id_menu; ?>").addClass('menu-open');
	$("#<?= $id_menu; ?> .<?= $class_menu; ?> a.nav-link").addClass('active');
</script>
