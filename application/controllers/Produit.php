<?php

class Produit extends CI_Controller
{

    //////////////////////////////
    ///      CONSTRUCTOR      ///
    ////////////////////////////

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produit_model');
        $this->load->helper('url_helper');
    }

    ///////////////////////////////
    ////        GETTER         ///
    ///          ALL          ///
    ////////////////////////////

    public function index()
    {
        // cest argument (ici $data) est toujours un tableau
        $data['produit'] = $this->produit_model->get_produit();
        $this->load->view('templates/header');
        $this->load->view('produit/index', $data);
        $this->load->view('templates/footer');
    }

    //////////////////////////////
    ////        GETTER        ///
    ///        SINGLE        ///
    ///////////////////////////

    public function show($id)
    {
        $data['produit'] = $this->produit_model->get_produit($id);
        $this->load->view('templates/header');
        $this->load->view('produit/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomProduit', 'NomProduit', 'required');
        $this->form_validation->set_rules('descriptProduit', 'DescriptProduit', 'required');
        $this->form_validation->set_rules('qttProduit', 'QttProduit', 'required');
        $this->form_validation->set_rules('prixProduit', 'PrixProduit', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('produit/create');
            $this->load->view('templates/footer');
        } else {
            $this->produit_model->set_produit();
            $this->load->view('templates/success');
        }
    }

    //////////////////////////////
    ///        UPDATE         ///
    ////////////////////////////

    public function update($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['produit'] = $this->produit_model->get_produit($id);
        //$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');

        $this->form_validation->set_rules('nomProduit', 'NomProduit', 'required');
        $this->form_validation->set_rules('descriptProduit', 'DescriptProduit', 'required');
        $this->form_validation->set_rules('qttProduit', 'QttProduit', 'required');
        $this->form_validation->set_rules('prixProduit', 'PrixProduit', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('produit/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->produit_model->set_produit($id);
            $this->load->view('templates/success');
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function delete($id)
    {
        $this->produit_model->deleteProduit($id);
        $this->load->view('templates/success');
    }
}
