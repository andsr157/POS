<?php defined('BASEPATH') or exit('no direct script access allowed');

class Test extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('item_m');
    }

    public function run_all_test()
    {
        $this->test_add_product();
        $this->test_user_logged_in_and_not_logged_in_sessions();
    }

    public function test_add_product()
    {
        $post = array(
            'barcode' => '123456789',
            'name' => 'Test Item',
            'category' => 1,
            'unit' => 2,
            'price' => 2000,
        );

        $test = $this->item_m->add($post);
        $expected_result = true;
        $testname = 'Test for adding product item';

        echo $this->unit->run($test, $expected_result, $testname);
    }

    public function test_user_logged_in_and_not_logged_in_sessions()
    {
        $this->session->unset_userdata('user_id');
        $is_user_logged_in = $this->session->userdata('user_id');
        $expected_result_1 = false;
        $test_name_1 = 'Test for user not logged in';

        echo $this->unit->run($is_user_logged_in, $expected_result_1, $test_name_1);


        $user_id = 123;
        $this->session->set_userdata('user_id', $user_id);
        $is_user_logged_in_after_login = $this->session->userdata('user_id');
        $expected_result_2 = true;
        $test_name_2 = 'Test for user logged in';

        echo $this->unit->run($is_user_logged_in_after_login, $expected_result_2, $test_name_2);
    }
}
  