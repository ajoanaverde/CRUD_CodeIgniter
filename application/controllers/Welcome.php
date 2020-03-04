<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('client_model');
		$this->load->model('produit_model');
		$this->load->model('commande_model');
	}

	public function index()
	{
		$data = array(
			$this->commande_model->get_commande(),
			$this->produit_model->get_produit(),
			$this->client_model->get_client(),
		) ;
		$this->load->view('templates/header');
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer');
	}
}
