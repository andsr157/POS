

<div class="row">
  <div class="col-md-12 grid-margin">
  <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Unit kesatuan Barang</h4>
      <div class="d-flex justify-content-start">
	      <a href="<?=base_url('unit/add')?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
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
                    <th>nama</th>
                    <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td>    
                            <span class="ml-2"><?= $data->name?></span>
                        </td>
                        

                        <td>
                            <a href="<?=base_url('unit/edit/'.$data->unit_id)?>">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                            </a>

                            <a href="<?=base_url('unit/del/'.$data->unit_id)?>">
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