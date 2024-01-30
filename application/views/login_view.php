<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
.background {
    width: 100%;
    height: 100vh;
    display: flex;
}

.image {
    width: 50%;
    height: 100%;
}

    img{
      width: 100%;
      height: 100%;
    }

    .login_card{
      width: 50%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

.loginForm {
    width: 50%;
    height: 70%;
    box-shadow: 0 0 10px gray;
    border-radius: 15px;
}

.LoginHeader {
    width: 100%;
    height: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.LoginContent {
    width: 100%;
    height: 60%;
    display: flex;
    justify-content: center;
}

.Form {
    width: 80%;
}

input {
    width: 100%;
    height: 50px;
    margin-top: 10px;
    border-radius: 5px;
    padding: 5px;
}

.LoginButton {
    width: 100%;
    height: 20%;
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

    button{
      width: 100%;
      height: 40px;
      background-color: #6504b5;
      color: #FFF;
      border: none;
      border-radius: 5px;
    }

.loginFooter {
    width: 100%;
    height: 20%;
}
</style>

<div class="background">
  <div class="image">
    <img src="../assets/images/login.jpg" class="d-block w-100" alt="Pet Image 1" id="image">
  </div>
  <div class="login_card">
    <div class="loginForm">
      <div class="LoginHeader">
        <h2 style="color: #6504b5; font-size: 40px;">Login</h2>
      </div>
      <div class="LoginContent">
        <div class='form Form'>
          <div>
            <input type="text" id="email" name="email" placeholder="Email"/>
          </div>
          <div>
            <input type="text" id="password" name="password" placeholder="Password"/>
          </div>
          <a>Forgot password</a>
          <div class='LoginButton'>
            <button type="submit" onclick = "postData(event)">Login</button>
          </div>
          <div class="loginFooter">
            <h6>or log in with</h6>
            <div>
                <!-- <button>Facebook</button> -->
                <!-- <div id="firebaseui-auth-container"></div> -->
            </div>
            <h6>Don't have an account yet?</h6>
            <a>Signup</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
<script src="https://cdn.firebase.com/libs/firebaseui/4.0.0/firebaseui.js"></script> -->

<!-- <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
<script src="https://cdn.firebase.com/libs/firebaseui/4.0.0/firebaseui.js"></script> -->

<script type="text/javascript">
function postData(e) {
    e.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    $.ajax({
        url: "http://localhost/PetTrace/index.php/User/userLogin",
        type: "POST",
        cache: false,
        data: {
            email: email,
            password: password,
        },
        success: function(response) {
            console.log(response.user);
            if (response.success) {
                const userData = JSON.stringify(response.user);
                console.log(userData);
                sessionStorage.setItem('userData', userData);
                window.location.href = "http://localhost/PetTrace/index.php/Home/user_dashboard";
            } else {
                alert(response.message);
            }

        },
        error: function(request, status, error) {
            console.log(error)
        }
    });
}
</script>

<?php $this->load->view('footer'); ?>