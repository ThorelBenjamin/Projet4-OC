<?php

require_once 'Framework/Modele.php';

class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, Signalement as signalement from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }
    
    public function getCommentaire() {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, Signalement as signalement from T_COMMENTAIRE'
                . ' order by Signalement desc';
        $commentaire = $this->executerRequete($sql);
        return $commentaire;
    }
    
    
    
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(NOW(), ?, ?, ?)';
        $this->executerRequete($sql, array($auteur, $contenu, $idBillet));
    }
    
    /**
     * Renvoie le nombre total de commentaires
     * 
     * @return int Le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'select count(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbCommentaires'];
    }
    
    public function newSignalement($idCommentaire)
    {
        $sql = 'UPDATE T_COMMENTAIRE SET Signalement = Signalement+1 WHERE COM_ID = "'. $idCommentaire .'"'; 
        $resultat = $this->executerRequete($sql);
    }
    
    public function afficherSignalement()
    {
        $sql = 'SELECT COM_CONTENU, SUM(Signalement) FROM t_commentaire GROUP BY COM_CONTENU HAVING SUM(Signalement) >= 1';
        $signalers = $this->executerRequete($sql);
        return $signalers;
    }
    
    public function getNomberSignalement()
    {
        $sql = 'select count(*) as nbSignalements from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbSignalements'];
    }
    
    public function deleteCommentaire($idCommentaire)
    {
        
        $sql = 'DELETE FROM T_COMMENTAIRE WHERE COM_ID = "'. $idCommentaire .'" ';
        $delete = $this->executerRequete($sql);
    }
}