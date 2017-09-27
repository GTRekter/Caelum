<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DogController extends CI_Controller {

	public function addDog() {
		
		log_message('debug','[DogController][addDog] Start');

		$viewModel = new AddDogViewModel();

		try {

			$dogDetails = $this->input->post("dogDetails");
			log_message('debug','[DogController][addDog] dogDetails: ' . print_r($dogDetails, TRUE));

			// handle the different format of dates
			$dateofBirth = date("Y-m-d", strtotime($this->security->xss_clean($dogDetails["DateOfBirth"])));

			$data = array(
				'name' => $this->security->xss_clean($dogDetails["Name"]),
				'description' => $this->security->xss_clean($dogDetails["Description"]),
				'gender' => $this->security->xss_clean($this->input->post("idGender")),
				'dateOfBirth' => $dateofBirth,
				'roi' => $this->security->xss_clean($dogDetails["Roi"]),
				'microchip' => $this->security->xss_clean($dogDetails["Microchip"]),
				'idRace' => $this->security->xss_clean( $this->input->post("idRace")),
				'idColor' => $this->security->xss_clean( $this->input->post("idColor")),
			);

			$this->load->model('DogService');
			$id = $this->DogService->addDog($data);

			$viewModel->idDog = $id;
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][addDog] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][addDog] End');
		
		echo json_encode($viewModel);
	}

	public function updateDog() {
		
		log_message('debug','[DogController][updateDog] Start');

		$viewModel = new ExecutionViewModel();

		try {

			$dogDetails = $this->input->post("dogDetails");
			log_message('debug','[DogController][updateDog] dogDetails: ' . print_r($dogDetails, TRUE));

			// handle the different format of dates
			$dateofBirth = date("Y-m-d", strtotime($this->security->xss_clean($dogDetails["DateOfBirth"])));
			
			$id = $this->security->xss_clean($dogDetails["Id"]);
			$data = array(
				'name' => $this->security->xss_clean($dogDetails["Name"]),
				'description' => $this->security->xss_clean($dogDetails["Description"]),
				'gender' => $this->security->xss_clean($this->input->post("idGender")),
				'dateOfBirth' => $dateofBirth,
				'roi' => $this->security->xss_clean($dogDetails["Roi"]),
				'microchip' => $this->security->xss_clean($dogDetails["Microchip"]),
				'idRace' => $this->security->xss_clean( $this->input->post("idRace")),
				'idColor' => $this->security->xss_clean( $this->input->post("idColor")),
			);

			$this->load->model('DogService');
			$this->DogService->updateDog($id, $data);

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][updateDog] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][updateDog] End');
		
		echo json_encode($viewModel);
	}

	public function addDogImages() {
		
		log_message('debug','[DogController][addDogImages] Start');

		$viewModel = new ExecutionViewModel();

		try {

			log_message('debug','[DogController][addDogImages] $_POST: ' . print_r($_POST ,TRUE));
			log_message('debug','[DogController][addDogImages] $_FILES: ' . print_r($_FILES ,TRUE));

			$idDog = $this->security->xss_clean($this->input->post("idDog"));
			$count = count($_FILES['images']['name']);

			$this->load->model('DogService');
			for ($i = 0; $i < $count; $i++) {
				log_message('debug','[DogController][addDogImages] Name: '.$_FILES['images']['name'][$i]);

				// image upload
				$target_file = "contents/images/dogs/" . basename($_FILES["images"]["name"][$i]);
				move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);

				// database update
				$data = array(
					'idDog' => $idDog,
					'name' => $_FILES["images"]["name"][$i],
					'primary' => false,
					'path' => $target_file
				);
				$this->load->model('DogService');
				$id = $this->DogService->addDogImage($data);

				log_message('debug','[DogController][addDogImages] target file: ' . print_r($target_file, TRUE));
			}

			$viewModel->execution = true;

		} catch(Exception $e) {

			log_message('debug','[DogController][addDogImages] error: ' . print_r($e, TRUE));
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][addDogImages] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][addDogImages] End');
		
		echo json_encode($viewModel);
	}

	public function updateDogImages() {
		
		log_message('debug','[DogController][updateDogImages] Start');

		$viewModel = new ExecutionViewModel();

		try {

			log_message('debug','[DogController][updateDogImages] $_POST: ' . print_r($_POST ,TRUE));
			log_message('debug','[DogController][updateDogImages] $_FILES: ' . print_r($_FILES ,TRUE));

			$idDog = $this->security->xss_clean($this->input->post("idDog"));
			$idImagesToDelete = $this->security->xss_clean($this->input->post("idImagesToDelete"));
			$imagesToAddCount = count($_FILES['images']['name']);

			$this->load->model('DogService');
			for ($i = 0; $i < $imagesToAddCount; $i++) {
				log_message('debug','[DogController][addDogImages] Name: '.$_FILES['images']['name'][$i]);

				// image upload
				$target_file = "contents/images/dogs/" . basename($_FILES["images"]["name"][$i]);
				move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);

				// database update
				$data = array(
					'idDog' => $idDog,
					'name' => $_FILES["images"]["name"][$i],
					'primary' => false,
					'path' => $target_file
				);
				$this->load->model('DogService');
				$id = $this->DogService->addDogImage($data);

				log_message('debug','[DogController][addDogImages] target file: ' . print_r($target_file, TRUE));
			}

			for ($i = 0; $i < $idImagesToDelete; $i++) {

				log_message('debug','[DogController][updateDogImages] image to delete: ' . print_r($idImagesToDelete, TRUE));

				$this->load->model('DogService');
				$id = $this->DogService->deleteDogImage($idImagesToDelete[$i]);

				log_message('debug','[DogController][updateDogImages] target file: ' . print_r($target_file, TRUE));
			}

			$viewModel->execution = true;

		} catch(Exception $e) {

			log_message('debug','[DogController][updateDogImages] error: ' . print_r($e, TRUE));
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][updateDogImages] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][updateDogImages] End');
		
		echo json_encode($viewModel);
	}

	public function updateDogPedigree() {
		
		log_message('debug','[DogController][updateDogPedigree] Start');

		$viewModel = new ExecutionViewModel();

		try {

			log_message('debug','[DogController][updateDogPedigree] $_POST: ' . print_r($_POST ,TRUE));
			log_message('debug','[DogController][updateDogPedigree] $_FILES: ' . print_r($_FILES ,TRUE));

			$idDog = $this->security->xss_clean($this->input->post("idDog"));

			$this->load->model('DogService');

			// Remove old pedegree
			$oldPedegree = $this->DogService->getDogPedigree($id);
			if($oldPedegree != null) {
				$this->DogService->removeDogPedigree($oldPedegree->id);
			}
		
			// image upload
			log_message('debug','[DogController][updateDogPedigree] Name: '.$_FILES['pedigree']['name']);	
			$target_file = "contents/images/pedigrees/" . basename($_FILES["pedigree"]["name"]);	
			log_message('debug','[DogController][updateDogPedigree] target file: ' . print_r($target_file, TRUE));	
			move_uploaded_file($_FILES["pedigree"]["tmp_name"], $target_file);

			// database update
			$data = array(
				'idDog' => $idDog,
				'name' => $_FILES["pedigree"]["name"],
				'path' => $target_file
			);
			$this->DogService->addDogPedigree($data);

			$viewModel->execution = true;

		} catch(Exception $e) {

			log_message('debug','[DogController][updateDogPedigree] error: ' . print_r($e, TRUE));
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][updateDogPedigree] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][updateDogPedigree] End');
		
		echo json_encode($viewModel);
	}

	public function getDogsCount() {
		
		log_message('debug','[DogController][getDogsCount] Start');

		$viewModel = new DogsCountViewModel();

		try {

			$this->load->model('DogService');
			$dogsCount = $this->DogService->getDogsCount();

			$viewModel->dogsCount = $dogsCount->count;
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogsCount] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogsCount] End');
		
		echo json_encode($viewModel);
	}

    public function getDogs() {

		log_message('debug','[DogController][getDogs] Start');

		$viewModel = new DogsViewModel();

		try {

			$this->load->model('DogService');
			$limit = ($this->input->post('pageNumber') + 1) * $this->input->post('pageSize');
			$offset = $this->input->post('pageNumber') * $this->input->post('pageSize');
			$dogs = $this->DogService->getDogs($limit, $offset);
			
			foreach($dogs as $dog) {
				
				log_message('debug','[DogController][getDogs] dog: ' . print_r($dog, TRUE));
				
				// handle the different format of dates
				$dateofBirth = date("d/m/Y", strtotime($dog->dateofbirth));
			

				$dogToAdd = new Dog();
				$dogToAdd->setProperties(
					$dog->id,
					$dog->name, 
					$dog->description,	
					$dog->gender, 
					$dog->race, 
					$dog->color, 
					$dog->dateofbirth, 
					$dog->roi, 
					$dog->microchip);

				array_push($viewModel->dogs, $dogToAdd);
			}
			$viewModel->pageSize = $this->input->get('pageSize');
			$viewModel->pageNumber = $this->input->get('pageNumber');
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogs] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogs] End');
		
		echo json_encode($viewModel);
	}

    public function getDogsByRaces() {

		log_message('debug','[DogController][getDogsByRaces] Start');

		$viewModel = new DogsViewModel();

		try {
			$ids = $this->input->post('ids');
			log_message('debug','[DogController][getDogsByRaces] ids: ' . print_r($ids, TRUE));

			$this->load->model('DogService');
			$dogs = $this->DogService->getDogsByRaces($ids);

			foreach($dogs as $dog) {
				
				log_message('debug','[DogController][getDogsByRaces] dog: ' . print_r($dog, TRUE));
				
				$dogToAdd = new Dog();		
				$dogToAdd->id = $dog->id;
				$dogToAdd->name = $dog->name;
				$dogToAdd->race = $dog->race;

				array_push($viewModel->dogs, $dogToAdd);
			}
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogsByRaces] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogsByRaces] End');
		
		echo json_encode($viewModel);
	}

	public function getDogsByColors() {
		
		log_message('debug','[DogController][getDogsByColors] Start');

		$viewModel = new DogsViewModel();

		try {
			$ids = $this->input->post('ids');
			log_message('debug','[DogController][getDogsByColors] ids: ' . print_r($ids, TRUE));

			$this->load->model('DogService');
			$dogs = $this->DogService->getDogsByColors($ids);

			foreach($dogs as $dog) {
				
				log_message('debug','[DogController][getDogsByColors] dog: ' . print_r($dog, TRUE));
				
				$dogToAdd = new Dog();		
				$dogToAdd->id = $dog->id;
				$dogToAdd->name = $dog->name;
				$dogToAdd->race = $dog->race;

				array_push($viewModel->dogs, $dogToAdd);
			}
			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogsByColors] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogsByColors] End');
		
		echo json_encode($viewModel);
	}
		
	public function getDogImages() {

		log_message('debug','[DogController][getDogImages] Start');

		$viewModel = new DogImagesViewModel();

		try {
			$idDog = $this->input->post('idDog');
			
			$this->load->model('DogService');
			$images = $this->DogService->getDogImages($idDog);

			foreach($images as $image) {
				
				log_message('debug','[DogController][getDogImages] image: ' . print_r($image, TRUE));

				$imageToAdd = new Image();
				$imageToAdd->setProperties(
					$image->id,
					$image->name, 
					$image->primary,	
					"http://".$_SERVER['SERVER_NAME']."/".$image->path);

				array_push($viewModel->images, $imageToAdd);
			}

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogImages] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogImages] End');
		
		echo json_encode($viewModel);
	}	
	
	public function getDogPedigree() {

		log_message('debug','[DogController][getDogPedegree] Start');

		$viewModel = new DogPedegreeViewModel();

		try {
			$idDog = $this->input->post('idDog');
			
			$this->load->model('DogService');
			$images = $this->DogService->getDogPedegree($idDog);

			log_message('debug','[DogController][getDogPedegree] image: ' . print_r($image, TRUE));

			$pedigreeToAdd = new Pedegree();
			$pedigreeToAdd->setProperties(
				$image->id,
				$image->name,	
				"http://".$_SERVER['SERVER_NAME']."/".$image->path);
			
			$viewModel->pedegree = $pedigreeToAdd;

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][getDogPedegree] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][getDogPedegree] End');
		
		echo json_encode($viewModel);
	}	

	public function deleteDogs() {
		
		log_message('debug','[DogController][deleteDogs] Start');

		$viewModel = new ExecutionViewModel();

		try {
			$ids = $this->security->xss_clean($this->input->post('ids'));
			log_message('debug','[DogController][deleteDogs] ids: ' . print_r($ids, TRUE));

			$this->load->model('DogService');
			
			foreach($ids as $id) {
				
				// remove all images
				$images = $this->DogService->getDogImages($id);	
				foreach($images as $image) {
					
					log_message('debug','[DogController][deleteDogs] image: ' . print_r($image, TRUE));
					$this->DogService->deleteDogImage($image->id);
				}

				// remove pedigree
				$pedigree = $this->DogService->getDogPedigree($id);	
				if($pedigree != null) {
					
					log_message('debug','[DogController][deleteDogs] pedigree: ' . print_r($pedigree, TRUE));
					$this->DogService->deleteDogPedigree($pedigree->id);
				}
				
				$this->DogService->deleteDog($id);
			}

			$viewModel->execution = true;

		} catch(Exception $e) {
			$viewModel->execution = false;
		}

		log_message('debug','[DogController][deleteDogs] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[DogController][deleteDogs] End');
		
		echo json_encode($viewModel);
	}
}

