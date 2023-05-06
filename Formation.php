<?php
class formation
{
    private ?int $idformation = null;
    private ?string $typeformation = null;
    private ?int $prix = null;
    private ?string $duree = null;
   

    public function __construct($id = null, $t, $p, $d)
    {
        $this->idformation = $id;
        $this->typeformation = $t;
        $this->prix = $p;
        $this->duree = $d;
    }

    /**
     * Get the value of idformation
     */
    public function getIdformation()
    {
        return $this->idformation;
    }

    /**
     * Get the value of lastName
     */
    public function gettypeformation()
    {
        return $this->typeformation;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function settypeformation($typeformation)
    {
        $this->typeformation= $typeformation;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getduree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */
    public function setduree($duree)
    {
        $this->duree = $duree;

        return $this;
    }


}
