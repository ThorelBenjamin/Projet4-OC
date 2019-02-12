<?php

require_once 'Framework/Controleur.php';
require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Utilisateur.php';

class ControleurInscription extends Controleur
{
    private $utilisateur;
    
    
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    
    public function index()
    {
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('login' => $login));
    }
    
     public function ajouters() {
        $login = $this->requete->getParametre("login");
        
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $this->utilisateur->ajouterUtilisateur($login, $password);
        
        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
         
         die('Votre compte a bien été crée');
    }
    

}