<?php

require_once 'Framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        
        $billets = $this->billet->getBillets();
        $commentaire = $this->commentaire->getCommentaire();
        $nbBillets = $this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $nbSignalements = $this->commentaire->getNomberSignalement();
        
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('billets' => $billets, 'commentaire' => $commentaire, 'nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires, 'nbSignalements' => $nbSignalements, 'login' => $login));
    }
    
    public function deletes()
    {
        $delBillet = $this->requete->getParametre("id");
        $this->billet->deleteBillets($delBillet);
        $this->executerAction("index");
    }
    
    public function supprimer()
    {
        $delCommentaire = $this->requete->getParametre("id");
        $this->commentaire->deleteCommentaire($delCommentaire);
        
        $this->executerAction("index");
        
    }
    
}

