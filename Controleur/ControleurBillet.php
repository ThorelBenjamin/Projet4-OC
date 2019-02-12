<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'ControleurSecurise.php';

class ControleurBillet extends Controleur {

    private $billet;
    private $commentaire;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    
    // Affiche les détails sur un billet
    public function index() {
        $idBillet = $this->requete->getParametre("id");
        
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        
        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");
        
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    
    public function signaler() {
        $signalements = $this->requete->getParametre("id");
        $this->commentaire->newSignalement($signalements);
        
        $this->executerAction("index");
    }
    
    public function supprimerBillerts() {
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('login' => $login));
        $this->billet->deleteBillets();
        $this->executerAction("index");
    }
    
}

