<table id="tb_penelitian" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Nama</th>
			<th class="text-center">NIM</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($query as $residen) {  ?>
			<tr>
				<td><?= $residen['nama_lengkap']; ?></td>
				<td><?= $residen['nim']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
