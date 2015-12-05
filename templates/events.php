<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <?php include'navbar.php'; ?>
     <?php include'php/getEvents.php';?>
    <div id="container-main">
        <div class="row">
            <h1 class="page-header">Events</h1>
            <div class="cards">
                <?php foreach ($events as $current) { ?>
                    <div class="card-placeholder">
                        <div class="card-placeholder-container">
                            <a href=<?="index.php?page=viewEvent&id=" .$current[ 'idEvent'] . "&previous=Feed";?>;>
                               <img class=" placeholder-containter-img" href=<?= "index.php?page=viewEvent&id=" . $current['idEvent'] . "&previous=Feed"; ?> id="modal-view" src="<?= $current['image'] != '' ? UPLOADS_URL . "/" . $current['image'] : 'assets/img/default-poll.png' ?>" alt="Default poll image">
							
                            </a>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>


</body>