<?php 

namespace App\libs\Item;


class ItemDto{
    private $_title;
    private $_description;

    public function __construct($title='',$description='')
    {
        $this->_title = $title;
        $this->_description = $description;
    }

    public function setTitle($title){
        $this->_title = $title;
    }

    public function getTitle(){
        return $this->_title ;
    }

    public function setDescription($description){
        $this->_description = $description;
    }

    public function getDescription(){
        $this->_description;
    }
}