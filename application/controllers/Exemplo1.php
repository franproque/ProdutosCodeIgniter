<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Exemplo1_model');
    }
	
	public function index()
	{
        $dado['title']="Primeira page 2";
        $dado['conteudo']="";
		$this->load->view('exemplo1',$dado);
    }
    
    public function login()
	{ 
        //Pega o valor passado na url, é necessario, mostrar a posição do segmento
        $ul= $this ->uri->segment(3);
        echo 'login '.$ul;
      

    }
    

    public function model()
	{
       $this->Exemplo1_model->salvar();
    }
    
}



