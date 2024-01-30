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
<?php foreach ($userData as $i => $row): ?>
  <div class="register_card">
    <div class="registerForm">
      <div class="RegisterHeader">
        <h2 style="color: #6504b5; font-size: 40px;">Edit Your Profile</h2>
      </div>
      <div class="RegisterContent">
        <div class='form'>
          <div>
            <strong><label htmlFor="name">Full Name :</label></strong><br>
            <input type="text" id="name" name="name" value="<?php echo $row['full_name'];?>"/>
          </div>
          <div>
            <strong><label htmlFor="email">Email :</label></strong><br>
            <input type="text" id="email" name="email" value="<?php echo $row['email'];?>"/>
          </div>
          <div>
            <strong><label htmlFor="phone">Phone Number :</label></strong><br>
            <input type="number" id="phone" name="phone" value="<?php echo $row['mobile'];?>"/>
          </div>
          <div>
            <strong><label htmlFor="userProPic">Upload Profile Picture :</label></strong>
            <input type="file" id="userProPic" name="userProPic"/>
          </div>
          <div>
            <strong><label htmlFor="password">Password :</label></strong><br>
            <input type="text" id="password" name="password"/>
          </div>
          <div>
            <strong><label htmlFor="confirmPassword">Confirm Password :</label></strong><br>
            <input type="text" id="confirmPassword" name="confirmPassword"/>
          </div>
          <div class='RegisterButton'>
            <button type="submit" onclick = "postData(event)">Update</button>
          </div>
        </div>
        <?php endforeach;?>
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

<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

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

            var fullName = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

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
                url: "http://localhost/PetTrace/index.php/User/createUser/1",
                type: "POST",
                cache:false,
                data: formData,
                contentType: false,
                processData: false, 
                success: function(response) {
                    alert("Registration successful");
                    window.location.href = "http://localhost/PetTrace/index.php/User/profile";
                },
                error: function(request, status, error) {
                    alert("Registration failed");
                }
            });
        }
	
	</script>

<?php $this->load->view('footer'); ?>
