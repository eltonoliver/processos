<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('grocery_CRUD');


    }
   

    public function autoload(){
	
		$output = (object)array('output' => '' , 'js_files' => array() , 'css_files' => array());
		$this->template->load('index',$output);
	}

	public function lista( $id = null ){
		try{


			$crud = new grocery_CRUD();
			$crud->set_crud_url_path(site_url('home/lista'));			
			$crud->set_theme('flexigrid');
			$crud->set_table('processo');

			$output = $crud->render();

			$this->template->load('index','templates/home',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);


		}
		

	}
}
        

