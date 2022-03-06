<div class="col-auto mt-5">
<h4 style="text-align:center">Daftar Satwa</h4>
	<hr>
	</hr>
</div>
<div class="col-md-8 mt-5 ml-4 mb-5  mx-auto">
	<form action="<?=site_url('daftar')?>" method="post">
		<div class="input-group mb">
			<input type="text" class="form-control" placeholder="Cari Satwa" name="keyword" autocomplete="off">
			<div class="input-group-append">
				<input class="btn btn-success" type="submit" name="submit">
			</div>
		</div>
	</form>
</div>
</div>
<div class="container-fluid">
	<div class="col-auto ml-4">
		<div class="row">
			<?php 
			foreach ($datadesk as $row) {
			?>
			<div class="card ml-2 mr-3 mb-3" style="width: 24rem;">
				<!-- <img class="card-img-top" src="<?=assets('unggah/foto/'.$row->foto_satwa)?>" alt="Card image cap" style="height:280px"> -->
				<div class="card-body">
					<h5 class="card-title" style="margin-bottom:1px"><?=$row->nama_satwa?></h5>
					<p class="card-text" style="font-style:italic ; padding-bottom:1px"><?=$row->nama_latin?></p>
					<p class="card-text" style="margin-bottom:1px">Sebaran Pulau : <?=$row->pulau?></p>
					<p class="card-text" style="padding-bottom:1px;">Status IUCN : <?=$row->status_IUCN?></p>
					<!-- <p class="card-text"><?=$row->deskripsi?></p> -->
					<p class="card-text" style="font-style:italic">Sumber Rujukan Peta: <?=$row->sumber_rujukan?></p>
					<a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>" button class="btn btn-success">Lihat PDF</a>
					<a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>" style="font-style:italic;color:black">URL : <?=$row->file_pdf?></a>
				</div>
	
			</div>
	
			<?php
		}
		?>
	
		</div>
	</div>
</div>
<?php echo $pagination; ?>  
