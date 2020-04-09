<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Delete_mahasiswa extends REST_controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Mahasiswa_model','mahasiswa');
	}

public function index_delete(){

		$npm = $this->delete('npm');

		if ($npm === null) {

			 $this->response([
                    'status' => false,
                    'message' => 'npm kosong, masukan npm'
                ], REST_Controller::HTTP_BAD_REQUEST);

		}else {

			if($this->mahasiswa->deleteMahasiswa($npm) > 0){
				
				 $this->response([
                    'status' => true,
                    'id' => $npm, 
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);

			}else{

				 $this->response([
                    'status' => false,
                    'message' => 'npm not found'
                ], REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}
}
