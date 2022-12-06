<div class="row">
    <div class="col-12">
        <div class="page-header d-flex justify-content-start align-items-center">
            <div class="quick-link-wrapper d-md-flex flex-md-wrap">
                <ul class="quick-links">
                    <li><a href="">Barcode</a></li>
                </ul>
            </div>
        </div>
        <div class="card card-noborder b-radius">
            <div class="card-body">
                <div class="col">
                <?php
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
                    ?>
                    <br>
                    <?=$row->barcode?>
                </div>
        
</div> 
</div>
</div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="page-header d-flex justify-content-start align-items-center">
            <div class="quick-link-wrapper d-md-flex flex-md-wrap">
                <ul class="quick-links">
                    <li><a href="">QRCode</a></li>
                </ul>
            </div>
        </div>
        <div class="card card-noborder b-radius">
            <div class="card-body">
            <div class="col">
                    <?php
                        $qrCode = new Endroid\QrCode\QrCode($row->barcode);
                        $qrCode->writeFile('upload/qrcode/item-'.$row->item_id.'.png');
                    ?>
                    <img src="<?=base_url('upload/qrcode/item-'.$row->item_id.'.png')?>" style= "width:100px">
                    <br>
                    <?=$row->barcode?>
                </div>
        
</div> 
</div>
</div>
</div>

