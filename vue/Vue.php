<?php
class Vue 
{

  private $fichier; // Nom du fichier vue spécifique
  private $titre;
  private $nav;
  private $login;
  private $fenetreConnexion;

  public function __construct($page,$login)   // Détermination les fichiers vue à appeler 
  {
    $this->fichier = "Vue/vue" . $page . ".php";
    $this->login=$login;  
    if($login==null)
    {
      $this->nav="Vue/VueNavbarNotConnected.php";
      $this->fenetreConnexion="Vue/VueFenetreConnexion.php";
    }
    else
    {
      $this->nav="Vue/VueNavbarConnected.php";
      $this->fenetreConnexion=null;
    }
  }


  public function generer($donnees)   // Génère et affiche la vue
  {
    $contenu = $this->genererFichier($this->fichier, $donnees);// Génération de la partie spécifique de la vue
    // Génération du format html
    $nav =$this->genererFichier($this->nav,$donnees);
    if($this->fenetreConnexion!=null)
    {
      $fenetreConnexion=$this->genererFichier($this->fenetreConnexion,$donnees);
      $vue = $this->genererFichier('Vue/format_html.php', array('titre' => $this->titre, 'contenu' => $contenu, 'nav' =>$nav,'fenetreConnexion'=>$fenetreConnexion));
    }
    else
    {
      $vue = $this->genererFichier('Vue/format_html.php', array('titre' => $this->titre, 'contenu' => $contenu, 'nav' =>$nav));
    }
    // Renvoi de la vue au navigateur
    echo $vue;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFichier($fichier, $donnees) 
  {
    
    if (file_exists($fichier)) {
      // Rend les éléments du tableau $donnees accessibles dans la vue
      extract($donnees);
      // Démarrage de la temporisation de sortie
      ob_start();
      // Inclut le fichier vue
      // Son résultat est placé dans le tampon de sortie
      require $fichier;

      // Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
  }
}