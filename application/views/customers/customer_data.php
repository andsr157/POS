

<div class="row">
  <div class="col-md-12 grid-margin">
  <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Customer</h4>
      <div class="d-flex justify-content-start">
	      <a href="<?=base_url('customer/add')?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
	      	<i class="mdi mdi-plus"></i>
	      </a>
      </div>
    </div>
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
        	<div class="col-12 table-responsive">
                
                <table class="table table-custom">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>No.Hp</th> 
                    <th>Alamat</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td>    
                            <img src="http://localhost/ipos/public/pictures/default.jpg">
                            <span class="ml-2"><?= $data->name?></span>
                        </td>
                        <td><?=$data->gender?></td>
                        <td><?= $data->phone?></td>
                        <td><?= $data->address?></td>
                        
                        <td>
                            <a href="<?=base_url('customer/edit/'.$data->customer_id)?>">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                            </a>
                            <!-- <input type="hidden" name="customer_id" value="<?=$data->id?>">
                            <button onclick= "return confirm('Apakah anda yakin?')" class="btn btn-icons btn-rounded btn-secondary ml-1 btn-delete">
                                <i class="mdi mdi-close"></i> -->
                            <a href="<?=base_url('customer/del/'.$data->customer_id)?>">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" onclick= "return confirm('Apakah anda yakin?')"  data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </a>
                        </button>
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