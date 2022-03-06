<!-- <div class="col mt-5">
	<form action="<?=site_url('user')?>" method="post">
			<div class="input-group mb">
				<input type="text" class="form-control" placeholder="Cari Satwa" name="keyword" autocomplete="off">
				<div class="input-group-append">
                    <input class="btn btn-success" type="submit" name="submit"> 
				</div>
			</div>
	</form>
</div>
</div>
<div class="col-auto">
	<h5 style="text-align:center">Daftar Satwa</h5>
	<hr>
	</hr>
</div>
<div class="row mx-auto">

	<div class="row mx-auto">
		<?php 
        foreach ($datasatwa->result() as $row) {
    ?>
		<div class="card ml-2 mr-3 mb-3" style="width: 24rem;">
				<img class="card-img-top" src="<?=assets('unggah/foto/'.$row->foto_satwa)?>" alt="Card image cap" style="height:280px">
				<div class="card-body">
					<span>
						<h5 class="card-title" style="margin-bottom:1px"><?=$row->nama_satwa?></h5>
					</span>
					<p class="card-text" style="font-style:italic ; padding-bottom:1px"><?=$row->nama_latin?></p>
					<hr>
					<p class="card-text" style="margin-bottom:1px">Sebaran Pulau : <?=$row->pulau?></p>
					<p class="card-text" style="margin-bottom:1px;font-style:italic;">Status IUCN : <?=$row->status_IUCN?></p>
					<p class="card-text" style="margin-bottom:1px;" >Literasi : <a href="<?=$row->deskripsi?>"><p class="card-text" ><?=$row->deskripsi?></p></a>
					<hr> 
					<p class="card-text">Sumber Rujukan Peta : <?=$row->sumber_rujukan?></p>
					<a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>" style="font-style:italic;color:black">URL : <?=$row->file_pdf?></a> -->
					<!-- <a style="color:black" href="<?=site_url('user/Desk')?>"><h5 style="text-align:center">Lihat Lainnya</h5></a>
					<p style="text-align:left"><a href="<?=assets('unggah/pdf/'.$row->file_pdf)?>" class="btn btn-info" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Lihat PDF</a></p>
				</div>
	
			</div>
		<?php
    }
    ?>

	</div>
</div>
</div>
<div class="col mt-4 mb-5">
    <a style="color:black" href="<?=site_url('daftar')?>">
        <h5 style="text-align:center">Lihat Lainnya</h5>
    </a>
	<?php echo $pagination; ?>   -->
