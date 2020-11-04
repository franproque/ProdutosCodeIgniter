<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Categoria_model extends CI_Model {

public function get_categoria(){
    $busca = $this->db->query('SELECT codigo, descricao FROM tb_categoria');

    if($busca->num_rows()!=0){
        return $busca; 
    }else{
        return NULL;
    }
    
}
}

