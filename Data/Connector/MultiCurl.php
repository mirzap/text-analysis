<?php
namespace Data\Connector;

/**
 * Description of MultiCurl
 *
 * @author yooper
 */
class MultiCurl 
{
    protected $multiHandle = null;
    protected $curlResources = null;
    protected $data = array();
    protected $queueSize = 5;
    
    /**
     * @param array curlResources 
     */
    public function __construct(array $curlResources, $queueSize = 5)
    { 
        $this->curlResources = $curlResources;
        $this->queueSize = $queueSize;
        $this->multiHandle = curl_multi_init();
        
        foreach($this->curlResources as $curlResource){
            curl_multi_add_handle($this->multiHandle, $curlResource);
        }   
    }
    
    /**
     * exec 
     */
    public function run()
    {
        $index = 0;
        $active = null;
        do {
            $status = curl_multi_exec($this->multiHandle, $active);
            $info = curl_multi_info_read($this->multiHandle);

        } while ($status === CURLM_CALL_MULTI_PERFORM || $active);

        foreach ($this->curlResources as $curlResource) {
            
            $this->data[$index++] = curl_multi_getcontent($curlResource);
            
            if($index % $this->queueSize) {
                $this->offloadContent($data);
                $index = 0;
                $data = array();
                
            }
            
            curl_close($curlResource);
        }       
        
    }
    
    /**
     * Process the data by offloading it disk or a db etc...
     * @param array $data 
     */
    protected function offloadContent(array $data)
    {
        
        
    }
    
    
    public function __destruct()
    {        
        foreach($this->curlResources as $curlResource) { 
            curl_multi_remove_handle($this->multiHandle, $curlResource);
        }
        curl_multi_close($this->multiHandle);    
    }
       
    
}

