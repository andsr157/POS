<div class="row">
	<div class="col-12">
		<div class="page-header d-flex justify-content-start align-items-center">
                <div class="quick-link-wrapper d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                        <li><a href=""><?=Ucfirst($page)?></a></li>
                        <li><a href="">category</a></li>
                    </ul>
                </div>
                </div>
                <div class="card card-noborder b-radius">
                    <div class="card-body">
                        <?php //echo validation_errors();?>
                        <form action="<?=base_url('category/process')?>" method="post">
                        <div class="form-group row">
                            <label class="col-12 font-weight-bold col-form-label">Kategori Nama <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="hidden" name="id" value="<?=$row->category_id?>">
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="<?=$row->name?>">
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