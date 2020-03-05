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
        $this->load->model('client_model');
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
        // cest argument (ici $data) est toujours un tableau
        $data['commande'] = $this->commande_model->get_commande();
        $data['title'] = 'Commandes';
        $this->load->view('templates/header', $data);
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
        $data['title'] = 'Detail commande';
        $this->load->view('templates/header', $data);
        $this->load->view('commande/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        // get client (pour dire à quel client appartient la commande)
        $data['client'] = $this->client_model->get_client();
        //form rules
        $this->form_validation->set_rules('numeroCommande', 'numeroCommande', 'required');
        $this->form_validation->set_rules('numClient', 'NumClient', 'required');
        // form rulles
        if ($this->form_validation->run() == false) {
            // titre
            $data['title'] = 'Nouvelle commande';
            // views
            $this->load->view('templates/header', $data);
            $this->load->view('commande/create', $data);
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
        // load la info à changer
        $data['commande'] = $this->commande_model->get_commande($id);
        // form rules
        $this->form_validation->set_rules('numeroCommande', 'numeroCommande', 'required');
        // form run
        if ($this->form_validation->run() == FALSE) {
            // titre
            $data['title'] = 'Changer commande';
            //views
            $this->load->view('templates/header', $data);
            $this->load->view('commande/update', $data);
            $this->load->view('templates/footer');
        } else {
            //update
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
