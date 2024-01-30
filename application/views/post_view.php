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
                <a class="btn btn-primary" href="<?= base_url('index.php/userView');?>">Contact</a>

                </div>
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

<script>
    document.getElementById('showAlertBtn').addEventListener('click', function() {
        document.getElementById('successAlert').style.display = 'block';
    });
</script>

<?php $this->load->view('footer'); ?>