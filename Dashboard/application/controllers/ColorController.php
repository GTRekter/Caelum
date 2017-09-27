<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ColorController extends CI_Controller {

	public function addColor() {
		
		log_message('debug','[ColorController][insertColor] Start');

		$viewModel = new ExecutionViewModel();

		try {
			
			$colorDetails = $this->input->post("colorDetails");
			log_message('debug','[ColorController][insertColor] colorDetails: ' . print_r($colorDetails, TRUE));

			$data = array(
				'name' => $this->security->xss_clean($colorDetails["Name"])
			);

			$this->load->model('ColorService');
			$this->ColorService->addColor($data);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[ColorController][insertColor] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[ColorController][insertColor] End');
		
		echo json_encode($viewModel);
	}

	public function updateColor() {
		
		log_message('debug','[RaceController][updateColor] Start');

		$viewModel = new ExecutionViewModel();

		try {

			$colorDetails = $this->input->post("colorDetails");
			log_message('debug','[RaceController][updateColor] colorDetails: ' . print_r($colorDetails, TRUE));

			$id = $this->security->xss_clean($colorDetails["Id"]);
			$data = array(
				'name' => $this->security->xss_clean($colorDetails["Name"])
			);

			$this->load->model('ColorService');
			$this->ColorService->updateColor($id, $data);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[RaceController][updateColor] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[RaceController][updateColor] End');
		
		echo json_encode($viewModel);
	}

    public function getColors() {

		log_message('debug','[DogController][getColors] Start');

		$viewModel = new ColorsViewModel();

		try {

			$this->load->model('ColorService');
			$limit = ($this->input->post('pageNumber') + 1) * $this->input->post('pageSize');
			log_message('debug','[DogController][getColors] limit: ' . print_r($limit, TRUE));

			$offset = $this->input->post('pageNumber') * $this->input->post('pageSize');
			log_message('debug','[DogController][getColors] offset: ' . print_r($offset, TRUE));

			$colors = $this->ColorService->getColors($limit, $offset);

			foreach($colors as $color) {
				
				log_message('debug','[DogController][getColors] color: ' . print_r($color, TRUE));
	
				array_push(
					$viewModel->colors, 
					new Color(
						$color->id,
						$color->name
					));
			}
			$viewModel->pageSize = $this->input->post('pageSize');
			$viewModel->pageNumber = $this->input->post('pageNumber');
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController[getColors] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getColors] End');
		
		echo json_encode($viewModel);
	}

	public function getAllColors() {
		
		log_message('debug','[DogController][getAllColors] Start');

		$viewModel = new ColorsViewModel();

		try {

			$this->load->model('ColorService');
			$colors = $this->ColorService->getAllColors();

			foreach($colors as $color) {
				
				log_message('debug','[DogController][getAllColors] color: ' . print_r($color, TRUE));
	
				array_push(
					$viewModel->colors, 
					new Color(
						$color->id,
						$color->name
					));
			}
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController[getAllColors] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getAllColors] End');
		
		echo json_encode($viewModel);
	}
	
	public function getColorsCount() {
		
		log_message('debug','[ColorController][getColorsCount] Start');

		$viewModel = new ColorsCountViewModel();

		try {

			$this->load->model('ColorService');
			$colorsCount = $this->ColorService->getColorsCount();

			$viewModel->colorsCount = $colorsCount->count;
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[ColorController[getColorsCount] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[ColorController][getColorsCount] End');
		
		echo json_encode($viewModel);
	}

	public function deleteColors() {
		
		log_message('debug','[ColorController][deleteColors] Start');

		$viewModel = new ExecutionViewModel();

		try {
			$ids = $this->security->xss_clean($this->input->post('ids'));
			log_message('debug','[ColorController][deleteColors] ids: ' . print_r($id, TRUE));

			$this->load->model('ColorService');
			$this->ColorService->deleteColors($ids);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[ColorController][deleteColors] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[ColorController][deleteColors] End');
		
		echo json_encode($viewModel);
	}
}

/* ==== VIEWMODELs ==== */

class ExecutionViewModel {

	public $execution = false;
}

class ColorsViewModel extends ExecutionViewModel {

	public $colors = array();
}

class ColorsCountViewModel extends ExecutionViewModel {

	public $colorsCount;
}

class Color {

	public $id;
	public $name;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;;
	}
}
