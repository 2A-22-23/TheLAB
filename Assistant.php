<?php
class assistant
{
    private ?int $idassistant = null;
    private ?string $nom = null;
    private ?string $adresseEmail = null;
    private ?string $subject = null;

    public function __construct($id = null, $n, $p, $a)
    {
        $this->idassistant = $id;
        $this->nom = $n;
        $this->adresseEmail = $p;
        $this->subject = $a;
    }

    /**
     * Get the value of idassistant
     */
    public function getIdassistant()
    {
        return $this->idassistant;
    }

    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of adresseEmail
     */
    public function getadresseEmail()
    {
        return $this->adresseEmail;
    }

    /**
     * Set the value of adresseEmail
     *
     * @return  self
     */
    public function setadresseEmail($adresseEmail)
    {
        $this->adresseEmail = $adresseEmail;

        return $this;
    }

    /**
     * Get the value of subject
     */
    public function getsubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setsubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    
}
