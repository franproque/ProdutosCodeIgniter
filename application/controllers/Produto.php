<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Categoria_model','Cat');
        $this->load->model('Produtos_model','Prod');
    }
	
	public function index()
	{
  
    }
    

    public function listar(){
        $dados['title']="Listar Produtos";
       $dados['categoria']= $this->Cat->get_categoria();
       $ul="";
       $ul= $this ->uri->segment(3);
       $dados['produtos']=$this->Prod->get_produtos($ul);
       $this->load->view('listaprodutos',$dados);
    }


    public function excluir(){
        $ul= $this ->uri->segment(3);
        
        $this->Prod->excluir($ul);
       //redirect('http://localhost/bcit/importante/index.php/produto/listar');
    }

    public function detalhes(){
        $ul= $this ->uri->segment(3);
        $dados['listCategoria']=$this->Cat->get_categoria();
      $dados['produto']= $this->Prod->getProdutoCodigo($ul);
        $this->load->view('detalhes',$dados);
    }
    public function alterar(){
        $data=array( 'codigo'=>$_POST['codigo'],
                    'nome'=>$_POST['nome'],
                    'preco'=>$_POST['preco'],
                    'descricao'=>$_POST['descricao'],
                    'categoria'=>$_POST['categoria'],
                    'ativo'=>$_POST['ativo'],
                    'quantidade'=>$_POST['quantidade'],
                    'imagem'=>$_POST['imagem']);
        $this->Prod->alterarProduto($data);
    }

    public function novo(){
        $dados['listCategoria']=$this->Cat->get_categoria();
      $this->load->view('novoproduto',$dados);
    }

    public function salvar(){
      $data=array(
            'nome'=>$_POST['nome'],
            'preco'=>$_POST['preco'],
            'descricao'=>$_POST['descricao'],
            'categoria'=>$_POST['categoria'],
            'ativo'=>$_POST['ativo'],
            'quantidade'=>$_POST['quantidade'],
            'imagem'=>$_POST['imagem']);

      
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
/*$data=array(
    $_POST['nome'],
    $_POST['preco'],
   $_POST['descricao'],
   $_POST['categoria'],
   $_POST['ativo'],
   $_POST['quantidade'],
   $_POST['imagem']);

*/


     $this->Prod->insert($data);
            
            
    }

   

}



