<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>
    #image{
        height: 520px;
    }

    .CategoryCard{
        box-shadow: 0 0 10px gray;
        transition: 0.1s;
    }

    .CategoryCard:hover{
        border: solid 2px #6504b5;
    }

    .footer{
        width: 100%;
        height: 400px;
        background-color: #6504b5;
        display: flex;
        justify-content: center;
    }

    i{
        color: #fff;
        font-size: 30px
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
			<a class="navbar-brand m-3" href="<?= base_url('index.php/signup');?>">Sign Up</a>
			<a class="navbar-brand m-3" href="<?= base_url('index.php/signin');?>">Sign In</a>
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
<div class="container mt-5">
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col">
                <div class="card CategoryCard" href="http://localhost/PetTrace/index.php/Post/getCategorizedPost/<?= $category['category_id']; ?>">
                    <div class="card-body CategoryCardBody d-flex align-items-center justify-content-center">
                        <h5 class="card-title"><?= $category['category_name']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="footer mt-5">
    <div class="row" style="">
        <div class="col-md-6 text-light" style="width: 600px">
            <h2 class="mt-5">PetTrace</h2>
            <h5 class="mt-5">Contact Us</h5>
            <p>Email: info@pettrace.com</p>
            <p>Phone: +123 456 789</p>
        </div>
        <div class="col-md-6" style="width: 600px">
            <a href="#" class=""><i class="bi bi-facebook"></i></a>
            <a href="#" class=""><i class="bi bi-youtube"></i></a>
            <a href="#" class=""><i class="bi bi-instagram"></i></a>
        </div>
    </div>
    <div class="row" style="">
        <div class="">
            <p>&copy; 2024 PetTrace. All rights reserved.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php $this->load->view('footer'); ?>
