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

    public function get_subcategories($category_id)
    {
        $this->db->select('id, cat_id, subcat_id, subcat_name_bn, subcat_name_en, no_of_dua');
        $this->db->from(SUB_CATEGORY);
        $this->db->where('cat_id', $category_id);
        return $this->db->get()->result_array();
    }

    public function get_duas()
    {
        $this->db->select('id, cat_id, subcat_id, dua_id, dua_name_bn, dua_name_en, top_bn, top_en, dua_arabic, dua_indopak, clean_arabic, transliteration_bn, transliteration_en, translation_bn, translation_en, bottom_bn, bottom_en, refference_bn, refference_en, audio');
        $this->db->from(DUA);
        return $this->db->get()->result_array();
    }
}
