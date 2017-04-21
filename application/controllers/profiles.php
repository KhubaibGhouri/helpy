<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class profiles extends CI_Controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');

    }

    public function index()
    {
        $data = array();
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');

        $this->load->model('profiles_model');




        $data['teachers'] = $this->profiles_model->teachers();
        $data['students'] = $this->profiles_model->students();

        $this->load->view('includes/header', $data);
        $this->load->view('profiles/index', $data);
        $this->load->view('includes/footer', $data);
    }
}








