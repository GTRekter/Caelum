<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RaceController extends CI_Controller {

	public function addRace() {
		
		log_message('debug','[RaceController][insertRace] Start');

		$viewModel = new ExecutionViewModel();

		try {

			$raceDetails = $this->input->post("raceDetails");
			log_message('debug','[RaceController][addRace] raceDetails: ' . print_r($raceDetails, TRUE));


			$data = array(
				'name' => $this->security->xss_clean($raceDetails["Name"]),
				'description' => $this->security->xss_clean($raceDetails["Description"])
			);

			$this->load->model('RaceService');
			$this->RaceService->addRace($data);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][insertRace] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][insertRace] End');
		
		echo json_encode($viewModel);
	}

	public function updateRace() {
		
		log_message('debug','[RaceController][updateRace] Start');

		$viewModel = new ExecutionViewModel();

		try {

			$raceDetails = $this->input->post("raceDetails");
			log_message('debug','[RaceController][updateRace] raceDetails: ' . print_r($raceDetails, TRUE));

			$id = $this->security->xss_clean($raceDetails["Id"]);
			$data = array(
				'name' => $this->security->xss_clean($raceDetails["Name"]),
				'description' => $this->security->xss_clean($raceDetails["Description"])
			);

			$this->load->model('RaceService');
			$this->RaceService->updateRace($id, $data);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][updateRace] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][updateRace] End');
		
		echo json_encode($viewModel);
	}

    public function getRaces() {

		log_message('debug','[RaceController][getRaces] Start');

		$viewModel = new RacesViewModel();

		try {

			$this->load->model('RaceService');
			$limit = ($this->input->post('pageNumber') + 1) * $this->input->post('pageSize');
			log_message('debug','[RaceController][getRaces] limit: ' . print_r($limit, TRUE));

			$offset = $this->input->post('pageNumber') * $this->input->post('pageSize');
			log_message('debug','[RaceController][getRaces] offset: ' . print_r($offset, TRUE));

			$races = $this->RaceService->getRaces($limit, $offset);

			foreach($races as $race) {
				
				log_message('debug','[RaceController][getRaces] race: ' . print_r($race, TRUE));
	
				array_push(
					$viewModel->races, 
					new Race(
						$race->id,
						$race->name,
						$race->description
					));
			}
			$viewModel->pageSize = $this->input->post('pageSize');
			$viewModel->pageNumber = $this->input->post('pageNumber');
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][getRaces] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][getRaces] End');
		
		echo json_encode($viewModel);
	}

    public function getAllRaces() {
		
		log_message('debug','[RaceController][getAllRaces] Start');

		$viewModel = new RacesViewModel();

		try {

			$this->load->model('RaceService');
			$races = $this->RaceService->getAllRaces();

			foreach($races as $race) {
				
				log_message('debug','[RaceController][getAllRaces] race: ' . print_r($race, TRUE));
	
				array_push(
					$viewModel->races, 
					new Race(
						$race->id,
						$race->name,
						$race->description
					));
			}
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][getAllRaces] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][getAllRaces] End');
		
		echo json_encode($viewModel);
	}
	
	public function getRacesCount() {
		
		log_message('debug','[ColorController][getRacesCount] Start');

		$viewModel = new RacesCountViewModel();

		try {

			$this->load->model('RaceService');
			$racesCount = $this->RaceService->getRacesCount();

			$viewModel->racesCount = $racesCount->count;
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[ColorController[getRacesCount] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[ColorController][getRacesCount] End');
		
		echo json_encode($viewModel);
	}

	public function deleteRaces() {
		
		log_message('debug','[RaceController][deleteRaces] Start');

		$viewModel = new ExecutionViewModel();

		try {
			$ids = $this->security->xss_clean($this->input->post('ids'));
			log_message('debug','[RaceController][deleteRaces] ids: ' . print_r($ids, TRUE));

			$this->load->model('RaceService');
			$this->RaceService->deleteRaces($ids);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][deleteRaces] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][deleteRaces] End');
		
		echo json_encode($viewModel);
	}
}

/* ==== VIEWMODELs ==== */

class ExecutionViewModel {

	public $execution = false;
}

class RacesViewModel extends ExecutionViewModel {

	public $races = array();
}

class RacesCountViewModel extends ExecutionViewModel {

	public $racesCount;
}

class Race {

	public $id;
	public $name;
	public $description;

	public function __construct($id, $name, $description) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
	}
}
