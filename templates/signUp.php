<link rel="stylesheet" href="assets/css/signIn.css">
</head>
<body>
  <header>
      <h1>Eventus</h1>
      <h3>Make Connections</h3>
  </header>
  <div class="container">
    <div id="loginform">
        <form action="actions.php?action=signUp" class ="f-signin"method="POST" >
 
     <input class="f-control"type="username" name="inputUserName" placeholder="User name " required autofocus>
  
    <input class="f-control"type="password" name= "inputPassword" placeholder="Password" required>
     <input class="f-control"type="password" name= "inputConfirmPassword" placeholder=" Confirm Password" required>
            <button class="f-control" type="submit" placeholder="Sign in">Sign In</button>
    </form>
    </div>
    <div id="Sign in">
        <p><a id="link-signin"href="?page=signIn"> Log in</a></p>
    </div>
  </div>
</body>