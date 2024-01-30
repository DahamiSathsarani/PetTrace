<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Home.php");

class User extends Home {

    public function __construct() {
        parent::__construct();

        // Load the session library
        $this->load->library('session');
    }

    public function Profile(){
        $userDataParam = $this->input->get('userData');
        $userData = json_decode(urldecode($userDataParam), true);
        $data['userData'] = $userData;

        $user_id = isset($userData['user_id']) ? $userData['user_id'] : null;

        $this->load->model('Post_model');
        $result = $this->Post_model->get_posts_by_user_id($user_id);
        $data['userPosts'] = $this->Post_model->get_posts_by_user_id($user_id);

        $this->load->view('user_view', $data);
    }

    public function createUser($index){
        $fullName = $this->input->post('fullName');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirmPassword');

        $this->load->model('User_model');

        if($password == $confirmPassword){

            // Handle file upload
            if (!empty($_FILES['userProPic']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userProPic')) {
                $uploadData = $this->upload->data();
                $userProPic = $uploadData['file_name'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user = array(
                'full_name' => $fullName,
                'email' => $email,
                'mobile' => $phone,
                'role_id' => 2,
                'img_url' => $userProPic,
                'password' => $hashedPassword,
                'index' => $index,
            );

            $result = $this->User_model->create_user($user);
            echo "Registration successful";

            } else {
                $error = $this->upload->display_errors();
                // Handle file upload error
                echo "Error during file upload: " . $error;
            }
        } else {
            // Handle the case when no profile picture is selected
            echo "Please select a profile picture";
        }
        }
        
    }

    public function userLogin(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $this->load->model('User_model');
        $user = $this->User_model->fetch_user($email);
    
        if ($user) {
            $user_id = $user->user_id;
            $role_id = $user->role_id;
    
            $this->load->model('Mapping_model');
            $mapping = $this->Mapping_model->fetch_mapping($user_id,$role_id);
            $storedHashedPassword = $mapping->password;
    
            if (password_verify($password, $storedHashedPassword)) {
    
                $response = array(
                    'success' => true,
                    'message' => 'Login successful',
                    'user' => $user,
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Passwords do not match',
                    'user' => array()
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'User not found',
                'user' => array()
            );
        }
    
        // Set the correct Content-Type header for JSON
        header('Content-Type: application/json');

        //$this->user_dashboard($response);
        
        // Output the JSON-encoded user portion of the response
        echo json_encode($response);
        
    }

    public function updateData($id){
        $this->load->model('User_model');
        $userId = $id;
        $result = $this->User_model->updateUserData($userId);

        $result = json_decode(json_encode($result),true);
        $data['userData'] = $result;

        $this->load->view('update_user_view',$data);
    }
    

}