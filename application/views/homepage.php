<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    #image{
        height: 500px;
    }

</style>

<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6504b5;">
    <div class="container">
		<div style="width: 80%; border-right: solid #fff">
			<a class="navbar-brand" href="#">PetTrace</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div style="width: 20%;">
			<a class="navbar-brand m-3" href="<?= base_url('index.php/register');?>">Sign Up</a>
			<a class="navbar-brand m-3" href="<?= base_url('index.php/login');?>">Sign In</a>
		</div>
    </div>
</nav>

<!-- Carousel section -->
<div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/images/home1.jpg" class="d-block w-100" alt="Pet Image 1" id="image">
        </div>
        <div class="carousel-item">
            <img src="../assets/images/home2.jpg" class="d-block w-100" alt="Pet Image 2" id="image">
        </div>
        <div class="carousel-item">
            <img src="../assets/images/home3.jpg" class="d-block w-100" alt="Pet Image 3" id="image">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Category section -->
<!-- <div class="container mt-5">
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col">
                <div class="card CategoryCard" onclick="handleCategories(<?= $category['category_id']; ?>)">
                    <div class="card-body CategoryCardBody d-flex align-items-center justify-content-center">
                        <h5 class="card-title"><?= $category['category_name']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $this->load->view('footer'); ?>
