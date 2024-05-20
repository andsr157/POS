<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col">
        <h4>Cetak laporan Penjualan</h4>
    </div>
    <div class="row pt-4">
        <div class="col card card-noborder b-radius">
            <form action="<?= base_url('report/filter') ?>" method="POST" target="_blank">
                <div class="col p-3">
                    <h5>Filter by Tanggal</h5>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="nilaifilter" value="1">
                    <label class="col-12 font-weight-bold col-form-label">Tanggal Awal</label>
                    <div class="col-12">
                        <input type="date" class="form-control" name="tanggalawal" value="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Tanggal Akhir</label>
                    <div class="col-12">
                        <input type="date" class="form-control" name="tanggalakhir" value="" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end ">
                        <button style="background-color:#1c45ef; color:white" value="Print" name="" class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col card card-noborder b-radius ">
            <form action="<?= base_url('report/filter') ?>" method="POST" target="_blank">
                <div class="col p-3">
                    <h5>Filter by Bulan</h5>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="nilaifilter" value="2">
                    <label class="col-12 font-weight-bold col-form-label">Pilih Tahun</label>
                    <div class="col-12">
                        <select name="tahun1" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($tahun as $row) : ?>
                                <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Bulan Awal</label>
                    <div class="col-12">
                        <select name="bulanawal" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">July</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value=10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 font-weight-bold col-form-label">Bulan Akhir</label>
                    <div class="col-12">
                        <select name="bulanakhir" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">July</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value=10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end ">
                        <button style="background-color:#1c45ef; color:white" value="Print" name="" class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col card card-noborder b-radius ">
            <form action="<?= base_url('report/filter') ?>" method="POST" target="_blank">
                <div class="col p-3">
                    <h5>Filter by Tahun</h5>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="nilaifilter" value="3">
                    <label class="col-12 font-weight-bold col-form-label">Pilih Tahun</label>
                    <div class="col-12">
                        <select name="tahun2" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($tahun as $row) : ?>
                                <option value="<?= $row->tahun ?>"><?= $row->tahun ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-end ">
                        <button style="background-color:#1c45ef; color:white" value="Print" name="" class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>