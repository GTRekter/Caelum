<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	public function getConfiguration() 
	{
		log_message('debug','[getConfiguration] Start');

		$this->load->helper('directory');

		$configurationUrl = $this->config->item('configuration_url'); 
		log_message('debug','[getConfiguration] ConfigurationUrl: ' . $configurationUrl);

		$configurationMap = directory_map($configurationUrl, 0, TRUE);
		log_message('debug','[getConfiguration] Map: ' . print_r($configurationMap, TRUE));

		foreach ($configurationMap as $file) {
			$xmlFileContent = file_get_contents($configurationUrl . '/' . $file);
			log_message('debug','[getConfiguration] xmlFileContent: ' . $xmlFileContent);

			$xmlObject  = simplexml_load_string($xmlFileContent);
			log_message('debug','[getConfiguration] XmlObject : ' . print_r($xmlObject , TRUE));
		}

		log_message('debug','[getConfiguration] End');
	}

    public function getForms() 
	{
		log_message('debug','[getForms] Start');

		$this->load->helper('directory');

		$configurationUrl = $this->config->item('configuration_url'); 
		log_message('debug','[getForms] ConfigurationUrl: ' . $configurationUrl);

		$configurationMap = directory_map($configurationUrl, 0, TRUE);
		log_message('debug','[getForms] Map: ' . print_r($configurationMap, TRUE));

        for(var $index = 0; $index < $configurationMap.length; $index ++) 
        {
            if($configurationMap[$index] == "form.xml") {
                $xmlFileContent = file_get_contents($configurationUrl . '/' . $configurationMap[$index]);
                log_message('debug','[getForms] xmlFileContent: ' . $xmlFileContent);

                $xmlObject  = simplexml_load_string($xmlFileContent);
                log_message('debug','[getForms] XmlObject : ' . print_r($xmlObject , TRUE));
            }
		}

		log_message('debug','[getForm] End');
	}
    
    public function getForm($formName) 
	{
		log_message('debug','[getForm] Start');

		$this->load->helper('directory');

		$configurationUrl = $this->config->item('configuration_url'); 
		log_message('debug','[getForm] ConfigurationUrl: ' . $configurationUrl);

		$configurationMap = directory_map($configurationUrl, 0, TRUE);
		log_message('debug','[getForm] Map: ' . print_r($configurationMap, TRUE));

        for(var $index = 0; $index < $configurationMap.length; $index ++) 
        {
            if($configurationMap[$index] == "form.xml") {
                $xmlFileContent = file_get_contents($configurationUrl . '/' . $configurationMap[$index]);
                log_message('debug','[getForm] xmlFileContent: ' . $xmlFileContent);

                $xmlObject  = simplexml_load_string($xmlFileContent);
                log_message('debug','[getForm] XmlObject : ' . print_r($xmlObject , TRUE));
            }
		}

		log_message('debug','[getForm] End');
	}
}
