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
        <!-- Image column -->
        <div class="col-md-6">
            <div class="card-image" style="margin-left: 10%">
                <img src="<?php echo base_url('assets/images/dog-2.jpg'); ?>" class="" alt="User Profile Image" width="50%" height="50%">
            </div>
            <br>
            <div class="card" style="width: 80%">
                <h3>Name</h3>
                <ul>
                    <li><strong>Adress</strong></li>
                    <li><strong>Contact</strong></li>
                </ul>
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

<?php if ($userData): ?>
        <p>Welcome, <?= $userData['full_name']; ?>!</p>
        
    <?php else: ?>
        <p>User data not available.</p>
    <?php endif; ?>

<!-- Footer -->
<footer class="navbar navbar-expand-lg navbar-dark mt-auto" style="background-color: #6504b5; color: white;">
    <div class="container">
        <p>
            
        </p>
    </div>
</footer>

<?php $this->load->view('footer'); ?>