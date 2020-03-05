
<?php

class User_model extends CI_Model
{

    /////////////
    // constructor
    /////////////

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    ////////////
    // register
    // (create/setter)
    ////////////

    public function register($enc_password)
    {
        $data = [
            'emailUser' => $this->input->post('emailUser'),
            'passwordUser' => $enc_password,
            'confirmationPassword' => $this->input->post('passwordUser2'),
        ];
        return $this->db->insert('user', $data);
    }

    /////////////
    // AUTHENTIFICATION
    /////////////

    public function authy($email, $password)
    {
        // cette methode check si les infos de login sont bonnes
        // dans la base de donnes, compare les variables
        // avec les colonnes indiquées
        $this->db->where('emailUser', $email);
        $this->db->where('passwordUser', $password);
        // dans la table 'user'
        // stock le resultat dans une variable
        $result = $this->db->get('user');

        if ($result->num_rows() == 1) {
            // si il y a une correspondence
            // stock le id en question dans una variable
            return $result->row(0)->id;
        } else {
            // sinon, 
            return false;
        }
    }

    ////////////
    // login
    // (getter)
    ////////////

    public function login()
    {
        // lire username
        $email = $this->input->post('emailUser');
        // lire le password encrypté
        $password = md5($this->input->post('passwordUser'));
        // run ma methode authy
        $user_id = $this->authy($email, $password);
        if ($user_id) {
            // si elle est bonne
            // utilise ces infos
            $user_data = array(
                'user_id' => $user_id,
                'emailUser' => $email,
                'logged_in' => true
            );
            //  pour creer une session
            // atention // config necessaire dans config.php
            $this->session->set_userdata($user_data);

            // petit message personalisé
            $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            //petit redirect
            redirect('/commande/index');
        } else {
            // et si ça marche pas, message d'erreur
            $this->session->set_flashdata('login_failed', 'Login is invalid');
            // petit redirect
            redirect('/user/login');
        }
    }

    ////////////
    //  checks if username exists
    ////////////

    public function check_username_exists($username)
    {
        $query = $this->db->get_where('user', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } {
            return false;
        }
    }

    ////////////
    //  checks if mail exists
    ////////////

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('user', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } {
            return false;
        }
    }
}
