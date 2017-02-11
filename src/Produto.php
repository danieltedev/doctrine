<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Daniel
 */
namespace app;
/**
 * 
 * @Entity
 * @Table(name="produto")
 */
class Produto {

    //put your code here
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    private $id;

    /**
     * @Column(type="string", length=50, name="nome")
     */
    private $nome;

    /**
     * @ManyToOne(targetEntity="Categoria")
     * @JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

}
