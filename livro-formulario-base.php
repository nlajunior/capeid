<div class="form-group">

    <input class = "form-control" type = "text" id = "nome" name="nome"  value = "<?=$treinamento->getNome()?>" placeholder="Nome">

</div>
      
<div class="form-group">

    <input class = "form-control"  type = "text" id = "autor" name="autor" value = "<?=$treinamento->getAutor()?>" placeholder="Autor">

</div>

<div class="form-group">

    <input type="text"  id="isbn" name="isbn" placeholder="ISBN" class="form-control" value="<?=$treinamento->getISBN()?>"
           
<div class="form-group">

    <input type="text"  id="editora" name="editora" placeholder="Editora" class="form-control" value="<?=$treinamento->getEditora()?>">

</div>
 
<button class = "btn btn-primary" type = "submit">Salvar</button>
<button class = "btn btn-primary" type = "submit">Voltar</button>