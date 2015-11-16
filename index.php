<!DOCTYPE html>
<html>
    <head>
      <title>Rock, Paper, Scissors!</title>
        
      <!-- Bootstrap -->
      <link href="client/css/bootstrap.min.css" rel="stylesheet">
      <link href="client/css/customstyle.css" rel="stylesheet">
    </head>
    <body>
      
      <!-- Header -->
      <div id="header" class="menu-bar navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div id="title-container" class="navbar-header">
            <h1 id="title" class="text">Rock, Paper, Scissors!</h1>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <div id="top-menu" class="menu-bar navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div id="title-container" class="navbar-header">
            <button id="loginBtn" class="menu-button b-green" onclick="loginBtnClicked();">Login</button>
            <button id="registerBtn" class="menu-button b-red" onclick="registerBtnClicked();">Register</button>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      
      <!-- Body -->
      <div id="loading"></div>
      <div id="about-us">
        <div>
          <p>Game designed by:<br>Aaron Meaney<br>Alex Corcoran<br>Mark Hayden<br><br>Having problems? Need help?<br>Too bad.<br>This is a college project.<br>:-)</p>
          <button id="closeAboutBtn" class="menu-button b-orange" onclick="closeAboutBtnClicked();">Close</button>
        </div>
      </div>
      <div id="body">
        <p id="intro-text">Hi there!<br><br>Want to play some Rock, Paper, Scissors?<br>Login or Register to access the game!<br><br>Have fun! :-)<br><br>(P.S. It's free!)</p>
      </div>
      
      <!-- Footer -->
      <button id="help-icon" onclick="aboutBtnClicked();"><img id="help-icon-img" src="client/img/helpicon.png"></img></button>
      
      <!-- Scripts -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- AJAX script for one-page functionality -->
      <script src="client/js/ajax.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="client/js/bootstrap.min.js"></script>
    </body>
</html>