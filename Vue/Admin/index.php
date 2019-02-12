<?php $this->titre = "Mon Blog - Administration" ?>

<span class="text-center"><h2>Administration</h2></span> 

<br/>
<br/>
<br/>

<div class="masthead-followup row m-0 border border-white">
    <div class="col-12 col-md-4 p-3 p-md-5 bg-light border border-white">
        <p>Bonjour JeanFORTEROCHE <a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a></p>
        <h6>Ce blog comporte : </h6> 
        <ul class="list-unstyled">
            <li><?= $this->nettoyer($nbBillets) ?> billet(s)</li> 
            <li><?= $this->nettoyer($nbCommentaires) ?> commentaire(s)</li> 
            <li><?= $this->nettoyer($nbSignalements) ?> commentaire(s) signaler</li> 
        </ul>
    </div>
    
    <div class="col-12 col-md-4 p-3 p-md-5 bg-light border border-white">
    <p>Creer un nouveau chapitre : </p>
    <form action="chapitre/" method="post">
       <input type="submit" value="Nouveau_Chapitre" name="add_chapter" class="input_css" />
    </form>  
    </div>
    
    <div class="col-12 col-md-4 p-3 p-md-5 bg-light border border-white" id="signalement_adm">
        <?php foreach ($commentaire as $commentaires): ?>
            <div class="container trchap ">
                <p>Nombre de signalement : <?= $this->nettoyer($commentaires['signalement']) ?></p>
                <p>Auteur du commentaire : <?= $this->nettoyer($commentaires['auteur']) ?></p>
                <p>Contenu du commentaire : <br/> <?= $this->nettoyer($commentaires['contenu']) ?></p>
                <form method="post" action="admin/supprimer">
                    <input type="hidden" name="id" value="<?= $commentaires['id'] ?>" />
                    <input type="submit" name="signaler" value="supprimer" class="btn btn-danger " />
                </form>
                <hr>
            </div>
        <?php endforeach; ?>    
    </div>
</div> 

<br/>
<br/>
<br/>



<?php foreach ($billets as $billet):    ?>
    <div class="container trchap">
        <h3 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h3>
        
        
        
        <h6><?= $this->nettoyer($billet['contenu']) ?></h6>
        
        
        <form method="post" action="admin/deletes">
            <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
            <input type="submit" name="supprimer" value="supprimer" class="input_css" />
        </form>
        
        
        <form method="post" action="modifier">
            <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
            <input type="submit" value="modifier" class="input_css" />
        </form>
        
        <hr>
    </div>
<?php endforeach; ?>


