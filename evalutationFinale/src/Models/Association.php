<?php


namespace App\Models;


class Association
{
    public $id;
    public $assVoiture;
    public $assConducteur;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAssVoiture()
    {
        return $this->assVoiture;
    }

    /**
     * @param mixed $assVoiture
     */
    public function setAssVoiture($assVoiture)
    {
        $this->assVoiture = $assVoiture;
    }

    /**
     * @return mixed
     */
    public function getAssConducteur()
    {
        return $this->assConducteur;
    }

    /**
     * @param mixed $assConducteur
     */
    public function setAssConducteur($assConducteur)
    {
        $this->assConducteur = $assConducteur;
    }

}