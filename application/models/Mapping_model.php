<?php
class Mapping_model extends CI_Model {

    public function fetch_mapping($user_id,$role_id){
        $query = $this->db->select('*')
            ->from('user_roles_mapping')
            ->where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            // No matching record found
            echo "Password not found";
        }
    }

}