<?php

class User extends CI_Controller
{

    ////////////////
    // controller
    ////////////////

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    ////////////////
    // registrer
    ////////////////

    public function register()
    {
        //formulaire
        $this->form_validation->set_rules('emailUser', 'Email', 'required');
        $this->form_validation->set_rules('passwordUser', 'Password', 'required');
        $this->form_validation->set_rules('passwordUser2', 'Confirm Password', 'matches[passwordUser]');

        // formulaire run
        if ($this->form_validation->run() == false) {
            //TITRE
            $data['title'] = 'Formulaire d\'enrigestrement';
            //form
            $this->load->view('templates/header', $data);
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            // ça encripte le mot de passe
            $enc_password = md5($this->input->post('passwordUser'));
            // enregistre le mot de passe dejà cripté
            $this->user_model->register($enc_password);
            // petit message success personalisé
            $this->session->set_flashdata('user_registered', 'Vous etes bien enregistré et vous pouvez faire login');
            // // petit redirect
            redirect('/user/login');
        }
    }

    ///////////////
    //  login
    ///////////////

    public function login()
    {
        //formulaire rules
        $this->form_validation->set_rules('emailUser', 'Email', 'required');
        $this->form_validation->set_rules('passwordUser', 'Password', 'required');

        // formulaire run
        if ($this->form_validation->run() == false) {
            //TITRE
            $data['title'] = 'Login';
            // si ça marche pas, reload
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            // go to method login dans le user model
            $this->user_model->login();  
        }
    }

    ///////////////
    //  logout
    ///////////////

    public function logout()
    {
        // Unset la session cree lors du login
        // utiliser destroy ??
        $this->session->sess_destroy();
        // $this->session->unset_userdata('logged_in');
        // $this->session->unset_userdata('user_id');
        // $this->session->unset_userdata('emailUser');
        // petit message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
        // petit redirect
        redirect('user/login');
    }

    ///////////////////////////////
    //  checks if username exists
    ///////////////////////////////

    public function check_username_exists($username)
    {

        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

        if ($this->user_model->check_username_exists($username)) {
            return true;
        } {
            return false;
        }
    }

    ////////////////////////////
    //  checks if mail exists
    ///////////////////////////

    public function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } {
            return false;
        }
    }
}
