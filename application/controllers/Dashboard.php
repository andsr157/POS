<?php defined('BASEPATH') or exit('no direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        check_not_login();
        $data['weekly_incomes'] = $this->dailyIncomes();
        $this->template->load('template', 'dashboard', $data);
    }

    private function dailyIncomes()
    {
        $this->load->database();

        // Mendapatkan tanggal 7 hari terakhir
        $seven_days_ago = date('Y-m-d', strtotime('-6 days'));

        $query = $this->db
            ->select('date, SUM(final_price) as total_final_price')
            ->from('t_sale')
            ->where('date >=', $seven_days_ago)
            ->where('date <=', date('Y-m-d'))
            ->group_by('date')
            ->get();

        return $query->result();
    }
}
