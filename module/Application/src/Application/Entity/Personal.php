<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 18.09.2016
 * Time: 13:13
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 *
 */
class Personal
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $adresse;

    /**
     * @ORM\Column(type="date")
     */
    protected $einstellungsdatum;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getEinstellungsdatum()
    {
        return $this->einstellungsdatum;
    }

    /**
     * @param mixed $einstellungsdatum
     */
    public function setEinstellungsdatum($einstellungsdatum)
    {
        $this->einstellungsdatum = $einstellungsdatum;
    }

    public function getData() {
        return array(
            'id'  => $this->id,
            'name'  => $this->name,
            'adresse'  => $this->name,
            'einstellungsdatum'  => $this->einstellungsdatum,
        );
    }

    public function populate($data = array()) {
        $this->id = (isset($data['id']))? $data['id'] : null;
        $this->name = (isset($data['name']))? $data['name'] : null;
        $this->adresse = (isset($data['adresse']))? $data['adresse'] : null;
        $this->einstellungsdatum = (isset($data['einstellungsdatum']))? $data['einstellungsdatum'] : null;
    }


}