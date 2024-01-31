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

<!-- body -->
<div class="container mt-5">
    <div class="row">
    <?php ($userData) ?>
        <!-- Image column -->
        <div class="col-md-6">
            <div class="card-image" style="margin-left: 10%;">
                <img src="<?= base_url('uploads/'. $userData['img_url']); ?>" class="userImg" alt="User Profile Image" width="80%" height="80%">
            </div>
            <br>
            <div class="card" style="width: 80%; padding-left:10px;">
                <h3><p>Hello, <?= $userData['full_name']; ?> !</p></h3>
                <ul style="font-size: 20px;">
                    <li><strong>Email : </strong><?= $userData['email']; ?></li>
                    <li><strong>Mobile : </strong><?= $userData['mobile']; ?></li>
                </ul>
                <div style="text-align:right; padding-bottom:10px; padding-right:10px;">
                <a class="btn btn-primary" href="http://localhost/PetTrace/index.php/User/updateData/<?php echo $userData['user_id'] ?>">Edit Profile</a>
                <a class="btn btn-danger" id="deleteButton" href="http://localhost/PetTrace/index.php/User/deleteUser/<?php echo $userData['user_id'] ?>">Delete</a>
                </div>
            </div>
        </div>

        <!-- Content column -->
        <div class="col-md-6">
            <div>
                <h2>Posts</h2>
                <div class="container mt-5">
                <div class="row">
                    <?php foreach ($userPosts as $post): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <?php if (!empty($post->img_url)): ?>
                                    <img src="<?= base_url('uploads/' . $post->img_url); ?>" class="card-img-top pet_image" alt="<?= $post->pet_name; ?>">
                                <?php else: ?>
                                    <img src="<?= base_url('path_to_default_image/default.jpg'); ?>" class="card-img-top" alt="Default Image">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post->pet_name; ?></h5>
                                    <p class="card-text"><?= $post->color; ?></p>
                                    <p class="card-text"><?= $post->breed; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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
    </script>

<?php $this->load->view('footer'); ?>