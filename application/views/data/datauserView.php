<?=content_open($title)?>
<div class="row">
	<div class="col-md">
	</div>
	<div class="col-md-4">
		<form action="<?=site_url('datauser')?>" method="post">
			<div class="input-group mb">
				<input type="text" class="form-control" placeholder="Cari Kata" name="keyword" autocomplete="off">
				<div class="input-group-append">
					<input class="btn btn-info" type="submit" name="submit">
				</div>
			</div>
			<p style="font-weight:bold; font-size:15px">Hasil : <?=$total_rows?></p>
		</form>
	</div>
</div>
<hr>
<?=$this->session->flashdata('info')?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pengguna</th>
			<th>Email</th>
			<th>Status</th>
			<th>Nomor Induk Pegawai</th>
			<th>Nama Instansi</th>
            <th>Aksi</th>

		</tr>   
	</thead>
	<tbody>
		<?php
			foreach ($datauser->result() as $row) {
				?>
					<tr>
						<td><?=++$start?></td>
						<td><?=$row->username?></td>
                        <td><?=$row->email?></td>
                        <td><?=$row->status?></td>
						<td><?=$row->nip?></td>
                        <td><?=$row->nama_instansi?></td>
						<td>
						    <a href="<?=site_url($url.'/hapus/'.$row->id_user)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				
			}

		?>
	</tbody>
</table>
<?php echo $pagination; ?>
<?=content_close()?>
