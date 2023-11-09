<?php
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH .'/libraries/REST_Controller.php');


class Cn_ird extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories_subcategories_get()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $input_data = $this->security->xss_clean($this->input->post());

            $categories = $this->Md_ird->get_categories();

            if (!empty($categories)) {
                $result = array();
    
                foreach ($categories as $category) {
                    $category_id = $category['cat_id'];
    
                    $subcategories = $this->Md_ird->get_subcategories($category_id);
    
                    $category['subcategories'] = $subcategories;
    
                    $result[] = $category;
                }
    
                $this->response(array(
                    "status" => 200,
                    "message" => "Successfully obtained all categories",
                    "data"=>$result
                ), REST_Controller::HTTP_OK);
            } else {
                $this->response(array(
                    "status" => 405,
                    "message" => "Method not allowed"
                ), REST_Controller::HTTP_METHOD_NOT_ALLOWED);
            }
        }
    }

    public function get_all_duas_get()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $input_data = $this->security->xss_clean($this->input->post());

            $duas = $this->Md_ird->get_duas();
    
            $this->response(array(
                "status" => 200,
                "message" => "Successfully obtained all duas",
                "data"=>$duas
            ), REST_Controller::HTTP_OK);
        } else {
            $this->response(array(
                "status" => 405,
                "message" => "Method not allowed"
            ), REST_Controller::HTTP_METHOD_NOT_ALLOWED);
        }
    }
}
