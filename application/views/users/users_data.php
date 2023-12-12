<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="page-header d-flex justify-content-between align-items-center">
      <h4 class="page-title">Daftar Akun</h4>
      <div class="d-flex justify-content-start">
        <a href="<?= base_url('users/add') ?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
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
                  <th>Username</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($row->result() as $key => $data) { ?>
                  <tr>
                    <td>
                      <?= $data->nama ?>
                    </td>
                    <td><?= $data->username ?></td>
                    <td><?= $data->email ?></td>
                    <td>
                      <span class="btn <?= $data->level == 1 ? 'admin-span' : 'kasir-span' ?>"><?= $data->level == 1 ? "admin" : "Kasir" ?></span>
                    </td>
                    <form action="<?= base_url('users/del') ?>" method="POST">
                      <td>
                        <a href="<?= base_url('users/edit/' . $data->id) ?>">
                          <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                            <i class="mdi mdi-pencil"></i>
                          </button>
                        </a>
                        <input type="hidden" name="user_id" value="<?= $data->id ?>">
                        <a href="<?= base_url('users/del/' . $data->id) ?>" data-target="#del_alert">
                          <button class="btn btn-icons btn-rounded btn-secondary ml-1 btn-delete">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </a>

                    </form>
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