<?php

// app/src/Service/ContainerParametersHelper.php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ContainerParametersHelper {
    
    private $params;
     
    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    /**
     * This method returns the root directory of your Symfony 4 project.
     * 
     * e.g "/var/www/vhosts/myapplication"
     * 
     * @return type
     */
    public function getApplicationRootDir(){
        return $this->params->get('kernel.project_dir');
    }

    /**
     * This method returns the value of the defined parameter.
     * 
     * @return type
     */
    public function getParameter($parameterName){
        return $this->params->get($parameterName);
    }
}
