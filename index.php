<!--
Copyright 2017 Vladik Y. AnoMail
-->
<html>
<head>
  <title>AnoMail</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="materialize.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head><style>
body {background-image: url(bg.jpg);}
.logo {
position: absolute;
bottom: 0px;
}
.main {
  position: absolute;
  left: 0%;
  width: 100%;
  height: 100%;
  top: 0%;
  background-color: #f4f4f4;
}
.txt {
  width: 100%;
}
#sub {
  position: absolute;
  right: 15px;
  bottom: 15px;
}

.validate {
  width: 100%;
}
@media screen and (min-width: 720px) {
  .main {
    left: 10%;
    top: 20%;
    width: 80%;
    height: 60%;
  }
  .logo {
    position: absolute;
    right: 15px;
    top: 15px;
  }
  .txt {
    width: 50%;
  }

  }
  .box {
    position: static;
    width: 100%;
    height: 1px;
  }
  .info {
    position: fixed;
    right: 0px;
    top: 0px;
    background-color: orange;
    color: white;
  }

</style><body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="materialize.min.js"></script><div class="main z-depth-5"><br/>
    <script>
    var options = [
  {selector: '.class', offset: 200, callback: customCallbackFunc } },
  {selector: '.other-class', offset: 200, callback: function() {
    customCallbackFunc();
  } },
];
Materialize.scrollFire(options);

    </script>
    <script>
    function getURL() {
        document.getElementById("demo").innerHTML = '<div class="row"><form class="col s12"><div class="row"><div class="input-field col s6"><i class="material-icons prefix">http</i><input name="url" id="icon_prefix" type="text" class="validate"><label for="icon_prefix">URL of File</label></div>';
    }
    function getImg() {
      document.getElementById("demo").innerHTML = '<div class="row"><form class="col s12"><div class="row"><div class="input-field col s6"><i class="material-icons prefix">image</i><input name="img" id="icon_prefix" type="text" class="validate"><label for="icon_prefix">Path to Image</label></div>';
    }

    </script>


    <div class="logo">
      <h1>AnoMail</h1><img src="email-secure.png"><img src="fingerprint.png"><img src="clock-fast.png"><img src="check.png"><img src="cloud-check.png"><img src="cellphone.png">
    </div>
    <form name="form" action="" method="get">
  <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
           <i class="material-icons prefix">email</i>
            <input name="mail" id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">E-Mail</label>
          </div>
          <br/><br/><br/><br/>
          <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix">textsms</i>
                    <input name="subject" id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Subject</label>
                  </div>
                <div class="txt">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="txt" id="textarea1" class="materialize-textarea" data-length="500"></textarea>
                    <label for="textarea1">Message</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <p name="url" id="demo"></p>
          <div id="sub"><button class="btn waves-effect waves-light">Submit<i class="material-icons right">send</i></button></div>
        </form>
      </form>
    </div>
    <div class="info">
    <i class="material-icons prefix">info</i></div>
    <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large tail">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li class="waves-effect waves-light"><a onclick="getImg();" ><i class="material-icons">image</i></a></li>
      <li class="waves-effect waves-light"><a onclick="getURL();" ><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
<?php
      error_reporting(E_ERROR | E_PARSE);
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      if ($_GET['img'] == '') {
      if ($_GET['url'] != '') {
      $body = '<html><body>' . $_GET['txt'] . '<br/>' . '<a href="' . $_GET['url'] . '">Attached File</a>' . '</body></html>';
      $result = mail($_GET['mail'], $_GET['subject'], $body, implode("\r\n", $headers));
      if ($_GET['txt'] == '') {

      } else {
        echo '<div class="progress">
        <div class="indeterminate"></div>
        </div>';

      if ($result == 'true') {
        echo '<i class="material-icons prefix">check</i><b>Done.</b>';
        sleep(2);
        ob_clean();
        header( 'Location: http://www.yegorov.it/vladik/AnoMail/index.php');
      } else {
        echo '<i class="material-icons prefix">close</i><b>Something went wrong :(</b>';
      }
    }
  } else {
    $body = '<html><body>' . $_GET['txt'];
    $result = mail($_GET['mail'], $_GET['subject'], $body, implode("\r\n", $headers));
    if ($_GET['txt'] != '') {
    if ($result == 'true') {
      echo '<i class="material-icons prefix">check</i><b>Done.</b>';
      sleep(2);
      ob_clean();
      header( 'Location: http://www.yegorov.it/vladik/AnoMail/index.php');
    } else {
      echo '<i class="material-icons prefix">close</i><b>Something went wrong :(</b>';
    }
  }
}

} else {

  $body = '<html><body>' . $_GET['txt'] . '<br/>' . '<img src="' . $_GET['img'] . '">' . '</body></html>';
  $result = mail($_GET['mail'], $_GET['subject'], $body, implode("\r\n", $headers));
  if ($result == 'true') {
    echo '<i class="material-icons prefix">check</i><b>Done.</b>';
    sleep(2);
    ob_clean();
    header( 'Location: http://www.yegorov.it/vladik/AnoMail/index.php');
  } else {
    echo '<i class="material-icons prefix">close</i><b>Something went wrong :(</b>';
  }
}
  ?>

</body>
</html>
