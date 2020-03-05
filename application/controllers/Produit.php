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
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    ///////////////////////////////
    ////        GETTER         ///
    ///          ALL          ///
    ////////////////////////////

    public function index()
    {
        ////////////////////////////////////////////
        // check login
        ////////////////////////////////////////////
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('access_denied', 'You need to login to do that');
            redirect('user/login');
        }
        ////////////////////////////////////////////
        $data['produit'] = $this->produit_model->get_produit();
        $data['title'] = 'Produits';
        $this->load->view('templates/header', $data);
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
        $data['title'] = 'Detail des clients';
        $this->load->view('templates/header', $data);
        $this->load->view('produit/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        // form rules
        $this->form_validation->set_rules('nomProduit', 'NomProduit', 'required');
        $this->form_validation->set_rules('descriptProduit', 'DescriptProduit', 'required');
        $this->form_validation->set_rules('qttProduit', 'QttProduit', 'required');
        $this->form_validation->set_rules('prixProduit', 'PrixProduit', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ajouter produit';
            $this->load->view('templates/header', $data);
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
        $data['produit'] = $this->produit_model->get_produit($id);

        $this->form_validation->set_rules('nomProduit', 'NomProduit', 'required');
        $this->form_validation->set_rules('descriptProduit', 'DescriptProduit', 'required');
        $this->form_validation->set_rules('qttProduit', 'QttProduit', 'required');
        $this->form_validation->set_rules('prixProduit', 'PrixProduit', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Actualiser produit';
            $this->load->view('templates/header', $data);
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
