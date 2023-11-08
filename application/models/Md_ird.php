<?php

class Md_ird extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories()
    {
        $this->db->select('id, cat_id, cat_name_bn, cat_name_en, no_of_subcat, no_of_dua, cat_icon');
        $this->db->from(CATEGORY);
        return $this->db->get()->result_array();
    }
}
