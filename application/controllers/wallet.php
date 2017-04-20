<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class messages extends CI_Controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');

        $this->load->model('wallet_model');
        if($this->session->userdata('user_id')){
        }else {
            redirect('student');
        }
    }


    public function index()
    {

        $data = array();
        $data['title'] = 'Sign In';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');
        $data['messages'] = $this->wallet_model->get_mes();
        $data['messages_sent'] = $this->wallet_model->sent();
        $this->load->view('includes/header', $data);
        $this->load->view('messages/index', $data);
        $this->load->view('includes/footer', $data);

    }

    public function send($id = "") {
        $data = array();
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('includes/header', $data);

        if($id == null){
            redirect('messages');
        }else {
            $data['profile'] = $this->student_model->profile($id);
            $this->form_validation->set_rules('message', 'Type Message', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('messages/to', $data);
            }else {
                if( $this->wallet_model->send_now($this->session->userdata('user_id'), $id)){
                    redirect('messages');
                }
            }
        }
        $this->load->view('includes/footer', $data);
    }


    public function all()
    {
        $data = array();
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');


        $data['messages_sent'] = $this->wallet_model->all_sent();
        $data['messages'] = $this->wallet_model->all_rec();

        $this->load->view('includes/header', $data);
        $this->load->view('messages/all', $data);
        $this->load->view('includes/footer', $data);

    }


}








