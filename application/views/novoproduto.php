

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
    <title>Document</title>
   
    <style>
        form{
            margin: auto;
            display:flex;
            flex-direction:column;
            text-align: center;
            align-items: center;
            width: 50%;
            height: 100%;
    border: 1px solid;
        }

        img{
            width:250px;
            height:250px;
        }


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


<span> <a href="http://localhost/bcit/importante/index.php/produto/listar" class="btn btn-warning voltar" >Listar</a><h1>Cadastrar Produto: </h1></span>
    <form>
  
   
    <div class="form-group">
    <img src="" alt="">
    <br>
    <input type="file" name="" id="file" onchange="encodeImageFileAsURL(this)">
    <input type="text" name="imagem" id="imagem" hidden value="">
    </div>
</br>
<div class="form-group">
<label for="formGroupExampleInput">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Nome Produto" name="nome" value="">
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Preco</label>
    <input type="text" class="form-control" id="preco" placeholder="0.5" name="preco" value="" >
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Descrição</label>
    <input type="text"class="form-control" id="descricao" rows="3" name="descricao" value=""></input>
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Categoria</label>
    <br>
    <input type="text" name="categoria"  id="categoria"value="" hidden>
    <select class="form-control form-control-sm" id="select-categoria" name="select-categoria" onchange="muda(this.value)">
    <option>Escolha a categoria</option>
    <?php foreach($listCategoria->result_array() as $cat): ?>
    <option value="<?php echo $cat['codigo']?>"><?php echo $cat['codigo'] .'-'. $cat['descricao']?></option>
    <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Status</label>
    <br>
        <Label>0-Desativado</Label>
        <br>
        <Label>1-Ativo</Label>
        <br>
        <input type="text"name="ativo" id="ativo" value="">
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Quantidade</label>
    <input type="text" class="form-control quantidade" id="quantidade"  placeholder="Quantidade" name="quantidade" value="" >
    
</div>

<div class="btn-group" role="group" aria-label="Basic example">
<button type="button" onclick="cadastrar()" class="btn btn-success" id="enviar">Enviar</button>

    </div>
    </form>
    </div>
    <Script>
        function muda(valor){
          document.getElementById('categoria').value=valor;
        }

        function limpar(){
            document.getElementById('nome').value=""
          document.getElementById('preco').value=""
          document.getElementById('descricao').value=""
          document.getElementById('categoria').value=""
          document.getElementById('ativo').value=""
          document.getElementById('quantidade').value=""
          document.getElementById('imagem').value=""
        }
     function cadastrar(){
            var data = new FormData();
          console.log(document.getElementById('nome').value)
          console.log(document.getElementById('preco').value)
          console.log(document.getElementById('descricao').value)
          console.log(document.getElementById('categoria').value)
          console.log(document.getElementById('ativo').value)
          console.log(document.getElementById('quantidade').value)
          console.log(document.getElementById('imagem').value)
            data.append('nome',document.getElementById('nome').value);
            data.append('preco',document.getElementById('preco').value)
            data.append('descricao',document.getElementById('descricao').value)
            data.append('categoria',document.getElementById('categoria').value)
            data.append('ativo',document.getElementById('ativo').value)
            data.append('quantidade',document.querySelector('.quantidade').value)
            data.append('imagem',document.getElementById('imagem').value)
            console.log(data);
            axios.post('http://localhost/bcit/importante/index.php/produto/salvar',data).then(function (x){
                console.log('Salvo com sucesso')
                alert('Produto Registrado com sucesso')
                limpar()
            })
        }
        function encodeImageFileAsURL(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
    
        document.querySelector('#imagem').value = reader.result
        document.querySelector('img').src=reader.result
    }
        reader.readAsDataURL(file);
}

    </script>
</body>
</html>