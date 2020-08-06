<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Return all validation errors
     *
     * @access  public
     * @return  array
     */
    public function error_array(){
    	return $this->_error_array;
    }
}

