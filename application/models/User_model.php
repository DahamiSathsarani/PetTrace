<?php
class User_model extends CI_Model {

    public function create_user($data) {
        $query = $this->db->query('SELECT MAX(user_id) AS last_user_id FROM users');
        $result = $query->row();
        $lastUserId = $result->last_user_id;

        // Increment user_id for the new row
        $newUserId = $lastUserId + 1;
        $data['user_id'] = $newUserId;

        if($data['index'] == 1){
            $this->db->delete('pettrace.users', array('user_id' => $data['index']));  
        }

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

    public function updateUserData($user_id){
        $query = $this->db->select('*')
        ->from('pettrace.users')
        ->where('user_id',$user_id)
        ->get()
        ->result();

        return $query;
    }

    public function delete_user($user_id) {

        $this->db->trans_begin();
        $this->db->delete('pettrace.poster', array('user_id' => $user_id));
        $this->db->delete('pettrace.users', array('user_id' => $user_id));
        $this->db->delete('pettrace.user_roles_mapping', array('user_id' => $user_id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return array("status" => FALSE, "msg" => $this->fe->error());
        } else {
            $this->db->trans_commit();
            return array("status" => TRUE, "msg" => "User Delete successfully!");
        }
    }

}