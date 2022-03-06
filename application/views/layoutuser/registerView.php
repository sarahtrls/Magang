<div class="heading1">
	<h1>Registrasi Akun Anda</h1>
</div>
<div class="reg">
	<form class="user" method="post" action="<?=site_url('auth/register')?>">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Username</label>
				<input type="text" class="form-control" name="username" autocomplete="off"
					value="<?=set_value('username')?>">
				<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Password</label>
				<input type="password" class="form-control" name="password" autocomplete="off">
				<?= form_error('password','<small class="text-danger pl-3">','</small>');?>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" class="form-control" id="exampleInputEmail1" name="email" autocomplete="off"
				value="<?=set_value('email')?>">
			<?= form_error('email','<small class="text-danger pl-3">','</small>');?>
		</div>
		<div class="form-group">
			<label for="exampleInputname1">Status</label>
			<input type="text" class="form-control" name="status" autocomplete="off">
		</div>
		<div class="form-group">
				<label for="inputEmail4">Nomor Induk Pegawai</label>
				<small style="color:green">(isi jika punya)</small>
				<input type="text" class="form-control" name="nip" autocomplete="off"
					value="<?=set_value('nip')?>">
				<?= form_error('nip','<small class="text-danger pl-3">','</small>');?>
			</div>
		<div class="form-group">
			<label for="exampleInputname1">Nama Instansi</label>
			<input type="text" class="form-control" name="nama_instansi" autocomplete="off">
		</div>

		<button type="submit" class="submit-reg">Buat Akun</button>
	</form>
	<a style="color:black" href="<?=site_url('auth')?>"><p style="text-align:center">Sudah punya akun?</p></a>
</div>
</form>
</div>
</div>