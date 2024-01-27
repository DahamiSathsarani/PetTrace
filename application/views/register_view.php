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
  <div class="image">
    <img src="../assets/images/register.jpg" class="d-block w-100" alt="Pet Image 1" id="image">
  </div>
  <div class="register_card">
    <div class="registerForm">
      <div class="RegisterHeader">
        <h2 style="color: #6504b5; font-size: 40px;">Register here</h2>
      </div>
      <div class="RegisterContent">
        <div class='form'>
          <div>
            <label htmlFor="name">Full Name :</label><br>
            <input type="text" id="name" name="name"/>
          </div>
          <div>
            <label htmlFor="email">Email :</label><br>
            <input type="text" id="email" name="email"/>
          </div>
          <div>
            <label htmlFor="phone">Phone Number :</label><br>
            <input type="number" id="phone" name="phone"/>
          </div>
          <div>
            <label htmlFor="userProPic">Upload Profile Picture :</label>
            <input type="file" id="userProPic" name="userProPic"/>
          </div>
          <div>
            <label htmlFor="password">Password :</label><br>
            <input type="text" id="password" name="password"/>
          </div>
          <div>
            <label htmlFor="confirmPassword">Confirm Password :</label><br>
            <input type="text" id="confirmPassword" name="confirmPassword"/>
          </div>
          <div class='RegisterButton'>
            <button type="submit" onclick = "postData(event)">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

<script type="text/javascript">

        function postData(e){
          e.preventDefault();

            var fullName = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            console.log('Full Name:', fullName);

            // Handle file upload
            var input = document.getElementById('userProPic');
            var file = input.files[0];

            if (!file) {
                alert("Please select a profile picture");
                return;
            }

            var formData = new FormData();
            formData.append('fullName', fullName);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('password', password);
            formData.append('confirmPassword', confirmPassword);
            formData.append('userProPic', file);

            $.ajax({
                url: "http://localhost/PetTrace/index.php/User/createUser",
                type: "POST",
                cache:false,
                data: formData,
                contentType: false,
                processData: false, 
                success: function(response) {
                    alert("Registration successful");
                    window.location.href = "http://localhost/PetTrace/index.php/Home/signin";
                },
                error: function(request, status, error) {
                    alert("Registration failed");
                }
            });
        }
	
	</script>

<?php $this->load->view('footer'); ?>
