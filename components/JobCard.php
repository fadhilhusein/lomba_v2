<?php 
$job = [
    [
    "tagline" => "front end",
    "title" => "Membuat Website Toko Online Sederhana",
    "author" => "Fadhil"
    ],
    [
    "tagline" => "front end",
    "title" => "Membuat Website Toko Online Sederhana",
    "author" => "Fadhil"
    ],
    [
    "tagline" => "front end",
    "title" => "Membuat Website Toko Online Sederhana",
    "author" => "Fadhil"
    ],
];
?>

<?php 
foreach($job as $data) :
?>
    <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
        <div class="card w-100 course-card-horizontal">
            <!-- <div class="card__background card-img-top"></div> -->
            <img src="assets/img/backgrounds/gradient_background.png" class="card-img-top" alt="Course Image">
            <div class="card-body">
                <span class="badge bg-primary"><?= $data['tagline'] ?></span>
                <h5 class="card-title mt-2"><?= $data['title'] ?></h5>
                <hr>
                <div class="d-flex align-items-center">
                    <div class="text-content">
                        <h6 class="mb-0"><?= $data['author'] ?></h6>
                        <small class="text-muted">Author</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
endforeach;
?>





