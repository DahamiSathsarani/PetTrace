<?php
class Category_model extends CI_Model {
    public function get_categories() {
        $dataset = $this->db->select('*')
        ->from('pettrace.category')
        ->get()
        ->result();

        return $dataset;
    }
}