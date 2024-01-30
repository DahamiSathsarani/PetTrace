<?php
class Post_model extends CI_Model {
    public function get_posts() {
        $dataset = $this->db->select('*')
        ->from('pettrace.poster')
        ->get()
        ->result();

        return $dataset;
    }

    public function create_post($data) {
        $query = $this->db->query('SELECT MAX(poster_id) AS last_post_id FROM poster');
        $result = $query->row();
        $lastPostId = $result->last_post_id;

        // Increment post_id for the new row
        $newPostId = $lastPostId + 1;
        $data['post_id'] = $newPostId;

        $this->db->insert('pettrace.poster',array(
            'poster_id' => $data['post_id'],
            'user_id' => $data['user_id'],
            'pet_name' => $data['pet_name'],
            'category_id' => $data['category_id'],
            'breed' => $data['breed'],
            'color' => $data['color'],
            'lost_date' => $data['lost_date'],
            'description' => $data['description'],
            'img_url' => $data['img_url'],
            'status' => $data['status'],
            'timestamp' => $data['timestamp']
        ));

    }
}