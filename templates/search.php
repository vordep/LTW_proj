<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <?php include 'navbar.php';?>
   
    <div id="container-main">
      <div class="search">
        <form action="actions.php?action=search" method="POST">
          <input type="text" placeholder="Search . . . " name="inputSearch">

        </form>
        <? echo($_POST['inputSearch']);?>
      </div>
         <?php if(isset($_POST['inputSearch'])):?>
      <?php echo ("this is a test");?>
      
      <div class="results-container">
       
          <div class="cards">
            <?php foreach ($events as $current):  ?>
              <div class="card-placeholder">
                <div class="card-placeholder-container">
                  <a href=<?="index.php?page=viewEvent&id=" .$current[ 'idEvent'] . "&previous=Feed";?>;>
                               <img class=" placeholder-containter-img" href=<?= "index.php?page=viewEvent&id=" . $current['idEvent'] . "&previous=Feed"; ?> id="modal-view" src="<?= $current['image'] != '' ? UPLOADS_URL . "/" . $current['image'] : 'assets/img/default-poll.png' ?>" alt="Default poll image">
							
                            </a>
                </div>
              </div>
              <?php endforeach; ?>
          </div>
         
      </div>
       <?php endif; ?>
    </div>
</body>