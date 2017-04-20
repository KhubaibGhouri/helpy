<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

	class Student_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'phone_number' => $this->input->post('phone_number'),
                'password	' => $enc_password,
                'zip_code' => $this->input->post('zipcode'),
                'id_roles' => '3',
                'notes' => $this->input->post('notes')
            );

            // Insert user
            if($this->db->insert('ea_users', $data)) {


                $this->db->where('email', $this->input->post('email'));
                $this->db->where('password', $enc_password);

                $result = $this->db->get('ea_users');


                if ($result->num_rows() == 1) {
                    return $result->row(0)->id;
                } else {
                    return false;
                }
            }else {
                return false;
            }
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