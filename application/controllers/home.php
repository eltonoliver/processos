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
				 ->display_as('numeroEdital','Edital')->display_as('objetivo','Objetivo')
				 ->display_as('modalidade_id','Modalidade');
				 
		 	$crud->required_fields('descricao','data','numeroEdital','objetivo','idUsuario');
		 	$crud->set_subject('Processos Senac');
		 	$crud->fields('descricao','data','numeroEdital','objetivo','modalidade_id','status');
		 	 

		 	 $crud->field_type('status','dropdown',
          		  array('1' => 'Ativo', '2' => 'Inativo'));

		 	/*ACTIONS**/
		 	$crud->add_action('Editais', '', 'home/edital','ui-icon-plus');
		 	$crud->add_action('Anexos', '', 'home/anexos','ui-icon-plus');
		 	$crud->add_action('Resultados', '', 'home/resultados','ui-icon-plus');
		 	$crud->add_action('Adendos', '', 'home/adendos','ui-icon-plus');
		 	/*END ACTIONS**/ 
			$output = $crud->render();

			$this->template->load('index','templates/home',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);

		}
		

	}

	public function edital( $id = null ){

		try{

			$crud = new grocery_CRUD();
			$crud->set_subject('Edital');
			$crud->set_crud_url_path(site_url('home/edital'));			
			$crud->set_theme('datatables');
			$crud->set_table('edital');
			$crud->columns('edital','processo_id');
			$crud->add_fields('edital','processo_id');
			$crud->display_as('edital','Editais')->display_as('processo_id','Nº Processo');
			$crud->set_field_upload('edital','assets/arquivos/edital');

			
			 $state = $crud->getState();
   			 $state_info = $crud->getStateInfo();
			
   			 if($state == 'list'){
       		 	 $idProcesso = $this->uri->segment(3);
       			 $this->session->set_userdata('idProcesso',  $idProcesso);
			 }	
   			
			$crud->field_type('processo_id', 'hidden', $this->session->userdata('idProcesso'));


			$output = $crud->render();
			$this->template->load('index','templates/edital',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);


		}



	}

	public function anexos( $id = null ){
		try{

			$crud = new grocery_CRUD();
			$crud->set_subject('Anexos');
			$crud->set_crud_url_path(site_url('home/anexos'));			
			$crud->set_theme('datatables');
			$crud->set_table('anexos');
			$crud->columns('anexo','processo_id');
			$crud->add_fields('anexo','processo_id');
			$crud->display_as('enexo','Anexos')->display_as('processo_id','Nº Processo');
			$crud->set_field_upload('anexo','assets/arquivos/anexo');

			
			 $state = $crud->getState();
   			 $state_info = $crud->getStateInfo();
			
   			 if($state == 'list'){
       		 	 $idProcesso = $this->uri->segment(3);
       			 $this->session->set_userdata('idProcesso',  $idProcesso);
			 }	
   			
			$crud->field_type('processo_id', 'hidden', $this->session->userdata('idProcesso'));


			$output = $crud->render();
			$this->template->load('index','templates/anexo',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);


		}

	
	}

	public function resultados( $id = null ){
		try{

			$crud = new grocery_CRUD();
			$crud->set_subject('Resultados');
			$crud->set_crud_url_path(site_url('home/resultados'));			
			$crud->set_theme('datatables');
			$crud->set_table('resultados');
			$crud->columns('resultado','processo_id');
			$crud->add_fields('resultado','processo_id');
			$crud->display_as('resultado','Resultados')->display_as('processo_id','Nº Processo');
			$crud->set_field_upload('resultado','assets/arquivos/resultado');

			
			 $state = $crud->getState();
   			 $state_info = $crud->getStateInfo();
			
   			 if($state == 'list'){
       		 	 $idProcesso = $this->uri->segment(3);
       			 $this->session->set_userdata('idProcesso',  $idProcesso);
			 }	
   			
			$crud->field_type('processo_id', 'hidden', $this->session->userdata('idProcesso'));


			$output = $crud->render();
			$this->template->load('index','templates/resultado',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);


		}

	}

	public function adendos( $id = null){
		try{

			$crud = new grocery_CRUD();
			$crud->set_subject('Adendos');
			$crud->set_crud_url_path(site_url('home/adendos'));			
			$crud->set_theme('datatables');
			$crud->set_table('adendos');
			$crud->columns('adendos','processo_id');
			$crud->add_fields('adendos','processo_id');
			$crud->display_as('adendos','Adendos')->display_as('processo_id','Nº Processo');
			$crud->set_field_upload('adendos','assets/arquivos/adendo');

			
			 $state = $crud->getState();
   			 $state_info = $crud->getStateInfo();
			
   			 if($state == 'list'){
       		 	 $idProcesso = $this->uri->segment(3);
       			 $this->session->set_userdata('idProcesso',  $idProcesso);
			 }	
   			
			$crud->field_type('processo_id', 'hidden', $this->session->userdata('idProcesso'));


			$output = $crud->render();
			$this->template->load('index','templates/adendo',$output);	

		}catch(Exception $e){

			show_error("Erro :".$e->getMessage()." -  ".$e->getTraceAsString);


		}
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


	public function arquivosDownload(){


			$query = $this->db->query(

					'

							SELECT
							processo.numeroEdital,
							processo.descricao as processoDescricao,
							processo.`data`,
							processo.objetivo,
							resultados.resultado,
							modalidade.descricao as modalidadeDescricao,
							anexos.anexo,
							adendos.adendos,
							edital.processo_id,
							edital.edital
							FROM
							processo
							INNER JOIN resultados ON processo.id = resultados.processo_id
							INNER JOIN modalidade ON processo.modalidade_id = modalidade.id
							INNER JOIN anexos ON processo.id = anexos.processo_id
							INNER JOIN adendos ON processo.id = adendos.processo_id ,
							edital




					'


				)->result();





			$body = '

			<!DOCTYPE html>
			<html lang="en">
			<head>
			   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
			   <meta name="viewport" content="width=device-width, initial-scale=1.0">
			   <meta name="description" content="">
			   <meta name="keywords" content="">
			   <meta name="author" content="">
				<title> Download Arquivos </title>
				
				<style type="text/css"> body{ font-family: Arial; } </style>
			</head>
			<body>
			';

			foreach ($query as  $value) {
				$laco = '
					<p><strong>Modalidade :'.$value->.'</strong></p>
					<p><strong>Data de Abertura :'..'</strong></p>
					<p><strong>Nº. Processo:</strong></p>
					<p><strong>Objetivo :</strong></p><br>
					<p><strong>Arquivos :</strong></p>
					
				';
			}
				



		 $fimBody = '	
			</body>
			</html>



			';

				echo $body.$laco.$fimBody;
	}
}
        

