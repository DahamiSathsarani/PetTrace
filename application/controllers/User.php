<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function createUser(){
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

        echo "password  ", $password;

        $this->load->model('User_model');
        $user = $this->User_model->fetch_user($email);

        if ($user) {
            $user_id = $user->user_id;
            $role_id = $user->role_id;

            $this->load->model('Mapping_model');
            $mapping = $this->Mapping_model->fetch_mapping($user_id,$role_id);
            $storedHashedPassword = $mapping->password;

            echo "storedHashedPassword  ", $storedHashedPassword;

            if (password_verify($password, $storedHashedPassword)) {
                echo "Login successful";
            } else {
                echo "Passwords do not match, login failed";
            }
        } else {
            echo "User not found";
        }

    }

}