/* ==== VIEWMODELs ==== */

class ExecutionViewModel {

	public $execution = false;
}

class AddDogViewModel extends ExecutionViewModel {

	public $idDog;
}

class DogsViewModel extends ExecutionViewModel {

	public $pageSize;
	
	public $pageNumber;

	public $dogs = array();
}

class DogImagesViewModel extends ExecutionViewModel {
	
	public $images = array();
}

class DogPedegreeViewModel extends ExecutionViewModel {
	
	public $pedegree;
}

class DogsCountViewModel extends ExecutionViewModel {

	public $dogsCount;
}

class Dog {

	public $id;
	public $name;
	public $description;
	public $gender;
	public $race;
	public $color;
	public $dateOfBirth;
	public $roi;
	public $microchip;
	public $colors;

	public function __construct() {
	}

	public function setProperties($id, $name, $description, $gender, $race, 
		$color, $dateOfBirth, $roi, $microchip) {

			$this->id = $id;
			$this->name = $name;
			$this->description = $description;
			$this->gender = $gender;
			$this->race = $race;
			$this->color = $color;
			$this->dateOfBirth = $dateOfBirth;
			$this->roi = $roi;
			$this->microchip = $microchip;
	}
}

class Image {

	public $id;
	public $name;
	public $primary;
	public $path;

	public function __construct() {
	}

	public function setProperties($id, $name, $primary, $path) {

			$this->id = $id;
			$this->name = $name;
			$this->primary = $primary;
			$this->path = $path;
	}
}

class Pedegree {

	public $id;
	public $name;
	public $path;

	public function __construct() {
	}

	public function setProperties($id, $name, $path) {

			$this->id = $id;
			$this->name = $name;
			$this->path = $path;
	}
}