<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 18.09.2016
 * Time: 14:37
 */

namespace Application\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element;

class PersonalForm extends Form
{
    public function __construct(EntityManager $em)
    {
        parent::__construct('personal');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'name',
            'type'  => 'text',
            'options' => array('label' => 'Name')
        ));
        $this->add(array(
            'name' => 'adresse',
            'type'  => 'text',
            'options' => array('label' => 'Adresse'),
        ));

        $this->add(array(
            'name' => 'einstellungsdatum',
            'type' => 'Zend\Form\Element\Date',
            'options' => array(
                'label' => 'Einstellungsdatum',
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Personal',
                'property' => 'name',
                'format' => 'd.m.Y'
            ),
            'attributes' => array(
                'required' => true
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
            ),
        ));
    }
}