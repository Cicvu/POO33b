<?php


 class voiture{

    private $id = 0;
    private $marque = "?";
    private $modele = "?";
    
    function __construct(array $tableau = null) {
      if ($tableau != null) {
        $this->hydrater($tableau);
      }
    }   

    
    /**
   * Getter et setter   
   */
  function get_id() {
    return $this->id;
  }

  function get_marque() {
    return $this->marque;
  }

  function get_modele() {
    return $this->modele;
  }

  function set_id($id) {
    $this->id = $id;
  }

  function set_marque($marque) {
    $this->marque = $marque;
  }

  function set_modele($modele) {
    $this->modele = $modele;
  }


    /**
   * Hydrateur  
   */

  function hydrater(array $tableau) {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }


    /**
   * Fonction designation  
   */

  function designation(){
    return $this->marque . " " . $this->modele;
  }
}

?>