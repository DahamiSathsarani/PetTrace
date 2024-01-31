<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    .card {
        cursor: pointer;
    }

    .card:hover {
        border: solid 2px #6504b5;
    }

    .userImg{
        width: 300px;
        height: 300px;
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
</style>

<!-- Nav Bar -->
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

<!-- Main body -->
<div class="container mt-5">
    <div class="row">
        <!-- Image column -->
        <div class="col-md-6">
            <div class="card-image">
                <img src="<?= base_url('uploads/' .$postData['img_url']); ?>" class="img-fluid" alt="Pet Image" width="500" height="200">
            </div>
        </div>

        <!-- Content column -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h2 class="mt-3">Pet Details</h2>
                <ul>
                    <li><strong>Breed:</strong> <?= $postData['pet_name']; ?> </li><br>
                    <li><strong>Color:</strong> <?= $postData['breed']; ?></li><br>
                    <li><strong>Description:</strong> <?= $postData['description']; ?></li><br>
                    <li><strong>Category:</strong> <?= $category_name; ?></li><br>
                    <li><strong>Lost Date:</strong> <?= $postData['lost_date']; ?></li><br>
                </ul>
                <a class="btn btn-primary" href="<?= base_url('index.php/user_view');?>">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
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



<script>
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


    document.getElementById('showAlertBtn').addEventListener('click', function() {
        document.getElementById('successAlert').style.display = 'block';
    });
</script>

<?php $this->load->view('footer'); ?>