<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Produtos_model extends CI_Model {

  public function get_produtos($ul){
      if(($ul !="" || $ul!=null) && $ul !=0){

        $busca = $this->db->query('SELECT * FROM tb_produtos  where ativo = true and quantidade !=0 and categoria ='.$ul);
       // $busca = $this->db->query('SELECT * FROM tb_produtos');
  
      }else{
        $busca = $this->db->query('SELECT * FROM tb_produtos where ativo =true and quantidade !=0');
      }
   
    
    return $busca;
  }


  public function excluir($cod){
      $this->db->delete('tb_produtos',array('codigo'=>$cod));
  }

  public function getProdutoCodigo($cod){
      $busca=$this->db->query("select p.*, c.descricao as 'categoria',c.codigo as 'id_categoria'from tb_produtos as p,tb_categoria as c where p.categoria=c.codigo and p.ativo=true and p.quantidade !=0 and p.codigo=".$cod);

      return $busca;
  }

  public function alterarProduto($data){
  $this->db->where('codigo',$data['codigo']);
  $this->db->set('nome',$data['nome']);
  $this->db->set('preco',$data['preco']);
  $this->db->set('descricao',$data['descricao']);
  $this->db->set('categoria',$data['categoria']);
  $this->db->set('ativo',$data['ativo']);
  $this->db->set('quantidade',$data['quantidade']);
  $this->db->set('imagem',$data['imagem']);
  $this->db->update('tb_produtos');
  }


  public  function insert($data){
   // $sql="INSERT INTO tb_produtos(nome,preco,descricao,categoria,ativo,quantidade,imagem)VALUES(".$prod['nome'].",".$prod['preco'].",".$prod['descricao'].",".$prod['categoria'].",".$prod['ativo'].",".$prod['quantidade'].",".$prod['imagem'].")";
  $this->db->set('nome',$data['nome']);
  $this->db->set('preco',$data['preco']);
  $this->db->set('descricao',$data['descricao']);
  $this->db->set('categoria',$data['categoria']);
  $this->db->set('ativo',$data['ativo']);
  $this->db->set('quantidade',$data['quantidade']);
  $this->db->set('imagem',$data['imagem']);
  $this->db->insert('tb_produtos');
/*
  $this->db->set('nome',"bola");
  $this->db->set('preco',"1.5");
  $this->db->set('descricao',"adad");
  $this->db->set('categoria',"1");
  $this->db->set('ativo',"1");
  $this->db->set('quantidade',"10");
  $this->db->set('imagem',"asdasd");
  $this->db->insert('tb_produtos');
*/
/*
$data=array(
  'nome'=>"adad",
  'preco'=>15,
  'descricao'=>"addad",
  'categoria'=>1,
  'ativo'=>true,
  'quantidade'=>10,
  'imagem'=>"dadadad");
*/
//$this->db->insert_batch('tb_produtos',$data);

  }
}

