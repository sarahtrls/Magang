<?php
$id_user="";
$username="";
$email="";
$status="";
$nama_instansi="";
$role="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_user',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open('Form User')?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('parameter',$parameter)?>
    	<?=input_hidden('id_user',$id_user)?>
    	<div class="form-group">
    		<label>Nama Pengguna</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('username',$username)?>
		    	</div>
	    	</div>
    	</div>
        <div class="form-group">
    		<label>Email</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('email',$email)?>
		    	</div>
	    	</div>
    	</div>
        <div class="form-group">
    		<label>Status</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('status',$status)?>
		    	</div>
	    	</div>
    	</div>
        <div class="form-group">
    		<label>Nama Instansi</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nama_instansi',$nama_instansi)?>
		    	</div>
	    	</div>
    	</div>
        <div class="form-group">
    		<label>Role</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('role',$role)?>
		    	</div>
	    	</div>
    	</div>
		
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>
