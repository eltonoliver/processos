<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->library('grocery_CRUD');
        $this->load->model('processo_model');


    }
   

    public function autoload(){
	
		$output = (object)array('output' => '' , 'js_files' => array() , 'css_files' => array());
		$this->template->load('index',$output);
	}

	public function lista( $id = null ){
		try{

			$crud = new grocery_CRUD();

			$crud->set_crud_url_path(site_url('home/lista'));			
			$crud->set_theme('datatables');
			$crud->set_table('processo');
			$crud->add_fields('descricao','data','numeroEdital','objetivo','modalidade_id');
			$crud->columns('descricao','data','numeroEdital','objetivo','modalidade_id');
			$crud->set_relation('modalidade_id','modalidade','descricao');
			$crud->display_as('descricao','Descrição')->display_as('data','Data')
				 ->display_as('numeroEdital','Número do Edital')->display_as('objetivo','Objetivo')
				 ->display_as('modalidade_id','Modalidade');
				 
		 	$crud->required_fields('descricao','data','numeroEdital','objetivo','idUsuario');
		 	$crud->set_subject('Processos Senac');
		 	$crud->fields('descricao','data','numeroEdital','objetivo','modalidade_id','status');
		 	 

		 	 $crud->field_type('status','dropdown',
          		  array('1' => 'Ativo', '2' => 'Inativo'));

		 	/*ACTIONS**/
		 	$crud->add_action('Editais', '', 'demo/action_more','ui-icon-plus');
		 	$crud->add_action('Anexos', '', 'demo/action_more','ui-icon-plus');
		 	$crud->add_action('Resultados', '', 'demo/action_more','ui-icon-plus');
		 	$crud->add_action('Adendos', '', 'demo/action_more','ui-icon-plus');
		 	/*END ACTIONS**/ 
			$output = $crud->render();

			$this->template->load('index','templates/home',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);

		}
		

	}

	public function edital( $id = null ){



	}

	public function anexos( $id = null ){
		# code...
	
	}

	public function resultados( $id = null ){
		# code...
	}

	public function adendos( $id = null){
		# code...
	}



	/*RECUPERAR O ULTIMO ID*/
	public function getLastId(){
		try{
			 $id = "";	
			 $this->db->order_by("id", "desc"); 	
			 $this->db->select('id');
			 $this->db->limit(1); 	
			 $lastId = $this->db->get('processo')->result();
				foreach ($lastId as $key => $value) {
					echo $value->id;
				}
			
			}catch(Exception $e){

					echo "Error : ".$e->getMessage();

			}
	}
}
        

