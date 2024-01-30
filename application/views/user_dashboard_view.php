<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>

<style>

    .CategoryCard{
        box-shadow: 0 0 10px gray;
        transition: 0.1s;
    }

    .CategoryCard:hover{
        border: solid 2px #6504b5;
    }

    .addPostButton{
        width: 150px;
        height: 40px;
        color: #fff;
        margin: 10px;
        border: none;
        border-radius: 5px;
        background-color: #6504b5;
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
        font-size: 30px;
    }0

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
			<a id="userName" class="navbar-brand m-3" href="<?= base_url('index.php/profile');?>"></a>
			<a class="navbar-brand m-3" href="<?= base_url('index.php/signout');?>">Sign Out</a>
		</div>
    </div>
</nav>

<button class="addPostButton" id="addPostButton" type="submit">Add Poster</button>

<!-- Posts section -->
<!-- <div class="container mt-5">
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($post['img_url'])): ?>
                        <img src="<?= base_url('uploads/' . $post['img_url']); ?>" class="card-img-top" alt="<?= $post['pet_name']; ?>">
                    <?php else: ?>
                        <img src="<?= base_url('path_to_default_image/default.jpg'); ?>" class="card-img-top" alt="Default Image">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['pet_name']; ?></h5>
                        <p class="card-text"><?= $post['color']; ?></p>
                        <p class="card-text"><?= $post['breed']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div> -->

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
    <div class="row justify-content-center">
        <div class="col-md-6 text-light" style="width: 600px">
            <p>&copy; 2024 PetTrace. All rights reserved.</p>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        let data = sessionStorage.getItem("userData");
        let userData = JSON.parse(data);

        var firstName = userData.full_name.split(' ')[0];

        var userName = $('#userName');
        userName.append(firstName);
    })
    
    document.getElementById('addPostButton').addEventListener('click', function() {
        var user_id = sessionStorage.getItem("userData") ? JSON.parse(sessionStorage.getItem("userData")).user_id : '';
        console.log(user_id);
        window.location.href = "http://localhost/PetTrace/index.php/Home/add_post?user_id=" + user_id;
    });
</script>

<?php $this->load->view('footer'); ?>


