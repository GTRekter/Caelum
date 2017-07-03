<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigurationController extends CI_Controller {


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
			// Search the configurations files
            if($configurationMap[$index] == "form.xml") {
                $xmlFileContent = file_get_contents($configurationUrl . '/' . $configurationMap[$index]);
                log_message('debug','[getForm] xmlFileContent: ' . $xmlFileContent);

                $xmlObject  = simplexml_load_string($xmlFileContent);
                log_message('debug','[getForm] XmlObject : ' . print_r($xmlObject , TRUE));

				// Search the Form
				for(var k = 0; k < $xmlObject.fomrs.length; k++) {
					if(k.name == $formName) {

						log_message('debug','[getForm] End');

						return k.properties;
					}
				}
            }
		}

		log_message('debug','[getForm] End');

		throw new Exception("The configuration file or the form is not founded. Check the configuration file.")
	}
}
