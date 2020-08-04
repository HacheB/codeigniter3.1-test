<?php
class Users_model extends CI_Model {
	
	protected $table = 'users';


    public function __construct()
    {
        // $this->load->database(); // Déjà chargé en global
    }

	//
	// Créer un utilisateur
	//
	public function create($value_escaped, $value_no_escaped)
	{
		// Manière UN
		// return $this->db->set('firstname', $this->input->post('firstname'))
		// 	->set('lastname', $this->input->post('lastname'))
		// 	->set('email', $this->input->post('email'))
		// 	->set('phone', $this->input->post('phone'))
		// 	->set('date_updated', 'NOW()', false)
		// 	->set('date_created', 'NOW()', false)
		// 	->insert($this->table);
		// OU return $this->db->set($value_insert)->insert($this->table);

		// Autre manière
		//	Vérification des données à insérer
		if(empty($value_escaped) AND empty($value_no_escaped)) {
			return false;
		}

		return $this->db->set($value_escaped)
						->set($value_no_escaped, null, false)
						->insert($this->table);

		// return $this->db->insert($this->table, $value_escaped); // Avec cette methode on ne peut pas prendre le 'NOW()'; 
		
	}

	public function read($select = 'id, firstname, lastname, email, phone, date_created, date_updated',
						$where = array(),
						$nb = null,
						$debut = null,
						$order = 'ID DESC')
	{
		return $this->db->select($select)
						->from($this->table)
						->where($where)
						->order_by($order)
						->limit($nb, $debut)
						->get()
						->result();

		/*
		$query = $this->db->select('id, firstname, lastname, email, phone, date_created, date_updated')
             ->from('users')
             ->limit($limit)
             ->get();
        // $resultCount = $this->db->count_all_results(); // Pas compatible avec LIMIT
		$result = $query->row_array();
		// $result = $query->result();
        var_dump($result);
        $query->free_result();

        // Nombre total de résultat
        $this->db->from('users');
        $resultCount = $this->db->count_all_results(); // Pas compatible avec LIMIT
        var_dump($resultCount);
        */
	}


	//
	// Editer un utilisateur
	//
	public function update($where, $options_echappees = array(), $options_non_echappees = array())
	{		
		//	Vérification des données à mettre à jour
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}
		
		//	Raccourci dans le cas où on sélectionne l'id
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}

		return (bool) $this->db->set($options_echappees)
			->set($options_non_echappees, null, false)
			->where($where)
			->update($this->table);

	}

	//
	// Supprimer un utilisateur
	//
	public function delete($where)
	{
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}
		return $this->db->where($where)->delete($this->table);
	}
}
