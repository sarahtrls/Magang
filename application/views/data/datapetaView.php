<?=content_open($title)?>

<div class="row">
	<div class="col-md">
	<a href="<?=site_url($url.'/form/tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Data</a>
	</div>
	<div class="col-md-4">
		<form action="<?=site_url('datapeta')?>" method="post">
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

<table class="table table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Satwa</th>
			<th>GeoJSON</th>
			<th>Warna</th>
			<th>Tanggal Unggah</th>
			<th>Aksi</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php
			
			foreach ($datapeta->result() as $row) {
				?>
					<tr>
						<td><?=++$start?></td>
						<td><?=$row->nama_satwa?></td>
						<td><a href="<?=assets('/unggah/geojson/'.$row->file_geojson)?>" target='_blank'><?=$row->file_geojson?></a></td>
						<td style="background: <?=$row->warna?>"></td>
						<td><?=$row->tanggal_upload?></td>

						<td>
							<a href="<?=site_url($url.'/form/ubah/'.$row->id_peta)?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=site_url($url.'/hapus/'.$row->id_peta)?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
	
			}

		?>
	</tbody>
</table>

<?php echo $pagination; ?>

<?=content_close()?>
