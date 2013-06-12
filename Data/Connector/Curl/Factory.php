<?php

namespace Data\Connector\Curl;

/**
 * Returns a curl resource
 *
 * @author yooper
 */
class Factory 
{    
    
    private function __construct(){}
    
    /**
     *
     * @param type $url
     * @param array $params 
     */
    static public function create($url, array $params = array())
    {
        if(!filter_var($url, FILTER_VALIDATE_URL)) { 
            throw new \Exception("Invalid URL $url");
        }
        
        $ch = curl_init($url);
        //setup the options
        foreach($params as $curlOpt => $curlOptValue) { 
            curl_setopt($ch, $curlOpt, $curlOptValue);
        }
    
        //return a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        
        return $ch;
    }
}

