<?php
class Post extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function getPosts() {

        $this->load->view('post_view');

        $this->load->model('Post_model');
        $data['posts'] = $this->Post_model->get_posts();

		$$post = $this->Post_model->get_posts();
        $post = json_decode(json_encode($post),true);
        $data['posts'] = $post;

        $this->load->view('homepage', $data);
    }

    public function createPost() {
        $user_id = $this->input->post('user_id');
        $petName = $this->input->post('petName');
        $category = $this->input->post('category');
        $breed = $this->input->post('breed');
        $color = $this->input->post('color');
        $date = $this->input->post('date');
        $description = $this->input->post('description');
        $createdDate = date('Y-m-d');

        $this->load->model('Post_model');

            // Handle file upload
            if (!empty($_FILES['petPic']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('petPic')) {
                $uploadData = $this->upload->data();
                $petPic = $uploadData['file_name'];

            $post = array(
                'user_id' => $user_id,
                'pet_name' => $petName,
                'category_id' => $category,
                'breed' => $breed,
                'color' => $color,
                'lost_date' => $date,
                'description' => $description,
                'img_url' => $petPic,
                'status' => 'NOT APPROVED',
                'timestamp' => $createdDate,
            );

            $result = $this->Post_model->create_post($post);
            echo "Added successful";

            } else {
                $error = $this->upload->display_errors();
                // Handle file upload error
                echo "Error during file upload: " . $error;
            }
        } else {
            // Handle the case when no picture is selected
            echo "Please select a picture";
        }
        
    }
}