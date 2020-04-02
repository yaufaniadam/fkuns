<table id="tb_penelitian" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width: 50%;" class="text-center">Nama</th>
			<th class="text-center">NIM</th>
			<th class="text-center">Tahap</th>
			<th class="text-center">Divisi</th>
			<th class="text-center">Periode</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $residen) {  ?>
			<tr>
				<td><?= $residen['nama_lengkap']; ?></td>
				<td><?= $residen['nim']; ?></td>
				<td><?= $residen['tahap']; ?></td>
				<td><?= $residen['divisi']; ?></td>
				<td><?= $residen['periode']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
