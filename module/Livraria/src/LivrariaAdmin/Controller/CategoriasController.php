<?php

namespace LivrariaAdmin\Controller;


class CategoriasController extends CrudController {
    
    public function __construct() {
        $this->setEntity("Livraria\Entity\Categoria");
        $this->setForm("LivrariaAdmin\Form\Categoria");
        $this->setService("Livraria\Service\Categoria");
        $this->setController("categorias");
        $this->setRoute("livraria-admin");
    }
    
 }
