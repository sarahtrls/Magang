<div class="col-auto mt-5">
	<h4 style="text-align:center">Daftar Satwa</h4>
</div>
<div class="col-md-8 mt-5 ml-4 mb-5  mx-auto">
	<form action="<?=site_url('daftar')?>" method="post">
		<div class="input-group mb">
			<input type="text" class="form-control" placeholder="Cari" name="keyword" autocomplete="off">
			<div class="input-group-append">
				<input class="btn btn-info" type="submit" name="submit">
			</div>
		</div>
	</form>

</div>
</div>
<div class="container-fluid">
	<div class="col-auto ml-4">
		<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Identitas</th>
					<th scope="col">Status IUCN</th>
					<th scope="col">Rujukan Literasi</th>
					<th scope="col"> </th>
					<th scope="col"> </th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($datasatwa->result() as $row) {
				?>
				<tr>
					<td>
						<h5 class="card-title" style="margin-bottom:1px"><?=$row->id_deskripsi?></h5>
					</td>
					<td>
						<h5 class="card-title" style="margin-bottom:1px"><?=$row->nama_satwa?></h5>
						<p class="card-text" style="font-style:italic ; margin-bottom:1px"><?=$row->nama_latin?></p>
						<p class="card-text" style="; padding-bottom:3px"><?=$row->nama_lain?></p>
						<p class="card-text"  style="font-style:italic;margin-bottom:1px">Sumber Rujukan Peta : <?=$row->rujukan_peta?></p>
						<p class="card-text"  style="margin-bottom:1px">Kontak : <?=$row->kontak?></p>
					</td>
					<td>
						<p class="card-title" style="margin-bottom:1px"><?=$row->status_IUCN?></p>
					</td>
					<td>
						<p style="text-align:left"><a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>"
						class="btn btn-outline-info btn-sm" target='_blank'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Lihat PDF</a></p>
					</td>
				</tr>
				
				<?php
				}
			?>
				
			</tbody>
		</table>
		</div>
	</div>
</div>
<?php echo $pagination; ?>
