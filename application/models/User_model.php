<?php
class User_model extends CI_Model {

    public function create_user($data) {
        $query = $this->db->query('SELECT MAX(user_id) AS last_user_id FROM users');
        $result = $query->row();
        $lastUserId = $result->last_user_id;

        // Increment user_id for the new row
        $newUserId = $lastUserId + 1;
        $data['user_id'] = $newUserId;

        $this->db->insert('pettrace.users',array(
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role_id' => $data['role_id'],
            'img_url' => $data['img_url']
        ));

        $this->db->insert('pettrace.user_roles_mapping',array(
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
            'password' => $data['password']
        ));
    }

    public function fetch_user($email){
        $query = $this->db->select('*')
            ->from('users')
            ->where('email', $email)
            ->get();
        
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null; 
        }
    }

}