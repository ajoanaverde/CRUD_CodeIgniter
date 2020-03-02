<?php

class Produit_model extends CI_Model
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
    //  get produits
    //       +
    //   get by id
    /////////////////

    public function get_produit($id = null)
    {
        if ($id <= 0 || $id === null) {
            $query = $this->db->get('produit');
            return $query->result_array();
        }
        $query = $this->db->get_where('produit', array('idProduit' => $id));
        return $query->row_array();
    }

    //////////////////////////////
    ////        CREATE        ///
    ///        UPDATE        ///
    ///////////////////////////

    public function set_produit($id = 0)
    {
        $data = [
            'nomProduit' => $this->input->post('nomProduit'),
            'descriptProduit' => $this->input->post('descriptProduit'),
            'qttProduit' => $this->input->post('qttProduit'),
            'prixProduit' => $this->input->post('prixProduit')
        ];

        if ($id <= 0) {
            return $this->db->insert('produit', $data);
        } else {
            $this->db->where('idProduit', $id);
            return $this->db->update('produit', $data);
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function deleteProduit($id = 0)
    {
        $succes = $this->db->delete('produit', array('idProduit' => $id));
        return $succes;
    }
}
