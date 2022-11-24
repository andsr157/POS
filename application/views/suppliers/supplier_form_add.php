<div class="row">
	<div class="col-12">
		<div class="page-header d-flex justify-content-start align-items-center">
		<div class="quick-link-wrapper d-md-flex flex-md-wrap">
			<ul class="quick-links">
			<li><a href=""><?=Ucfirst($page)?></a></li>
			<li><a href="">Supplier</a></li>
			</ul>
		</div>
		</div>
		<div class="card card-noborder b-radius">
			<div class="card-body">
				<?php //echo validation_errors();?>
				<form action="<?=base_url('supplier/process')?>" method="post">
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Nama <span class="text-danger">*</span></label>
				  	<div class="col-12">
						<input type="hidden" name="id" value="<?=$row->supplier_id?>">
				  		<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=$row->nama?>">
				  	</div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Nomor Telepon <span class="text-danger">*</span></label>
					  <div class="col-12">
						  <input type="text" class="form-control" name="phone" placeholder="Masukkan Nomor Telepon" value="<?=$row->phone?>">
						 
					  </div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Alamat <span class="text-danger">*</span></label>
					  <div class="col-12">
						  <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat" value="<?=$row->address?>">
						  
					  </div>
					  <div class="col-12 error-notice" id="password_error"></div>
				  </div>
				  <div class="form-group row">
					  <label class="col-12 font-weight-bold col-form-label">Deskripsi<span class="text-danger"> optional*</span></label>
					  <div class="col-12">
						  <input type="text-area" class="form-control" name="description" placeholder="Masukan Deskripsi" value="<?=$row->description?>">
						  
					  </div>
				  </div>
				  </div>
				  
				  </div>
				  <div class="row mt-5">
				  	<div class="col-12 d-flex justify-content-end ">
				  		<button style="background-color:#1c45ef; color:white" name = "<?=$page?>"class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save" ></i> Simpan</button>
				  	</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>