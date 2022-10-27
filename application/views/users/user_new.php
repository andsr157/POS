<div class="row">
	<div class="col-12">
		<div class="card card-noborder b-radius">
			<div class="card-body">
				<form action="http://localhost/ipos/public/account/create" method="post" name="create_form" enctype="multipart/form-data">
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Nama <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
				  	</div>
				  	<div class="col-12 error-notice" id="nama_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Email <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="email" class="form-control" name="email" placeholder="Masukkan Email">
				  	</div>
				  	<div class="col-12 error-notice" id="email_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Username <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
				  	</div>
				  	<div class="col-12 error-notice" id="username_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Password <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
				  	</div>
				  	<div class="col-12 error-notice" id="password_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Posisi <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<select class="form-control" name="role">
				  			<option value="">-- Pilih Posisi --</option>
				  			<option value="admin">Admin</option>
				  			<option value="kasir">Kasir</option>
				  		</select>
				  	</div>
				  	<div class="col-12 error-notice" id="role_error"></div>
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