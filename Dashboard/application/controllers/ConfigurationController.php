<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigurationController extends CI_Controller {

    public function getForms() {
		log_message('debug','[getForms] Start');

		$this->load->helper('directory');

		$configurationUrl = $this->config->item('configuration_url'); 
		log_message('debug','[getForms] ConfigurationUrl: ' . $configurationUrl);

		$configurationMap = directory_map($configurationUrl, 0, TRUE);
		log_message('debug','[getForms] Map: ' . print_r($configurationMap, TRUE));

        for($index = 0; $index < $configurationMap.length; $index ++) 
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
    
    // public function getForm($formName) {
	// 	log_message('debug','[getForm] Start');

	// 	$this->load->helper('directory');

	// 	$configurationUrl = $this->config->item('configuration_url'); 
	// 	log_message('debug','[getForm] ConfigurationUrl: ' . $configurationUrl);

	// 	$configurationMap = directory_map($configurationUrl, 0, TRUE);
	// 	log_message('debug','[getForm] Map: ' . print_r($configurationMap, TRUE));

    //     for($index = 0; $index < $configurationMap.length; $index ++) 
    //     {
	// 		// Search the configurations files
    //         if($configurationMap[$index] == "form.xml") {
    //             $xmlFileContent = file_get_contents($configurationUrl . '/' . $configurationMap[$index]);
    //             log_message('debug','[getForm] xmlFileContent: ' . $xmlFileContent);

    //             $xmlObject  = simplexml_load_string($xmlFileContent);
    //             log_message('debug','[getForm] XmlObject : ' . print_r($xmlObject , TRUE));

	// 			// Search the Form
	// 			for($nodeIndex = 0; $nodeIndex < $xmlObject.partial.length; $nodeIndex++) {
	// 				if(k.name == $formName) {

	// 					log_message('debug','[getForm] End');

	// 					return k.properties;
	// 				}
	// 			}
    //         }
	// 	}

	// 	log_message('debug','[getForm] End');

	// 	throw new Exception("The configuration file or the form is not founded. Check the configuration file.")
	// }


	public function GetLayout() {

		log_message('debug','[getLayout] Start');

		$viewModel = new LayoutViewModel();
		
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		// Try to read the layout from the cache
		//if ($this->cache->apc->is_supported())
		//{
			//if (!$viewModel = $this->cache->apc->get('layout'))
			//{
				// Get the layout from the configuration
				$this->load->helper('directory');

				$configurationUrl = $this->config->item('configuration_url'); 
				log_message('debug','[getLayout] ConfigurationUrl: ' . $configurationUrl);

				$configurationMap = directory_map($configurationUrl, 0, TRUE);
				log_message('debug','[getLayout] Map: ' . print_r($configurationMap, TRUE));

				for($index = 0; $index < sizeof($configurationMap); $index ++) 
				{
					if($configurationMap[$index] == "layout.xml") {
						
						$xmlFilePath = $configurationUrl . '/' . $configurationMap[$index];
						// log_message('debug','[getSideNavbarSections] xmlFilePath: ' . $configurationUrl . '/' . $configurationMap[$index]);

						(string)$xmlFileContent = simplexml_load_file($xmlFilePath);
						// log_message('debug','[getSideNavbarSections] xmlFileContent: ' . print_r($xmlFileContent,TRUE));

						$json = json_encode($xmlFileContent);
						// log_message('debug','[getSideNavbarSections] json: ' . $json);

						$viewModel->setLayout($json);
						$viewModel->setExecution(true);

						// Save the layout
						//$this->cache->save('layout', $viewModel);

						break;
					}
				}
			//}
		//}

		log_message('debug','[getLayout] viewModel: ' . print_r($viewModel, TRUE));
		return $viewModel;

		log_message('debug','[getLayout] End');
	}

	public function GetSideNavbar() {

		log_message('debug','[GetSideNavbar] Start');

		$viewModel = new PartialViewModel();

		require_once($this->config->item('configuration_url') . '/layout.php');

		for($index = 0; $index < sizeof($layout->partials); $index++) {
			if($layout->partials[$index]->name == "SideNavbar") {
				$viewModel->partial = $layout->partials[$index];
				$viewModel->execution = true;

				log_message('debug','[getLayout] ViewModel: ' . print_r($viewModel, TRUE));
			}
		}

		log_message('debug','[GetSideNavbar] End');
		
		echo json_encode($viewModel);
	}

}


class ExecutionViewModel  {
	public $execution = false;
}

class PartialViewModel extends ExecutionViewModel
{
	public $partial;
}