<?php
class Category_model extends CI_Model {
    public function get_categories() {
        $dataset = $this->db->select('*')
        ->from('pettrace.category')
        ->get()
        ->result();

        return $dataset;
    }

    public function getCategoryName($category_id) {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('category');

        if ($query->num_rows() > 0) {
            $category = $query->row_array();
            return $category['category_name'];
        } else {
            return '';
        }
    }
}