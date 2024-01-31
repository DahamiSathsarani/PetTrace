<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    .background{
      width: 100%;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .image{
      width: 40%;
      height: 100%;
    }

    img{
      height: 100%;
    }

    .register_card{
      width: 60%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .registerForm{
      width: 70%;
      height: 90%;
    }

    .RegisterHeader{
      width: 100%;
      height: 20%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .RegisterContent{
      width: 100%;
      height: 60%;
    }

    label{
      margin-top: 10px;
    }

    input{
      width: 100%;
      height: 20%;
      background-color:
    }

    select{
        color: black;
        width: 30%;
    }

    .RegisterButton{
      width: 100%;
      height: 20%;
      margin-top: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .uploadButton{
      width: 18%;
      height: 28px;
    }
    .footer{
        width: 100%;
        background-color: #6504b5;
        display: flex;
        justify-content: center;
        padding: 20px 0;
    }

    i{
        color: #fff;
        font-size: 30px;
    }

    button{
      width: 20%;
      height: 40px;
      background-color: #6504b5;
      color: #FFF;
      border: none;
      border-radius: 5px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6504b5;">
    <div class="container">
      <div style="width: 80%; border-right: solid #fff">
        <a class="navbar-brand" href="<?= base_url('index.php/homepage');?>">PetTrace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div style="width: 20%;">
        <a id="userName" class="navbar-brand m-3" href="#"></a>
        <a class="navbar-brand m-3" href="<?= base_url('index.php/signin');?>">Sign Out</a>
      </div>
    </div>
</nav>

<div class="background">
  <div class="register_card">
    <div class="registerForm">
    <div class="RegisterHeader">
        <h2 style="color: #6504b5; font-size: 40px;">Fill The Details</h2>
      </div>
      <div class="RegisterContent">
        <div class='form'>
          <div>
            <strong><label htmlFor="name">Pet Name :</label></strong><br>
            <input type="text" id="name" name="name"/>
          </div>
          <div>
            <strong><label for="category">Select Category:</label></strong><br>
            <select id="category" name="category"></select>
          </div>
          <div>
            <strong><label htmlFor="breed">Breed :</label></strong><br>
            <input type="text" id="breed" name="breed"/>
          </div>
          <div>
            <strong><label htmlFor="color">Color :</label></strong><br>
            <input type="text" id="color" name="color"/>
          </div>
          <div>
            <strong><label htmlFor="date">Lost Date :</label></strong><br>
            <input type="text" id="date" name="date"/>
          </div>
          <div>
            <strong><label htmlFor="description">Description :</label></strong><br>
            <input type="text" id="description" name="description"/>
          </div>
          <div>
            <strong><label htmlFor="petPic">Upload Picture :</label></strong><br>
            <input type="file" id="petPic" name="petPic"/>
          </div>
          <!-- Add a hidden input for user_id -->
          <input type="hidden" name="user_id" value="<?= $user_id; ?>">
          <div class='RegisterButton'>
            <button type="submit" onclick = "postData(event)">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer mt-5 text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4">PetTrace</h2>
                <h5>Contact Us</h5>
                <p>Email: info@pettrace.com</p>
                <p>Phone: +123 456 789</p>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="social-icons">
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="mt-4 text-center">&copy; 2024 PetTrace. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function () {
        let data = sessionStorage.getItem("userData");
        let userData = JSON.parse(data);

        var firstName = userData.full_name.split(' ')[0];

        var userName = $('#userName');
        userName.append(firstName);
    })

    document.getElementById('userName').addEventListener('click', function() {
        var userData = sessionStorage.getItem("userData");
        window.location.href = "http://localhost/PetTrace/index.php/profile?userData=" + encodeURIComponent(userData);
    });

        function postData(e){
          e.preventDefault();

            var petName = document.getElementById('name').value;
            var category = document.getElementById('category').value;
            var breed = document.getElementById('breed').value;
            var color = document.getElementById('color').value;
            var date = document.getElementById('date').value;
            var description = document.getElementById('description').value;
            var user_id = document.getElementsByName('user_id')[0].value;

            // Handle file upload
            var input = document.getElementById('petPic');
            var file = input.files[0];

            if (!file) {
                alert("Please select a pet picture");
                return;
            }

            var formData = new FormData();
            formData.append('petName', petName);
            formData.append('category', category);
            formData.append('breed', breed);
            formData.append('color', color);
            formData.append('date', date);
            formData.append('description', description);
            formData.append('petPic', file);
            formData.append('user_id', user_id);

            $.ajax({
                url: "http://localhost/PetTrace/index.php/Post/createPost",
                type: "POST",
                cache:false,
                data: formData,
                contentType: false,
                processData: false, 
                success: function(response) {
                    alert("Added successful");
                    window.location.href = "http://localhost/PetTrace/index.php/Home/user_dashboard";
                },
                error: function(request, status, error) {
                  console.log(error);
                    alert("Adding failed");
                }
            });
        }

        $(document).ready(function(){
        // Load categories dynamically using AJAX
        $.ajax({
            url: "http://localhost/PetTrace/index.php/Category/getCategories",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var dropdown = $('#category');
                dropdown.empty();
                $.each(data, function(index, category) {
                    dropdown.append($('<option>').text(category.category_name).attr('value', category.category_id));
                });
            }
        });
    });
	
	</script>

<?php $this->load->view('footer'); ?>
