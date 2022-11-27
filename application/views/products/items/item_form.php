<div class="row">
    <div class="col-12">
        <div class="page-header d-flex justify-content-start align-items-center">
            <div class="quick-link-wrapper d-md-flex flex-md-wrap">
                <ul class="quick-links">
                    <li><a href=""><?= Ucfirst($page) ?></a></li>
                    <li><a href="">item</a></li>
                </ul>
            </div>
        </div>
        <div class="card card-noborder b-radius">
            <div class="card-body">
                <?php //echo validation_errors();?>
                <form action="<?= base_url('item/process') ?>" method="post">
                    <div class="form-group row">
                        <label class="col-12 font-weight-bold col-form-label">Barcode<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?= $row->item_id ?>">
                            <input type="text" class="form-control" name="barcode" placeholder="Masukkan barcode" value="<?= $row->barcode ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 font-weight-bold col-form-label">Nama Barang<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Barang" value="<?= $row->name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 font-weight-bold col-form-label">Kategori<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <select name="category" id="" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php foreach($category->result() as $key => $data){ ?>
                                    <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? 'selected':null?>><?=$data->name?></option>
                               <?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 font-weight-bold col-form-label">Unit<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <?php echo form_dropdown('unit', $unit, $selectedunit, 
                            ['class' => 'form-control', 'required'=> 'required']) ?>
                            <!-- <div class="input-group">
                                <input type="number" class="form-control number-input" name="weight" placeholder="Masukkan Jumlah Satuan">
                                <div class="input-group-append">
                                    
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 font-weight-bold col-form-label">Harga<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <input type="number" class="form-control" name="price" placeholder="Masukkan harga" value="<?= $row->price ?>">
                        </div>
                    </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-end ">
                <button style="background-color:#1c45ef; color:white" name="<?= $page ?>" class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>