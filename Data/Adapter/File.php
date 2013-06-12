<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author dcardin
 */
class File {
    
    protected $params = array();

    public function __construct(array $params)
    {
        $this->params = $params;
    }
    
    public function consumeContent($content)
    {
        
    }
    
}
