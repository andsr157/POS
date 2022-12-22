<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="page-title">Report Penjualan</h4>
            <div class="d-flex justify-content-start">
               
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
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Diskon</th>
                                    <th>Final total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->invoice ?></td>
                                        <td><?= indo_date($data->date) ?></td>
                                        <td><?= $data->customer_id == null ? "Umum" : $data->customer_name ?></td>
                                        <td><?= $data->total_price ?></td>
                                        <td><?= $data->discount ?></td>
                                        <td><?= $data->final_price ?></td>
                                        <td>
                                            <button type="button" id="detail-report" class="btn btn-edit btn-icons btn-rounded btn-success"  data-toggle="modal" 
                                            data-target="#modal-report" data-edit="1"
                                            data-invoice="<?=$data->invoice?>"
                                            data-date="<?=$data->date?>"
                                            data-time="<?=substr($data->sale_created, 11, 5)?>"
                                            data-customer="<?=$data->customer_id = null ? "Umum" : $data->customer_name?>"
                                            data-total="<?=indo_currency($data->total_price)?>"
                                            data-discount="<?=indo_currency($data->discount)?>"
                                            data-grandtotal="<?=indo_currency($data->final_price)?>"
                                            data-cash="<?=indo_currency($data->cash)?>"
                                            data-remaining="<?=indo_currency($data->remaining)?>"
                                            data-note="<?=$data->note?>"
                                            data-cashier="<?=$data->user_name?>"
                                            data-saleid="<?=$data->sale_id?>">
                                                <i class="mdi mdi-eye "></i>
                                            </button>

                                            <a href="<?= base_url('sale/cetak/'. $data->sale_id) ?>">
                                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" target="_blank" data-toggle="modal" data-edit="1">
                                                    <i class="mdi mdi-note"></i>
                                                </button>
                                            </a>

                                            <a href="<?= base_url('sale/del/' . $data->sale_id) ?>">
                                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-danger" onclick="return confirm('Apakah anda yakin?')" data-toggle="modal" data-edit="1">
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




<div class="modal fade" id="modal-report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tableModalLabel">Detail Report Penjualan</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-custom" id="table1">
                        <tbody>
                            <tr>
                                <th style="width:30%;">invoice</th>
                                <td><span id='invoice'></span></td>
                                <th style="width:30%;">customer</th>
                                <td><span id='cust'></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><span id='datetime'></span></td>
                                <th>Kasir</th>
                                <td><span id='cashier'></span></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><span id='total'></span></td>
                                <th>Cash</th>
                                <td><span id='cash'></span></td>
                            </tr>
                            <tr>
                                <th>Diskon</th>
                                <td><span id='discount'></span></td>
                                <th>Kembalian</th>
                                <td><span id='change'></span></td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td><span id='grandtotal'></span></td>
                                <th>Note</th>
                                <td><span id='note'></span></td>
                            </tr>
                            <tr>
                                <th>Barang</th>
                                <td colspan="3"><span id='product'></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
