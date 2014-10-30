<?php

abstract class Controller{
    protected $_vista;
    public function __construct() {
        $this->_vista = new Vista(new Request);
    }    
    abstract public function index();
}