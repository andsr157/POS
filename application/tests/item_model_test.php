<?php
class Item_model_test extends TestCase
{
    public function setUp()
    {
        $this->CI = set_controller('welcome');
        $this->CI->load->model('Item_m'); // Sesuaikan dengan nama model yang sesuai
    }

    public function testAddItemSuccess()
    {
        $post = array(
            'barcode' => '123456789',
            'name' => 'Test Item',
            'category_id' => 1,
            'unit_id' => 2,
            'price' => 2000,
        );

        $result = $this->CI->Item_m->add($post);

        $this->assertTrue($result);
    }
}
