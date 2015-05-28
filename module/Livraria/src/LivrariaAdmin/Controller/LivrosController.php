<?php

namespace LivrariaAdmin\Controller;

use Zend\View\Model\ViewModel;

class LivrosController extends CrudController {
    
    public function __construct() {
        $this->setEntity("Livraria\Entity\Livro");
        $this->setForm("LivrariaAdmin\Form\Livro");
        $this->setService("Livraria\Service\Livro");
        $this->setController("livros");
        $this->setRoute("livraria-admin");
    }
    public function newAction() {
        $form = $this->getServiceLocator()->get($this->form);
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                
                $service->insert($request->getPost()->toArray());
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        
        return new ViewModel(array('form' => $form));
    }
    
    public function editAction() {
        $form = $this->getServiceLocator()->get($this->form);    
        $request = $this->getRequest();        
        
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute("id",0));
        
        if($this->params()->fromRoute("id",0))
            $form->setData($entity->toArray());

        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }       
        
        return new ViewModel(array('form' => $form));
    }
    
    
 }
