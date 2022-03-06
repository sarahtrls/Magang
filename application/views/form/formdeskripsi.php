<?php
$id_deskripsi="";
$nama_satwa="";
$nama_lain="";
$nama_latin="";
$status_IUCN="";
$kontak="";
$rujukan_peta="";
$file_pdf="";
$tanggal_upload="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_deskripsi',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open('Form Deskripsi')?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('parameter',$parameter)?>
    	<?=input_hidden('id_deskripsi',$id_deskripsi)?>
		<h4>Identitas Satwa</h4>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nama Satwa</label>
            <?=input_text('nama_satwa',$nama_satwa)?>
        </div>
        <div class="form-group col-md-4">
            <label>Nama Latin</label>
            <?=input_text('nama_latin',$nama_latin)?>
        </div>
        <div class="form-group col-md-4">
            <label>Nama Lain</label>
            <?=input_text('nama_lain',$nama_lain)?>
        </div>
    </div>
    <hr></hr>
    <div class="form-group">
        <label>Status IUCN</label>
        <div class="row">
            <div class="col-md-12">
                <?=input_text('status_IUCN',$status_IUCN)?>
            </div>
        </div>
    </div>
    <hr></hr>
    <div class="form-row col-md-15">
        <div class="form-group col-md-6">
            <label>Rujukan Peta</label>
            <?=textarea('rujukan_peta',$rujukan_peta)?>
        </div>
        <div class="form-group col-md-6">
            <label>Kontak</label>
            <?=textarea('kontak',$kontak)?>
        </div>
    </div>
    <hr></hr>

    <h4>Unggah File</h4>
    <div class="form-row col-md-15">
        <div class="form-group col-md-6">
            <label>Unggah FIle PDF</label>
            <?=input_file('file_pdf',$file_pdf)?>
                <?php if ($parameter=='ubah'): ?>
                    <small class="text-success">Biarkan kosong jika tidak ingin diubah</small>
                <?php endif ?>
        </div>
		<div class="form-group col-md-6">
		<label>Tanggal Unggah</label>
			<?=input_date('tanggal_upload',$tanggal_upload)?>
		</div>
	</div>
	<div class="form-row col-md-15">
		
	</div>

	<hr></hr>
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>
