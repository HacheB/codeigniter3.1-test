<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	
	public function __construct()
	{
		$this->CI = get_instance();
		$this->var['output'] = '';

		// Helpers natif
		$this->CI->load->helper('html');
		// Helpers custom	
		$this->CI->load->helper('assets');

		//	Le titre est composé du nom de la méthode et du nom du contrôleur
		//	La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
		
		//	Nous initialisons la variable $charset avec la même valeur que
		//	la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');

		$this->var['css'] = array();
		$this->var['js'] = array();

		$this->add_css('bootstrap.min', '0.0.1');
	}
	

	// Méthodes pour charger les vues
	// 	. view
	// 	. views
	
	// view permet d'afficher une vue dans un layout.
	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('../themes/default', array('output' => $this->var));
	}


	
	// views permet de sauvegarder le contenu d'une ou plusieurs vues dans une variable, sans l'afficher immédiatement. Pour l'affichage, il faudra utiliser la méthode view.
	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}

	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}

	public function add_css($nom, $version = '')
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css' ))
		{
			$this->var['css'][] = css_url($nom, $version);
			return true;
		}
		return false;
	}

	public function add_js($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}

}
