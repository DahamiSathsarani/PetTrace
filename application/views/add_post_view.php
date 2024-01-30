<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    .background{
      width: 100%;
      height: 100vh;
      display: flex;
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

    button{
      width: 20%;
      height: 40px;
      background-color: #6504b5;
      color: #FFF;
      border: none;
      border-radius: 5px;
    }
</style>

<div class="background">
  <div class="register_card">
    <div class="registerForm">
      <div class="RegisterContent">
        <div class='form'>
          <div>
            <label htmlFor="name">Pet Name :</label><br>
            <input type="text" id="name" name="name"/>
          </div>
          <div>
            <label for="category">Select Category:</label>
            <select id="category" name="category"></select>
          </div>
          <div>
            <label htmlFor="breed">Breed :</label><br>
            <input type="text" id="breed" name="breed"/>
          </div>
          <div>
            <label htmlFor="color">Color :</label><br>
            <input type="text" id="color" name="color"/>
          </div>
          <div>
            <label htmlFor="date">Lost Date :</label><br>
            <input type="text" id="date" name="date"/>
          </div>
          <div>
            <label htmlFor="description">Description :</label><br>
            <input type="text" id="description" name="description"/>
          </div>
          <div>
            <label htmlFor="petPic">Upload Picture :</label>
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

<script type="text/javascript">

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
