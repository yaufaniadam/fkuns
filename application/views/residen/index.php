<link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">



<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?= $title; ?>
					<!-- <?php print_r($_SESSION) ?> -->

					<?php if ($this->session->is_admin == 1) { ?>
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

			<?php print_r($query); ?>
			<!-- DAFTAR RESIDEN -->

			<?php if ($type == 'tahap_spesifik_residen' or $type == 'divisi_spesifik_residen') { ?>
				<div class="dropdown">
					<?php foreach ($query as $residen) {
					} ?>
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $residen['nama_lengkap']; ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<?php foreach (getAllResiden() as $residen) {  ?>
							<?php if ($type == 'tahap_spesifik_residen') { ?>
								<a class="dropdown-item" href="<?= base_url('admin/residen/tahap_by_residen/' . $residen['id']); ?>"><?= $residen['nama_lengkap']; ?></a>
							<?php } ?>
							<?php if ($type == 'divisi_spesifik_residen') { ?>
								<a class="dropdown-item" href="<?= base_url('admin/residen/divisi_by_residen/' . $residen['id']); ?>"><?= $residen['nama_lengkap']; ?></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<br>
			<br>

			<div class="card">

				<div class="card-body">

					<?php if ($type == 'all_residen') {
						include 'allResiden.php';
					} elseif ($type == 'residen_by_tahap') {
						include 'residenByTahap.php';
					} elseif ($type == 'tahap_spesifik_residen') {
						include 'tahapSpesifikResiden.php';
					} elseif ($type == 'residen_by_divisi') {
						include 'residenByDivisi.php';
					} elseif ($type == 'divisi_spesifik_residen') {
						include 'divisiSpesifikResiden.php';
					}
					?>

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
