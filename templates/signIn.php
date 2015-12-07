<link rel="stylesheet" href="assets/css/signIn.css">
</head>
<body>
  <header>
      <h1>Eventus</h1>
      <h3>Make Connections</h3>
  </header>
  <div class="container">
    <div id="loginform">
        <form action="actions.php?action=signIn" class ="f-signin"method="POST" >
 
     <input class="f-control"type="username" name="inputUserName" placeholder="User name " required autofocus>
  
    <input class="f-control"type="password" name= "inputPassword" placeholder="Password" required>
  
            <button class="f-control" type="submit" placeholder="Sign in">Sign In</button>
    </form>
    </div>
    <div id="register">
        <p><a id="link-signup"href="?page=signUp"> Register</a></p>
    </div>
  </div>
</body>