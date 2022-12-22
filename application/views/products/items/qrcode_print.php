<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qrcode Product <?= $row->barcode ?></title>
</head>

<body>
    <img src='<?=base_url()?>upload/qrcode/item-<?=$row->barcode?>.png' style= "width:100px">
</body>

</html>