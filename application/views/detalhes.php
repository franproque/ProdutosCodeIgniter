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
            border:1px solid;
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


<span> <a href="http://localhost/bcit/importante/index.php/produto/listar" class="btn btn-warning voltar" >Listar</a><h1>Detalhes do Produto: </h1></span>
    <form>
    <?php foreach($produto->result_array() as $row ): ?>
    <input type="text" hidden value=<?php echo $row['codigo'] ?> id="codigo">
    <div class="form-group">
    <img src="<?php echo $row['imagem']?>" alt="">
    <br>
    <input type="file" name="" id="file" onchange="encodeImageFileAsURL(this)">
    <input type="text" name="imagem" id="imagem" hidden value="<?php echo $row['imagem']?>">
    </div>
</br>
<div class="form-group">
<label for="formGroupExampleInput">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Nome Produto" name="nome" value="<?php echo $row['nome'] ?>">
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Preco</label>
    <input type="text" class="form-control" id="preco" placeholder="0.5" name="preco" value="<?php echo $row['preco'] ?>" >
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Descrição</label>
    <input type="text"class="form-control" id="descricao" rows="3" name="descricao" value="<?php echo $row['descricao'] ?>"></input>
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Categoria</label>
    <br>
    <input type="text" name="categoria"  id="categoria"value="<?php echo $row['id_categoria'] ?>">
    <select class="form-control form-control-sm" id="select-categoria" name="select-categoria" onchange="muda(this.value)">
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
        <input type="text"name="ativo" id="ativo" value="<?php echo $row['ativo'] ?>">
</div>
<div class="form-group">
    <label for="formGroupExampleInput">Quantidade</label>
    <input type="text" class="form-control quantidade"  placeholder="Quantidade" name="quantidade" value="<?php echo $row['quantidade'] ?>" >
    
</div>
<?php endforeach ?>
<div class="btn-group" role="group" aria-label="Basic example">
<button type="button" onclick="atualizar()" class="btn btn-success" id="enviar">Enviar</button>
<button type="button" class="btn btn-dark " onclick="habilitaCampos()">Editar</button>
    </div>
    </form>
    </div>
    <Script>
        function muda(valor){
          document.getElementById('categoria').value=valor;
        }
        function atualizar(){
            var data = new FormData();
            data.append('codigo',document.getElementById('codigo').value);
            data.append('nome',document.getElementById('nome').value);
            data.append('preco',document.getElementById('preco').value)
            data.append('descricao',document.getElementById('descricao').value)
            data.append('categoria',document.getElementById('categoria').value)
            data.append('ativo',document.getElementById('ativo').value)
            data.append('quantidade',document.querySelector('.quantidade').value)
            data.append('imagem',document.getElementById('imagem').value)
            console.log(data);
            axios.post('http://localhost/bcit/importante/index.php/produto/alterar',data).then(function (x){
                habilitaCampos();
            })
        }
        window.onload=habilitaCampos();
        var cont=0;
        function habilitaCampos(){
            if(cont%2!=0){
            document.getElementById('nome').disabled = true; 
            document.getElementById('descricao').disabled = true;
            document.getElementById('categoria').disabled = true;
            document.getElementById('select-categoria').disabled = true;
            document.getElementById('ativo').disabled = true;
            document.querySelector('.quantidade').disabled = true;
            document.getElementById('enviar').disabled = true;
            document.getElementById('preco').disabled = true;
            }else{
                document.getElementById('nome').disabled = false; 
            document.getElementById('descricao').disabled = false;
            document.getElementById('categoria').disabled = false;
            document.getElementById('select-categoria').disabled = false;
            document.getElementById('ativo').disabled = false;
            document.querySelector('.quantidade').disabled = false;
            document.getElementById('preco').disabled = false;
            document.getElementById('enviar').disabled = false;


            }
            cont++;
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
    </Script>
</body>
</html>