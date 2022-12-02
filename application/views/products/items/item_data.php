

<div class="row">
  <div class="col-md-12 grid-margin">
  <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Data Barang</h4>
      <div class="d-flex justify-content-start">
	      <a href="<?=base_url('item/add')?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
	      	<i class="mdi mdi-plus"></i>
	      </a>
      </div>
    </div>
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
        	<div class="col-12 table-responsive">
                
                <table class="table table-custom" id="table1">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Unit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th></th>
                   
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td>    
                            <span class="ml-2"><?= $data->barcode?></span><br>
                            <a href="<?=base_url('item/barcode_qrcode/'.$data->item_id)?>">
                                <button type="button" class="btn btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                                Generate<i class="mdi"></i>
                                </button>
                            </a>
                        </td>
                        <td>    
                            <span class="ml-2"><?= $data->name?></span>
                        </td>
                        <td>    
                            <span class="ml-2"><?= $data->category_name?></span>
                        </td>
                        <td>    
                            <span class="ml-2"><?= $data->unit_name?></span>
                        </td>
                        <td>    
                            <span class="ml-2"><?= $data->price?></span>
                        </td>
                        <td>    
                            <span class="ml-2"><?= $data->stock?></span>
                        </td>
                        
                        <td>
                            <a href="<?=base_url('item/edit/'.$data->item_id)?>">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                            </a>

                            <a href="<?=base_url('item/del/'.$data->item_id)?>">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" onclick= "return confirm('Apakah anda yakin?')"  data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
                </table>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>