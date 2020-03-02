<?php

class Client_model extends CI_Model
{

    //////////////////////////////
    ///      CONSTRUCTOR      ///
    ////////////////////////////

    public function __construct()
    {
        $this->load->database();
    }

    //////////////////////////////
    ///        GETTERS        ///
    ////////////////////////////

    /////////////////
    //  get clients
    //       +
    //   get by id
    /////////////////

    public function get_client($id = null)
    {
        if ($id <= 0 || $id === null) {
            $query = $this->db->get('client');
            return $query->result_array();
        }
        $query = $this->db->get_where('client', array('idClient' => $id));
        return $query->row_array();
    }

    //////////////////////////////
    ////        CREATE        ///
    ///        UPDATE        ///
    ///////////////////////////

    public function set_client($id = 0)
    {
        $data = [
            'nomClient' => $this->input->post('nomClient'),
            'numClient' => $this->input->post('numClient'),
            'emailClient' => $this->input->post('emailClient'),
            'adresseClient' => $this->input->post('adresseClient'),
            'telClient' => $this->input->post('telClient')
        ];

        if ($id <= 0) {
            return $this->db->insert('client', $data);
        } else {
            $this->db->where('idClient', $id);
            return $this->db->update('client', $data);
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function deleteClient($id = 0)
    {
        $succes = $this->db->delete('client', array('idClient' => $id));
        return $succes;
    }
}
