<?php $no = 1 ;
    if($cart->num_rows() > 0){
        foreach($cart->result() as $c => $data){?>
            <tr>
                <td><?=$no++?></td>
                <td class="barcode"><?=$data->barcode?></td>
                <td><?=$data->item_name?></td>
                <td><?=$data->cart_price?></td>
                <td><?=$data->qty?></td>
                <td><?=$data->discount_item?></td>
                <td id="total"><?=$data->total?></td>
                <td>
                    <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary"  id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                    data-cartid="<?=$data->cart_id?>"
                    data-barcode="<?=$data->barcode?>"
                    data-product="<?=$data->item_name?>"
                    data-price="<?=$data->cart_price?>"
                    data-stock="<?=$data->stock?>"
                    data-qty="<?=$data->qty?>"
                    data-discount="<?=$data->discount_item?>"
                    data-total="<?=$data->total?>">
                            <i class="mdi mdi-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" id=del_cart data-cartid="<?=$data->cart_id?>"  >
                        <i class="mdi mdi-close"></i>
                    </button>
                        
                    
                </td>
            </tr>
        <?php
    }
}else{
        echo'<tr>
        <td colspan="7"class="text-center">Tidak ada item</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>';
}?>