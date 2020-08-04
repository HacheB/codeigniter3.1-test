<?php

class Users extends CI_Controller
{
	// Variables
	private $titreDefaut;

	public function __construct()
	{
		parent::__construct(); // Obligatoire
		// Model
		$this->load->model('users_model', 'usersModel');

		// library
		$this->load->library('layout'); // Pour utiliser un layout personalisé

		// Helpers natif
		// Helpers perso
		$this->load->helper('assets');
		
		//	Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->titreDefaut = 'Utilisateurs';
	}
	

	// Est appelée dans le cas où votre URL ne spécifie pas de nom de méthode.
	public function index()
	{
		$this->get();
	}

	public function get()
	{
		// var_dump($this->titreDefaut);
		$data = array();
		$data['titreDefaut'] = $this->titreDefaut;
		
		$data['users'] = $this->usersModel->read();
		// $this->load->view('users_home', $data); // Chargement de la vue
		$this->layout->view('users_home', $data); // Chargement de la vue ds le layout custom
	}

	//
	// Créer un utilisateur
	//
	public function create()
	{
		$data = array();
		//	Chargement de la bibliothèque
		$this->load->helper('security');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', '"Prénom"', 'trim|required|min_length[2]|max_length[94]|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('lastname', '"Nom"', 'trim|required|min_length[2]|max_length[94]|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('email', '"Mail"', 'trim|required|min_length[5]|max_length[124]|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', '"Téléphone"', 'trim|min_length[5]|max_length[20]|encode_php_tags|xss_clean');
		
		if($this->form_validation->run()) {
			//	Le formulaire est valide
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone')
			);
			$data_no_escaped = array(
				'date_updated' => 'NOW()',
				'date_created' => 'NOW()'
			);
		 	$r = $this->usersModel->create($data, $data_no_escaped);
		 	if ($r === false) {
		 		// $this->load->view('users_create');
		 		$this->layout->view('users_create', $data); // Utilisation du layout custom
		 	} else {
		 		$idUser = $this->db->insert_id();
		 		$this->session->set_tempdata('users_new', 'L\'utilisater id ' . $idUser . ' vient d\'être créé', 300);
		 		// $this->get(); // On retourne à la liste des enregistrements
		 		redirect('users'); // On retourne à la liste des enregistrements
		 	}
		}
		else {
			//	Le formulaire est invalide ou vide
			// $this->load->view('users_create');
			$this->layout->view('users_create', $data); // Utilisation du layout custom
		}
	}

	//
	// Editer un utilisateur
	//
	public function edit()
	{

	}


	//	Cette page accepte une variable $_GET facultative
	public function test($message = '')
	{
		echo 'Le message : ' . $message;
	}


	// La méthode _output vous permet de manipuler une dernière fois les données que vous allez envoyer au navigateur.
	// Cette fonction n'est pas accessible depuis le navigateur, car elle est précédée d'un « _ » (underscore).
	//	L'affichage de la variable $output est le comportement par défaut.
	/*public function _output($output)
	{
		echo $output;
	}*/
}
