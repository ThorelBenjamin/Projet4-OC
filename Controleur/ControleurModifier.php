<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'ControleurSecurise.php';

class ControleurModifier extends ControleurSecurise 
{

    private $billet;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->billet = new Billet();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idBillet = $this->requete->getParametre("id");
        $billet = $this->billet->getBillet($idBillet);
        
        $nbBillets = $this->billet->getNombreBillets();
        $login = $this->requete->getSession()->getAttribut("login");
        
        $this->genererVue(array('billet' => $billet, 'nbBillets' => $nbBillets, 'login' => $login));
    }

    // Modifier un billet
    public function uptade() {
        
        $delBillet = $this->requete->getParametre("id");
        $this->billet->deleteBillets($delBillet);
        
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        
        $this->billet->ajouterbillets($titre, $contenu);
        
        $_SERVER['HTTP_REFERER'];
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }
    

}

