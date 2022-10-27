

<div class="row">
  <div class="col-md-12 grid-margin">
  <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Daftar Akun</h4>
      <div class="d-flex justify-content-start">
      	<div class="dropdown">
	        <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="mdi mdi-filter-variant"></i>
	        </button>
	        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
	          <h6 class="dropdown-header">Urut Berdasarkan :</h6>
	          <div class="dropdown-divider"></div>
	          <a href="#" class="dropdown-item filter-btn" data-filter="nama">Nama</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="email">Email</a>
            <a href="#" class="dropdown-item filter-btn" data-filter="role">Posisi</a>
	        </div>
	      </div>
        <div class="dropdown dropdown-search">
          <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm ml-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-magnify"></i>
          </button>
          <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
            <div class="row">
              <div class="col-11">
                <input type="text" class="form-control" name="search" placeholder="Cari akun">
              </div>
            </div>
          </div>
        </div>
	      <a href="<?=base_url('users/add')?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td>
                            <img src="http://localhost/ipos/public/pictures/default.jpg">
                            <span class="ml-2"><?= $data->nama?></span>
                        </td>
                        <td><?= $data->email?></td>
                        <td>
                            <span class=""><?= $data->level == 1 ? "admin" : "Kasir"?></span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-target="#editModal" data-edit="1">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" data-delete="1" class="btn btn-icons btn-rounded btn-secondary ml-1 btn-delete">
                                <i class="mdi mdi-close"></i>
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