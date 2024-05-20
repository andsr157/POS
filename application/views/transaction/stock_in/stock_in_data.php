<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="page-title">Histori stock in Barang</h4>
            <div class="d-flex justify-content-start">
                <a href="<?= base_url('stock/in/add') ?>" class="btn btn-icons btn-inverse-primary btn-new ml-2">
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
                                    <th>Barang </th>
                                    <th>Qty </th>
                                    <th>Tanggal </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <span class="ml-2"><?= $data->barcode ?></span>
                                        </td>
                                        <td>
                                            <span class="ml-2"><?= $data->item_name ?></span>
                                        </td>
                                        <td>
                                            <span class="ml-2"><?= $data->qty ?></span>
                                        </td>
                                        <td>
                                            <span class="ml-2"><?= indo_date($data->date) ?></span>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-target="#modal-detail" id="dtl_set" data-barcode="<?= $data->barcode ?>" data-itemname="<?= $data->item_name ?>" data-detail="<?= $data->detail ?>" data-suppliername="<?= $data->supplier_name ?>" data-qty="<?= $data->qty ?>" data-date="<?= indo_date($data->date) ?>">

                                                <i class="mdi mdi-eye"></i>
                                            </button>


                                            <a href="#" onclick="confirmDelete('<?= base_url('stock/in/del/' . $data->stock_id . '/' . $data->item_id) ?>')">
                                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
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


<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
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
                        <tbody>
                            <tr>
                                <th style="width:30%;">Barcode</th>
                                <td><span id='barcode'></span></td>
                            </tr>
                            <tr>
                                <th>Barang</th>
                                <td><span id='item_name'></span></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><span id='detail'></span></td>
                            </tr>
                            <tr>
                                <th>Supplier</th>
                                <td><span id='supplier_name'></span></td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td><span id='qty'></span></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><span id='date'></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data akan dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1026de',
            cancelButtonColor: '#E01633',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>