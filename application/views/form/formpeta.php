<?php
$id_peta="";
$nama_satwa="";
$file_geojson="";
$warna="";
$tanggal_upload="";

if($parameter=='ubah' && $id!=''){
    $this->db->where('id_peta',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open('Form Peta')?>
<form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
	<?=input_hidden('parameter',$parameter)?>
	<?=input_hidden('id_peta',$id_peta)?>
	<h4>Identitas Satwa</h4>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Nama Satwa</label>
			<?=input_text('nama_satwa',$nama_satwa)?>
		</div>
	</div>
	<hr></hr>
	<h4>Unggah File</h4>
	<div class="form-row col-md-15">
		<div class="form-group col-md-6">
			<label>Unggah FIle Geojson</label>
			<?=input_file('file_geojson',$file_geojson)?>
				<?php if ($parameter=='ubah'): ?>
				<small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
				<?php endif ?>
		</div>
		<div class="form-group col-md-6">
			<label>Warna Polygon</label>
			<?=input_color('warna',$warna)?>
		</div>
		
	</div>
	<div class="form-row col-md-15">
	

	</div>
	<div class="form-row col-md-15">
		<div class="form-group col-md-6">
		<label>Tanggal Unggah</label>
			<?=input_date('tanggal_upload',$tanggal_upload)?>
		</div>
	</div>

	<hr></hr>
	<div class="form-group text-left">
		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		<a href="<?=site_url($url)?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
	</div>
</form>
<?=content_close()?>
