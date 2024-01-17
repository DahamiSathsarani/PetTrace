<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6504b5;">
    <div class="container">
        <a class="navbar-brand" href="#">PetTrace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5">
    <h1>Bootstrap JS Example</h1>

    <!-- Bootstrap Button Triggering Alert -->
    <button type="button" class="btn btn-primary" id="showAlertBtn">
        Show Success Alert
    </button>

    <!-- Bootstrap Alert -->
    <div class="alert alert-success mt-3" role="alert" id="successAlert" style="display: none;">
        This is a success message!
    </div>
</div>

<script>
    // JavaScript to handle button click and show the success alert
    document.getElementById('showAlertBtn').addEventListener('click', function() {
        document.getElementById('successAlert').style.display = 'block';
    });
</script>

<?php $this->load->view('footer'); ?>
