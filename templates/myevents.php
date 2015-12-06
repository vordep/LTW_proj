<link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php';?>
    <?php include 'php/myevents.php';?>
   
            <div id="container-main">
                <div class="row">
                   <div class="header">
                    <h1 class="page-header">My Events</h1>
                    
                    <div class="button" data>
                        <a href="#openModal">
                        <button type="submit" ><i class="fa fa-plus"></i><span>Add New Event</span> </button>
                        </a>
                       </div>
                       <?php include 'addevent.php';?>
                    </div>
                     
                    <div class="cards">
                        <?php foreach ($events as $current) { ?>
                            <div class="card-placeholder">
                                <div class="card-placeholder-container">
                                    <a href=<?="index.php?page=viewEvent&id=" .$current[ 'idEvent'] . "&previous=Feed";?>;>
                               <img class=" placeholder-containter-img" href=<?= "index.php?page=viewEvent&id=" . $current['idEvent'] . "&previous=Feed"; ?> id="modal-view" src="<?= $current['image'] != '' ? UPLOADS_URL . "/" . $current['image'] : 'assets/img/default-event.jpeg' ?>" alt="Default poll image">
							
                            </a>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                    
                </div>
            </div>
 

</body>