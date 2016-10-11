<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 18.09.2016
 * Time: 14:39
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Entity\Personal;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\View\Model\ViewModel;
use Application\Form\PersonalForm;
class PersonalController extends AbstractActionController
{
    private $entityManager;

    public function __construct($em)
    {
        $this->entityManager = $em;
    }


    public function getEntityManager()
    {
        return $this->entityManager;
    }
    /**
     * Index action
     *
     */
    public function indexAction()
    {
        $em = $this->getEntityManager();
        //$em->getRepository('Application\Entity\Personal')->findBy(array(), array('name' => 'ASC'));
        $mitarbeiter = $em->getRepository('Application\Entity\Personal')->findBy(array(), array('name' => 'ASC'));
        return new ViewModel(array('mitarbeiter' => $mitarbeiter,));
    }
    /**
     * Edit action
     *
     */
    public function editAction()
    {
        $Personal = new Personal();

        if ($this->params('id') > 0) {
            $Personal = @$this->getEntityManager()->getRepository('Application\Entity\Personal')->find($this->params('id'));
        }
        $form = new PersonalForm($this->getEntityManager());

        $form->setHydrator(new DoctrineEntity($this->getEntityManager(),'Application\Entity\Personal'));
        $form->bind($Personal);
        $request = $this->getRequest();
        if ($request->isPost()) {
            // $form->setInputFilter($Personal->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $em = $this->getEntityManager();
                $em->persist($Personal);
                $em->flush();
                $this->flashMessenger()->addSuccessMessage('Personal Saved');
                return $this->redirect()->toRoute('personal');
            } else {
                // Error-Meldung
            }
        }
        return new ViewModel(array(
            'ma' => $Personal,
            'form' => $form
        ));
    }
    /**
     * Add action
     *
     */
    public function addAction()
    {
        return $this->editAction();
    }
    /**
     * Delete action
     *
     */
    public function deleteAction()
    {
        $Personal = @$this->getEntityManager()->getRepository('Application\Entity\Personal')->find($this->params('id'));
        if ($Personal) {
            $em = $this->getEntityManager();
            $em->remove($Personal);
            $em->flush();
            $this->flashMessenger()->addSuccessMessage('Mitarbeiter entfernt');
        }
        return $this->redirect()->toRoute('personal');
    }
}