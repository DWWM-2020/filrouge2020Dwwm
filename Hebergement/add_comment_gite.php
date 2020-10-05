<?php include 'config_bdd_gite.php'; ?>


<?php 


    if($_POST && !empty($_POST['new_comment'])){
        $req = $bdd->prepare("INSERT INTO comments SET comments = ?, id_gite = ?, id_user = ?,date_comment = NOW()");
    if($req->execute([$_POST['new_comment'], $_POST['id_gite'], $_POST['id_user']])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }else{

    }
    }

?>



<div class="article article_1 container">
    <h2>Commentaires</h2>
<hr class="comment_separator">
<form action="add_comment_gite.php"method="post"class="form-group">

      
<?php if(isset($_SESSION['auth'])): ?>
<input type="text"class='form-control'placeholder="Ajouter un commentaire"name="new_comment">
<input type="hidden"name="id_user"value = <?php echo $id_user ?>>
<?php else: ?>
    <input type="text"class='form-control'placeholder="Ajouter un commentaire"name="new_comment" readonly>
<?php endif ?>
<input type="hidden"name="id_gite"value = <?php echo $id_gite ?>>
<?php if(!isset($_SESSION['auth'])) : ?>
    <div class="alert alert-secondary">Inscrivez vous ou connectez vous pour ajouter un commentaire sur ce gite.</div>
    <?php elseif(isset($_SESSION['auth'])): ?>
<button class="btn btn-primary">Envoyer</button>
<?php  endif ?>


</form>

</div>
