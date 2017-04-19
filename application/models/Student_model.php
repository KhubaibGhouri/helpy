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
            $this->db->where('user_name', $username);
            $this->db->where('user_password', $password);

            $result = $this->db->get('students');
            if($result->num_rows() == 1){
                return $result->row(0)->user_id;
            } else {
                return false;
            }
        }

        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('students', array('user_name' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('students', array('user_email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        public function profile($id){
            $query = $this->db->get_where('students', array('user_id' => $id))->row();
            if(!empty($query)){
                return $query;
            } else {
                return false;
            }

        }
    }