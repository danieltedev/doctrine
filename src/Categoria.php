<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Daniel
 */

namespace app;

/**
 * 
 * @Entity
 * @Table(name="categoria")
 */
class Categoria {

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

}
