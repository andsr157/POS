<div class="row">
	<div class="col-12">
		<div class="page-header d-flex justify-content-start align-items-center">
                <div class="quick-link-wrapper d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                        <li><a href=""></a></li>
                        <li><a href="">stok | Brang masuk / Pembelian</a></li>
                    </ul>
                </div>
                </div>
                <div class="card card-noborder b-radius">
                    <div class="card-body">
                        <?php //echo validation_errors();?>
                        <form action="<?=base_url('stock/process')?>" method="post">
                        <div class="form-group row">
                            <label class="col-12 font-weight col-form-label">Date <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="date" class="form-control" name="date" placeholder="Masukkan Tanggal" value="<?=date('Y-m-d')?> " required>
                            </div>
                        </div>
                        <div class="form-group row input-group">
                            <label for="barcode" class="col-12 font-weight col-form-label">Barcode <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="hidden" name="item_id" id="item_id" value="">
                                <div class="row">
                                    <div class="col-4 px">
                                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Masukkan Nama" value="" required autofocus>
                                    </div>
                                    <div class="col px-0">
                                        <span class="input-group-btn">
                                            <button  type="button" class="btn btn-info btn-flat" style="background-color:#1c45ef; color:white" data-toggle="modal" data-target="#modal-item">
                                                <i class="mdi mdi-tag" ></i>
                                            </button>
                                        </span>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 font-weight col-form-label">Nama Item <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <div class="col-8">
                                <label class="col-12 font-weight col-form-label px-0">Unit Item <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="unit_name" id="unit_name" placeholder="" value="" readonly>
                    
                            </div>
                            <div class="col-4">
                                <label class="col-12 font-weight col-form-label">Stok Awal <span class="text-danger">*</span></label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="stock" id="stock" placeholder="" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 font-weight col-form-label">Detail <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="detail" placeholder="Tambahan / Kulakan / etc" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 font-weight col-form-label">Supplier <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <select name="supplier" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($supplier as $key => $data){
                                        echo'<option value="'.$data->supplier_id.'">'.$data->nama.'</option>';
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 font-weight col-form-label">Qty<span class="text-danger">*</span></label>
                            <div class="col-12">
                                <input type="number" class="form-control" name="qty" placeholder="Masukan Jumlah" required>
                            </div>
                        </div>
                    </div>
                        
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 d-flex justify-content-end ">
                                <button style="background-color:#1c45ef; color:white" name ="in_add"class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save" ></i> Simpan</button>
                            </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-item" >
    <div class="modal-dialog" style="max-width: 700px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tableModalLabel">Daftar Barang</h5>   
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
                <div class="table-responsive">
                    <table class="table table-custom" id="table1">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Unit</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($item as $key => $data){ ?>
                            <tr>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->unit_name?></td>
                                <td><?=indo_currency($data->price)?></td>
                                <td><?=$data->stock?></td>
                                <td>
                                    <button class="btn btn-outline btn-sm" style="color:#1c45ef" id="select" 
                                    data-id="<?=$data->item_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-name="<?=$data->name?>"
                                    data-unit="<?=$data->unit_name?>"
                                    data-stock="<?=$data->stock?>">
                                        <i class="mdi mdi-send" ></i>
                                    </button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>




