<table id="tb_penelitian" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Nama</th>
			<th class="text-center">Tahap</th>
			<th class="text-center">Tanggal Mulai</th>
			<th class="text-center">Tanggal Selesai</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $residen) {  ?>
			<tr>
				<td><?= $residen['nama_lengkap']; ?></td>
				<td><?= $residen['tahap']; ?></td>
				<td><?= $residen['start_date']; ?></td>
				<td><?= $residen['end_date']; ?></td>
				<td><?= $residen['status']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
