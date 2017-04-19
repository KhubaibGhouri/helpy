<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Student extends CI_Controller {
    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');


    }


    public function checkUser(){

    }

    public function index(){
        $data = array();
        $data['title'] = 'Sign In';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('includes/header', $data);
        $this->load->view('student/login', $data);
        $this->load->view('includes/footer', $data);
    }


    public function reg(){
        $data['title'] = 'Sign In';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('includes/header', $data);
        $this->load->view('student/reg-provider', $data);
        $this->load->view('includes/footer', $data);
    }

    // Log in user
    public function profile(){

        $data = array();
        $data['title'] = 'Sign In';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');

if($this->session->userdata('user_id')){
    if(!empty($this->student_model->profile($this->session->userdata('user_id')))){
        $data['profile'] = $this->student_model->profile($this->session->userdata('user_id'));
        $data['appointments'] = $this->student_model->appointments($this->session->userdata('user_id'));
        $this->load->view('includes/header', $data);
        $this->load->view('student/profile', $data);
        $this->load->view('includes/footer', $data);
    }else {
        $this->load->helper('student_helper');
        return logout();
    }
}else {
    redirect('student/login');
}



    }


    public function register()
    {
        $data = array();
        $data['title'] = 'Sign Up';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';


        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('includes/header', $data);
            $this->load->view('student/register', $data);
            $this->load->view('includes/footer', $data);
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $user_id = $this->student_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered');

//            echo $user_id;

            if ($user_id) {
                // Create session
                $user_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'useremail' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'phone_number' => $this->input->post('username'),
                    'zip_code' => $this->input->post('zipcode'),
                    'notes' => $this->input->post('notes'),
                    'user_id' => $user_id,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit;

                redirect('student/profile');
            }
        }


    }


    // Log in user
    public function login(){

        $data = array();
        $data['title'] = 'Sign In';
        $data['base_url'] = $this->config->item('base_url');
        $data['company_name'] = $this->settings_model->get_setting('company_name');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('includes/header', $data);
            $this->load->view('student/login', $data);
            $this->load->view('includes/footer', $data);
        } else {

            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));



            // Login user
            $user_id = $this->student_model->login($username, $password);

            if($user_id){
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'useremail' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('student/profile');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('student/login');
            }
        }
    }

    // Log user out
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('useremail');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('student/login');
    }





    // Check if username exists
    public function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
        if($this->student_model->check_username_exists($username)){
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if($this->student_model->check_email_exists($email)){
            return true;
        } else {
            return false;
        }
    }

    
       



}

