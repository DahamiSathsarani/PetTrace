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

    .pet_image{
        width: 100%;
        height: 200px;;
    }

    .card {
        cursor: pointer;
    }

    .card:hover {
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
        font-size: 30px;
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
			<a id="userName" class="navbar-brand m-3" href="#"></a>
			<a class="navbar-brand m-3" href="<?= base_url('index.php/signin');?>">Sign Out</a>
		</div>
    </div>
</nav>

<button class="addPostButton" id="addPostButton" type="submit">Add Admin</button>
<button class="addPostButton" id="addPostButton" type="submit">Users</button>

<!-- Posts section -->
<div class="container mt-5">
    <div class="row" id="postsContainer">
        <!-- Posts will be dynamically added here -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    
    document.getElementById('addPostButton').addEventListener('click', function() {
        var user_id = sessionStorage.getItem("userData") ? JSON.parse(sessionStorage.getItem("userData")).user_id : '';
        console.log(user_id);
        window.location.href = "http://localhost/PetTrace/index.php/Home/add_post?user_id=" + user_id;
    });

    $(document).ready(function () {
    // Load posts dynamically using AJAX
    $.ajax({
        url: "http://localhost/PetTrace/index.php/Post/getNotApprovedPosts",
        type: "GET",
        dataType: "json",
        success: function (data) {
            var postsContainer = $('#postsContainer');

            if (data.length > 0) {
                $.each(data, function (index, post) {
                    var imageUrl = "http://localhost/PetTrace/uploads/" + post.img_url;

                    var card = $('<div class="col-md-3 mb-4">').append(
                        $('<div class="card">').append(
                            $('<img src="' + imageUrl + '" class="card-img-top pet_image" alt="' + post.pet_name + '">'),
                            $('<div class="card-body">').append(
                                $('<h5 class="card-title">').text(post.pet_name),
                                $('<p class="card-text">').text(post.color),
                                $('<p class="card-text">').text(post.breed),
                                $('<p class="card-text">').text(post.description),
                                $('<button class="btn btn-primary btn-approve">Approve</button>')
                            )
                        )
                    );

                    card.find('.btn-approve').click(function () {
                        approvePost(post.poster_id, this);
                    });
                    postsContainer.append(card);
                });
            } else {
                postsContainer.append($('<p>').text('No posts available.'));
            }
        },
        error: function () {
            console.error('Error fetching posts.');
        }
    });
});

function approvePost(postId, approveButton) {
    $.ajax({
        url: "http://localhost/PetTrace/index.php/Post/approvePost",
        type: "POST",
        dataType: "json",
        data: { post_id: postId },
        success: function (response) {
            if (response.success) {
                alert("Post approved successfully!");
                $(approveButton).text("Approved").prop('disabled', true);
            } else {
                alert("Failed to approve post. Please try again.");
            }
        },
        error: function () {
            console.error('Error approving post.');
        }
    });
}



</script>

<?php $this->load->view('footer'); ?>


