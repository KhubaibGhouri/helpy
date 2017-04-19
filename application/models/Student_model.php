<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

	class Student_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'user_full_name' => $this->input->post('name'),
                'user_email' => $this->input->post('email'),
                'user_name' => $this->input->post('username'),
                'user_password	' => $enc_password,
                'user_zipcode' => $this->input->post('zipcode')
            );

            // Insert user
            return $this->db->insert('students', $data);
        }

        // Log user in
        public function login($username, $password){
            // Validate
            $this->db->where('email', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('ea_users');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            } else {
                return false;
            }
        }

        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('ea_users', array('email' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('ea_users', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        public function profile($id){
            $query = $this->db->get_where('ea_users', array('id' => $id))->row();

//            echo $this->db->last_query();
//            exit;
            if(!empty($query)){

                return $query;
            } else {
                return false;
            }

        }

        public function appointments($id){
            $query = "SELECT * FROM `ea_appointments`  LEFT JOIN `ea_users` on ea_users.id = ea_appointments.id_users_provider WHERE `id_users_customer` =".$id;
            return $result = $this->db->query($query)->result();
        }

    }