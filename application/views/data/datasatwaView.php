<?=content_open($title)?>
<div class="row">
	<div class="col-md">
	<a href="<?=site_url($url.'/form/tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Data</a>
	</div>
	<div class="col-md-4">
		<form action="<?=site_url('datasatwa')?>" method="post">
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
			<th>Nama Satwa</th>
			<th>Nama Latin</th>
			<th>Nama Lain</th>
			<th>Status IUCN</th>
            <th>Rujukan Peta</th>
			<th>Kontak</th>
            <th>File PDF</th>
			<th>Tanggal Unggah</th>
            <th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($datasatwa->result() as $row) {
				?>
					<tr>
						<td><?=++$start?></td>
						<td><?=$row->nama_satwa?></td>
                        <td><?=$row->nama_latin?></td>
                        <td><?=$row->nama_lain?></td>
                        <td><?=$row->status_IUCN?></td>
                        <td><?=$row->rujukan_peta?></td>
						<td><?=$row->kontak?></td>
                        <td><a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>"><?=$row->file_pdf?></a></td>
						<td><?=$row->tanggal_upload?></td>
						<td>
							<a href="<?=site_url($url.'/form/ubah/'.$row->id_deskripsi)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=site_url($url.'/hapus/'.$row->id_deskripsi)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				
			}

		?>
	</tbody>
</table>
<?php echo $pagination; ?>
<?=content_close()?>
