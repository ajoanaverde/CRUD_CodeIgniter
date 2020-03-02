<?php

class Commande_model extends CI_Model
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
    //  get commandes
    //       +
    //   get by id
    /////////////////

    public function get_commande($id = null)
    {
        if ($id <= 0 || $id === null) {
            $query = $this->db->get('commande');
            return $query->result_array();
        }
        $query = $this->db->get_where('commande', array('idCommande' => $id));
        return $query->row_array();
    }

    //////////////////////////////
    ////        CREATE        ///
    ///        UPDATE        ///
    ///////////////////////////

    public function set_commande($id = 0)
    {
        $data = [
            'numeroCommande' => $this->input->post('numeroCommande'),
        ];

        if ($id <= 0) {
            return $this->db->insert('commande', $data);
        } else {
            $this->db->where('idCommande', $id);
            return $this->db->update('commande', $data);
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function deleteCommande($id = 0)
    {
        $succes = $this->db->delete('commande', array('idCommande' => $id));
        return $succes;
    }
}
