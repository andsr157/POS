<div class="row">
	<div class="col-12">
		<div class="page-header d-flex justify-content-start align-items-center">
		<div class="quick-link-wrapper d-md-flex flex-md-wrap">
			<ul class="quick-links">
			<li><a href="">Daftar Akun</a></li>
			<li><a href="">Akun Baru</a></li>
			</ul>
		</div>
		</div>
		<div class="card card-noborder b-radius">
			<div class="card-body">
				<?php //echo validation_errors();?>
				<form action="" method="post">
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Nama <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=set_value('nama')?>">
						  <?=form_error('nama')?>
				  	</div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Username <span class="text-danger">*</span></label>
					  <div class="col-12">
						  <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?=set_value('username')?>">
						  <?=form_error('username')?>
					  </div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Password <span class="text-danger">*</span></label>
					  <div class="col-12">
						  <input type="password" class="form-control" name="password" placeholder="Masukkan Password" value="<?=set_value('password')?>">
						  <?=form_error('password')?>
					  </div>
					  <div class="col-12 error-notice" id="password_error"></div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Password Confirmation <span class="text-danger">*</span></label>
					  <div class="col-12">
						  <input type="password" class="form-control" name="passconf" placeholder="Masukkan Konfirmasi Password" value="<?=set_value('passconf')?>">
						  <?=form_error('passconf')?>
					  </div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Email <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="email" class="form-control" name="email" placeholder="Masukkan Email"  value="<?=set_value('email')?>">
						  <?=form_error('email')?>
				  	</div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Posisi <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<select class="form-control" name="level">
				  			<option value="">-- Pilih Posisi --</option>
				  			<option value="1" <?=set_value('level') == 1 ? 'selected' : null?>>Admin</option>
				  			<option value="2" <?=set_value('level') == 2 ? 'selected': null?>>Kasir</option>
				  		</select>
						  <?=form_error('level')?>
				  	</div>
				  </div>
				  <div class="row mt-5">
				  	<div class="col-12 d-flex justify-content-end ">
				  		<button style="background-color:#1c45ef; color:white" class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save" ></i> Simpan</button>
				  	</div>
				  </div>	
				</form>
			</div>
		</div>
	</div>
</div>