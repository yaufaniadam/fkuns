<table id="tb_penelitian" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width: 50%;" class="text-center">Nama</th>
			<th class="text-center">Divisi</th>
			<th class="text-center">Tanggal Selesai</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $residen) {  ?>
			<tr>
				<td><?= $residen['nama_lengkap']; ?></td>
				<td><?= $residen['id_divisi']; ?></td>
				<td><?= $residen['end_date']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
