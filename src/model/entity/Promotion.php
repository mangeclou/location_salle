<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */
namespace entity; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier
class Promotion {

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $idPromo;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected  $codePromo;

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $reduction;

     //----------- GETTERS -----------------
    public function getIdPromo()
    {
        return $this->idPromo;
    }
    public function getCodePromo()
    {
        return $this->codePromo;
    }
    public function getReduction()
    {
        return $this->reduction;
    }
      
    //--------- SETTERS ------------------
    public function setCodePromo($code)
    {
        $this->codePromo = $code;
    }
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;
    }
}
