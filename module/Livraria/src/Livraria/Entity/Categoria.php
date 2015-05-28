<?php

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 * @ORM\Entity(repositoryClass="Livraria\Entity\CategoriaRepository")
 */

class Categoria {
    
    public function __construct($options = null) {
        Configurator::configure($this,$options);
        $this->livros = new ArrayCollection();
    }
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    
    /**
     * @ORM\OneToMany(targetEntity="Livraria\Entity\Livro", mappedBy="categorias")
     * @var ArrayCollection 
     */
    protected $livros;
            
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getLivros() {
        return $this->livros;
    }

    function setLivros(ArrayCollection $livros) {
        $this->livros = $livros;
    }
    
    public function __toString() {
        return $this->nome;
    }
    
    public function toArray() {
        return array("id" => $this->getId(), "nome" => $this->getNome());
    }
}
