<?php

namespace LivrariaAdmin\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class Livro extends Form {
    
    protected $categorias; 
    
    public function __construct($name = null, $categorias = null) {
        parent::__construct('livro');
        $this->categorias = $categorias;
        
        $this->setAttribute('method', 'post');
        #$this->setAttribute('class', 'form-inline');
        $this->setAttribute('role', 'form');
        
        //$this->setInputFilter(new LivroFilter());
        
        $this->add(array(
           'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));
        
        $this->add(array(
           'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => "Nome"
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Entre com o nome',
                'class' => 'form-control'
            )
        ));
        
        $categoria = new Select();
        $categoria->setAttributes(array('class'=>'form-control', 'id' => 'categoria'))
                ->setName("categoria")
                ->setOptions(array(
                    'label' => "Categorias",
                    'label_attributes' => array('class' => 'control-label'),
                    'empty_option' => '',
                    'value_options' =>$this->categorias,
                )
        );
        $this->add($categoria);
        
        $this->add(array(
           'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => "ISBN"
            ),
            'attributes' => array(
                'id' => 'isbn',
                'placeholder' => 'Entre com o isbn',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
           'name' => 'autor',
            'options' => array(
                'type' => 'text',
                'label' => "Autor"
            ),
            'attributes' => array(
                'id' => 'autor',
                'placeholder' => 'Entre com o Autor',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
           'name' => 'valor',
            'options' => array(
                'type' => 'text',
                'label' => "Valor"
            ),
            'attributes' => array(
                'id' => 'valor',
                'placeholder' => 'Entre com o Valor',
                'class' => 'form-control'
            )
        ));
        
        $this->add(array(
           'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-success'
            )
        ));
    }      
    
}
