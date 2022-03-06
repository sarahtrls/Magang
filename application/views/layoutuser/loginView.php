<!-- <img src="<?=img('/pl-1.png')?>" width="100" height="100" alt=""> -->
<?=$this->session->flashdata('message');?>
<div class="container">
	
		<div class="loginform">
			<div class="heading">
				<h1>Selamat Datang</h1>
				<p>Silakan masuk terlebih dahulu</p>
			</div>
			<form class="user" method="post" action="<?=site_url('auth')?>">
			<div class="form-group">
				<label for="exampleInputname1">Username</label>
				<input type="text" class="form-control" id="exampleInputname1" name="username" autocomplete="off" value="<?=set_value('username')?>">
				<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
			</div>
			<div class="form-group">
				<label for="examplePassword1">Password</label>
				<input type="password" class="form-control" id="examplePassword1" name="password" autocomplete="off"?>
				<?= form_error('password','<small class="text-danger pl-3">','</small>');?>
			</div>
			
				<button type="submit" class="submit" value="login" name="login">Masuk</button>
				
			</form>
			<a style="color:black" href="<?=site_url('auth/register')?>"><p style="text-align:center">Belum punya akun?</p></a>
		</div>
</div>