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
</style>

<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6504b5;">
    <div class="container">
        <a class="navbar-brand" href="#">PetTrace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- body -->
<div class="container mt-5">
    <div class="row">
    <?php ($userData) ?>
        <!-- Image column -->
        <div class="col-md-6">
            <div class="card-image" style="margin-left: 10%;">
                <img src="<?= base_url('uploads/'. $userData['img_url']); ?>" class="" alt="User Profile Image" width="80%" height="80%">
            </div>
            <br>
            <div class="card" style="width: 80%; padding-left:10px;">
                <h3><p>Hello, <?= $userData['full_name']; ?> !</p></h3>
                <ul style="font-size: 20px;">
                    <li><strong>Email : </strong><?= $userData['email']; ?></li>
                    <li><strong>Mobile : </strong><?= $userData['mobile']; ?></li>
                </ul>
                <div style="text-align:right; padding-bottom:10px; padding-right:10px;">
                <a class="btn btn-primary" href="<?= base_url('index.php/userView');?>">Edit Profile</a>
                <a class="btn btn-danger" href="<?= base_url('index.php/userView');?>">Delete</a>
                </div>
            </div>
        </div>

        <!-- Content column -->
        <div class="col-md-6">
            <div>
                <h2>Posts</h2>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="navbar navbar-expand-lg navbar-dark mt-auto" style="background-color: #6504b5; color: white;">
    <div class="container">
        <p>
            
        </p>
    </div>
</footer>

<?php $this->load->view('footer'); ?>