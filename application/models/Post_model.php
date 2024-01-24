<?php
class Post_model extends CI_Model {
    public function get_posts() {
        $dataset = $this->db->select('*')
        ->from('pettrace.poster')
        ->get()
        ->result();

        return $dataset;
    }
}