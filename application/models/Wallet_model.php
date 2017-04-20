<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Wallet_model extends CI_Model
{
    public function send_now($mes_by, $mes_to)
    {
        $data = array(
            'mes_by' => $mes_by,
            'mes_to' => $mes_to,
            'mes_messages' => $this->input->post('message')
        );
        if($this->db->insert('messages', $data)) {
            return true;
        }else {
            return false;
        }
    }

    public function get_mes()
    {
        $resultz = $this->db->query( "SELECT * FROM messages as mes LEFT JOIN  ea_users u on  mes.mes_to = u.id WHERE mes.mes_by = ". $this->session->userdata('user_id'));

        if ($resultz->num_rows() > 0) {
            return $resultz->result_array();
        } else {
            return false;
        }
    }


    public function sent()
    {
        $results =  $this->db->query( "SELECT * FROM messages as mes LEFT JOIN  ea_users u on  mes.mes_by= u.id WHERE mes.mes_to = ". $this->session->userdata('user_id'));
        if ($results->num_rows() > 0) {
            return $results->result_array();
        } else {
            return false;
        }

    }




    public function all_sent()
    {
        $results =  $this->db->query("SELECT * FROM messages as mes LEFT JOIN  ea_users u on  mes.mes_by= u.id");
        if ($results->num_rows() > 0) {
            return $results->result_array();
        } else {
            return false;
        }

    }

    public function all_rec()
    {
        $results =  $this->db->query("SELECT * FROM messages as mes LEFT JOIN  ea_users u on  mes.mes_to= u.id");
        if ($results->num_rows() > 0) {
            return $results->result_array();
        } else {
            return false;
        }

    }
}