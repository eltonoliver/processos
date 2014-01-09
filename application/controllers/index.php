<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {

        parent::__construct();
        /*********************************/
        /*CHAMA LIBRARY CRUD*/

        $this->load->library('grocery_CRUD');


    }
   

    public function home(){
	
		$output = (object)array('output' => '' , 'js_files' => array() , 'css_files' => array());
		$this->template->load('index',$output);
	}

	
}
        

