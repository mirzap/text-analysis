<?php
namespace Data\Source;

/**
 * Description of URI
 *
 * @author dcardin
 */
class URI {
    
    protected $uriLocation = null;
    protected $searchPattern = null;
    protected $options = array();
    
    /**
     *
     * @param string $uriLocation 
     * @param string $searchPattern;
     * @params array $options
     */
    public function __construct($uriLocation, $searchPattern = null, $options = array()){ 
        $this->uriLocation = $uriLocation;
        $this->searchPattern = $searchPattern;
        $this->options = $options;
    }
    
    public function getUriLocation(){ 
        return $this->uriLocation;
    }
    
    public function getSearchPattern(){ 
        return $this->searchPattern;
    }
    
}

