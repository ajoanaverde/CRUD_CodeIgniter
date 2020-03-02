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
    }

    ///////////////////////////////
    ////        GETTER         ///
    ///          ALL          ///
    ////////////////////////////

    public function index()
    {
        // cest argument (ici $data) est toujours un tableau
        $data['client'] = $this->client_model->get_client();
        $this->load->view('templates/header');
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
        $this->load->view('templates/header');
        $this->load->view('client/show', $data);
        $this->load->view('templates/footer');
    }

    /////////////////////////////
    ////        CREATE       ///
    ///////////////////////////

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nomClient', 'NomClient', 'required');
        $this->form_validation->set_rules('numClient', 'NumClient', 'required');
        $this->form_validation->set_rules('emailClient', 'EmailClient', 'required');
        $this->form_validation->set_rules('adresseClient', 'AdresseClient', 'required');
        $this->form_validation->set_rules('telClient', 'TelClient', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header');
            $this->load->view('client/create');
            $this->load->view('templates/footer');
        } else {
            $this->client_model->set_client();
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
        $data['title'] = 'Mise a jour';
        $data['client'] = $this->client_model->get_client($id);
        //$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nomClient', 'Nom Client', 'required');
        $this->form_validation->set_rules('numClient', 'Num Client', 'required');
        $this->form_validation->set_rules('emailClient', 'Email Client', 'required');
        $this->form_validation->set_rules('adresseClient', 'Adresse Client', 'required');
        $this->form_validation->set_rules('telClient', 'Tel Client', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('client/update', $data);
            $this->load->view('templates/footer');
        }else{
            $this->client_model->set_client($id);
            $this->load->view('templates/success');
        }
    }

    //////////////////////////////
    ///        DELETE         ///
    ////////////////////////////

    public function delete($id)
    {
        $this->client_model->deleteClient($id);
        $this->load->view('templates/success');
    }
}
