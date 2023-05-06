<?php
class probleme
{
    private ?int $idprobleme = null;
    private ?string $description = null;
    private ?DateTime $dateCreation = null;

    public function __construct($id = null, $a, $d)
    {
        $this->idprobleme = $id;
        $this->description = $a;
        $this->dateCreation = $d;
    }

    /**
     * Get the value of idprobleme
     */
    public function getIdprobleme()
    {
        return $this->idprobleme;
    }

    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getdateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */
    public function setdateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}
