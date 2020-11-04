<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Categoria_model','Cat');
    }
	
	public function insert()
	{
        $his->$this ->uri->segment(3);

		$this->load->view('');
    }
    

   
}



