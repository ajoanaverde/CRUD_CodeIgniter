<?php

class Client extends CI_Controller
{

    //////////////////////////////
    ///      CONSTRUCTOR      ///
    ////////////////////////////

    public function __construct()
    {
        parent::__construct();
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
        if(!$this->session->userdata('logged_in'))
        {
            $this->session->set_flashdata('access_denied', 'You need to login to do that');
            redirect('user/login');
        }
        ////////////////////////////////////////////
        // cest argument (ici $data) est toujours un tableau
        $data['client'] = $this->client_model->get_client();
        $data['title'] = 'Clients';
        $this->load->view('templates/header', $data);
        $this->load->view('client/index', $data);
        $this->load->view('templates/footer');
    }

    //////////////////////////////
    ////        GETTER        ///
    ///        SINGLE        ///
    ///////////////////////////

    public function show($id)
    {
        $data['client'] = $this->client_model->get_client($id);
        $data['title'] = 'Detail client';
        $this->load->view('templates/header', $data);
        $this->load->view('client/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        // form rules
        $this->form_validation->set_rules('nomClient', 'NomClient', 'required');
        $this->form_validation->set_rules('numClient', 'NumClient', 'required');
        $this->form_validation->set_rules('emailClient', 'EmailClient', 'required');
        $this->form_validation->set_rules('adresseClient', 'AdresseClient', 'required');
        $this->form_validation->set_rules('telClient', 'TelClient', 'required');
        // form run
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Nouveau client';
            $this->load->view('templates/header', $data);
            $this->load->view('client/create');
            $this->load->view('templates/footer');
        } else {
            $this->client_model->set_client();
            redirect('client/index');
        }
    }

    //////////////////////////////
    ///        UPDATE         ///
    ////////////////////////////

    public function update($id)
    {
        // load la data à actualiser
        $data['client'] = $this->client_model->get_client($id);
        //form rules
        $this->form_validation->set_rules('nomClient', 'Nom Client', 'required');
        $this->form_validation->set_rules('numClient', 'Num Client', 'required');
        $this->form_validation->set_rules('emailClient', 'Email Client', 'required');
        $this->form_validation->set_rules('adresseClient', 'Adresse Client', 'required');
        $this->form_validation->set_rules('telClient', 'Tel Client', 'required');
        //form run
        if ($this->form_validation->run() === FALSE) {
            // titre
            $data['title'] = 'Update client';
            $this->load->view('templates/header', $data);
            $this->load->view('client/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->client_model->set_client($id);
            redirect('client/show/', $id);
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function delete($id)
    {
        $this->client_model->deleteClient($id);

        redirect('client/index');
    }
}
