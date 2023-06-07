<div class="content-wrapper" id="content-web-page">
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header d-flex justify-content-start align-items-center">
                <h4 class="page-title">Daftar Barang</h4>
            </div>
        </div>
    </div>


    <input type="hidden" name="_token" value="Eu5W5sgaNZ7QrWr2SCHgpp4qq6afmaLVOLAF4h19">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
            <div class="row">
                <!-- barcode -->
                <div class="col-12 col-sm-6 mb-4 bg-dark-blue">
                    <div class="card card-noborder b-radius ">
                        <div class="card-body  ">

                            <div class="col-12 d-flex justify-content-between align-items-center transaction-header">

                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="transaction-code ">
                                        <input type="text" id="item_id">
                                        <input type="text" id="price">
                                        <input type="text" id="stock">
                                        <input type="text" id="qty_cart">
                                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="">
                                    </div>
                                </div>
                                <div class="btn-group mt-h">

                                    <button class="btn btn-search" data-toggle="modal" data-target="#modal-item-sale" type="button">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 d-flex mt-3 ">
                                <div class="d-flex justify-content-start align-items-center">

                                    <input type="number" id="qty" class="form-control" name="nama" placeholder="Masukan Jumlah" value="1">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-search" id="add_cart" type="button">
                                    <i class="mdi mdi-cart-outline"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- invoice -->
                <div class="col-12 col-sm-6 mb-4 ">
                    <div class="card card-noborder b-radius">
                        <div class="card-body">
                            <div align="right">
                                <h4>Invoice <b><span id=invoice><?= $invoice ?></span></b></h4>
                                <h1><b><span id="grand_total2" style="font-size:50pt; color:#19d895;">0</span></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- daftar pesanan -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-noborder b-radius">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-start align-items-center">
                                    <div class="cart-icon mr-3">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </div>
                                    <p class="m-0 text-black-50">Daftar Pesanan</p>
                                </div>
                                <div class="col-12 mt-3 table-responsive">
                                    <table class="table table-checkout " id="table2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Barcode</th>
                                                <th>Barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Diskon</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="cart_table">
                                            <?php $this->view('transaction/sale/cart_data'); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of daftar pesanan -->
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-noborder b-radius">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 bg-dark-blue">
                            <table class="table-payment-1">
                                <tr>
                                    <td class="text-left"><b>Tanggal</b></td>
                                    <td class="text-right">
                                        <input type="date" id="date" class="form-control text-right" name="date" placeholder="" value="<?= date('Y-m-d') ?>" style="background-color:#ffff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Kasir</td>
                                    <td class="text-right">
                                        <input type="text" class="form-control text-right px-4" name="kasir" placeholder="Amad" value="<?= $this->lvalidasi->user_login()->nama ?>" style="background-color:#ffff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Customer</td>
                                    <td>
                                        <div>
                                            <select id="customer" class="form-control">
                                                <option class="text-right" value="">Umum</option>
                                                <?php foreach ($customer as $cust => $data) { ?>
                                                    <option value="<?= $data->customer_id ?>"><?= $data->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 payment-1 mt-4" style="background-color: transparent;">
                            <table class="table-payment-1">
                                <tr>
                                    <td class="text-left">Sub Total</td>
                                    <td class="text-right">
                                        <input type="text" class="form-control text-right px-4" id="sub_total" placeholder="Amad" value="" style="background-color:#ffff;" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Diskon</td>
                                    <td class="text-right">
                                        <input type="number" class="form-control text-right px-4" id="discount" placeholder="0" value="" style="background-color:#ffff;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input style="background-color:white; " type="number" class="form-control text-center" id="grand_total" placeholder="0" value="" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 mt-2">
                            <table class="table-payment-3">
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" id="cash" class="form-control number-input input-notzero bayar-input" name="bayar" placeholder="Masukkan nominal bayar">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" id="change" class="form-control number-input input-notzero bayar-input" name="bayar" placeholder="Kembalian" readonly>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="left">
                                        <button id="cancel_payment" class="btn btn-danger" type="button">Cancel</button>
                                    </td>
                                    <td class="text-right">
                                        <button id="process_payment" class="btn btn-bayar" type="button">Bayar</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-noborder b-radius mt-3">
                <div class="card-body">
                    <table width=100%>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note" rows="4" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal add product -->
<div class="modal fade" id="modal-item-sale">
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
                            <?php foreach ($item as $key => $data) { ?>
                                <tr>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->unit_name ?></td>
                                    <td><?= indo_currency($data->price) ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <button class="btn btn-outline btn-sm" style="color:#1c45ef" id="sale_s" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-price="<?= $data->price ?>" data-stock="<?= $data->stock ?>">

                                            <i class="mdi mdi-send"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- modal edit product -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog" style="max-width: 360px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tableModalLabel">Update Item/Barang</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_item">
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Barang <span class="text-danger">*</span></label>
                    <div class="col-5">
                        <input type="text" class="form-control" id="barcode_item" value="" readonly>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" id="product_item" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Harga <span class="text-danger">*</span></label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="price_item" min="0" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-7 px-0">
                        <label class="col-12 font-weight-bold col-form-label">Qty <span class="text-danger">*</span></label>
                        <div class="col-12">
                            <input type="number" class="form-control" id="qty_item" min="1" value="">
                        </div>
                    </div>
                    <div class="col-md-5 px-0">
                        <label class="col-12 font-weight-bold col-form-label">Stock <span class="text-danger">*</span></label>
                        <div class="col-12">
                            <input type="number" class="form-control" id="stock_item" value="" readonly>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Total Sebelum Diskon<span class="text-danger">*</span></label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="total_before" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Diskon<span class="text-danger">*(per item)</span></label>
                    <div class="col-12">
                        <input type="number" class="form-control" id="discount_item" min="0" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Total Setelah diskon<span class="text-danger">*</span></label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="total_item" value="" readonly>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-end ">
                        <button style="background-color:#1c45ef; color:white" id="edit_cart" class="btn simpan-btn btn-sm">
                            <i class="mdi mdi-content-save"></i> Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>