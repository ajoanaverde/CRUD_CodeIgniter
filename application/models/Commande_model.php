<?php

class Commande_model extends CI_Model
{

    //////////////////////////////
    ///      CONSTRUCTOR      ///
    ////////////////////////////

    public function __construct()
    {

        $this->load->database();
        // relationships
        // $this->commande->related('client', array('idClient', 'id'));
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
            // echo "invalid id";
            $query = $this->db->get('commande');
            return $query->result_array();
        }
        // echo "valid";
        // $this->db->get_where('commande', array('idCommande' => $id));
        // jointures 
        $this->db->select('
            commande.*,
            client.nomClient, 
            client.numClient,
            ');
        $this->db->from('commande');
        $this->db->join('client', 'client.idClient = commande.fk_idClient');
        $this->db->where('commande.idCommande', $id);
        $query = $this->db->get();

        // var_dump(($query));
        return $query->row_array();
    }

    //////////////////////////////
    ///        Joins          ///
    ////////////////////////////

    /////////////////
    //  nom Client
    //       +
    //  num Client
    /////////////////

    // public function get_client()
    // {

    //     return $query;
    // }


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
