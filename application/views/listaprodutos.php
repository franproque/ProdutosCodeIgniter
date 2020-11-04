<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>    
<title><?php echo $title ?></title>
<style>
  #conteudo{
    display:flex;
    flex-direction:column;
    hight:100vh;
    width:100%
    text-align: center;
  align-content: center;


  }
  .cof-table{
    width:50%;
    margin:auto;
  }
 
  .cof-select{
  width:50%;
  margin: auto;
  
  }
  h1{
    margin:auto;
  }
span{
  display:flex;
  flex-direction:row;
  margin:auto;
}

.voltar{
  margin:20px;
}

</style>
</head>
<body>
  <div id="conteudo">
    <span> <a href="http://localhost/bcit/importante/index.php/produto/novo" class="btn btn-warning voltar" >Novo</a><h1>Listagem de Produtos: </h1></span>
    <select name="" id="select-categoria" onchange="filtro()" class="custom-select custom-select-lg mb-3 cof-select">
    <option >Selecione filtro</option>
    <option value="0">Todos</option>
        <?php 
        foreach($categoria-> result_array()  as $row):?>
         <option value='<?php echo $row["codigo"] ?>'><?php echo $row['descricao']?></option>

        <?php  endforeach;  ?>

      
    </select>

    <table class="table table-dark cof-table" >
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Imagem</th>
      <th scope="col">Produto</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($produtos->result_array() as $row): ?>
    <tr>
      <th scope="row"><?php echo $row['codigo']?></th>
      <td><img src="<?php echo $row['imagem'] ?>" alt="" style="width:80px;height: 80px;"></td>
      <td><h3><?php echo $row['nome'] ?></h3></td>
      <td>
      <a type="button" class="btn btn-primary" href="http://localhost/bcit/importante/index.php/produto/detalhes/<?php echo $row['codigo'] ?>">Detalhes</a>
      <a type="button" class="btn btn-warning"  onclick="excluir(<?php echo $row['codigo']?>)">Excluir</a>
      </td>

      <?php endforeach; ?>
    </tr>
   
  </tbody>
</table>
      </div>
<script>
    function filtro(){
    var valor =  document.getElementById('select-categoria').value
    if(valor !=0){
        window.location.href="http://localhost/bcit/importante/index.php/produto/listar/"+valor;
    }else{
        window.location.href="http://localhost/bcit/importante/index.php/produto/listar"
    }
    
}


function excluir(valor){
    axios.post('http://localhost/bcit/importante/index.php/produto/excluir/'+valor).then(function (x){
        window.location.href='http://localhost/bcit/importante/index.php/produto/listar'
    })
}
</script>
</body>
</html>