<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function getCategories(){
        $this->load->model('Category_model');

		$categories = $this->Category_model->get_categories();
        echo json_encode($categories);
        
    }
}