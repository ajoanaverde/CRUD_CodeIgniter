<?php

class Commande extends CI_Controller
{

    //////////////////////////////
    ///      CONSTRUCTOR      ///
    ////////////////////////////

    public function __construct()
    {
        parent::__construct();
        $this->load->model('commande_model');
        $this->load->helper('url_helper');
    }

    ///////////////////////////////
    ////        GETTER         ///
    ///          ALL          ///
    ////////////////////////////

    public function index()
    {
        // cest argument (ici $data) est toujours un tableau
        $data['commande'] = $this->commande_model->get_commande();
        $this->load->view('templates/header');
        $this->load->view('commande/index', $data);
        $this->load->view('templates/footer');
        
    }

    //////////////////////////////
    ////        GETTER        ///
    ///        SINGLE        ///
    ///////////////////////////

    public function show($id = null)
    {
        $data['commande'] = $this->commande_model->get_commande($id);
        
        $this->load->view('templates/header');
        $this->load->view('commande/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('numeroCommande', 'numeroCommande', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('commande/create');
            $this->load->view('templates/footer');
        } else {
            $this->commande_model->set_commande();
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

        $data['commande'] = $this->commande_model->get_commande($id);
        
        $this->form_validation->set_rules('numeroCommande', 'numeroCommande', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('commande/update', $data);
            $this->load->view('templates/footer');
        }else{
            $this->commande_model->set_commande($id);
            $this->load->view('templates/success');
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function delete($id)
    {
        $this->commande_model->deleteCommande($id);
        $this->load->view('templates/success');
    }
}
