<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css' rel='stylesheet' media='screen'>
    <link href='../css/variables.css' rel='stylesheet' media='screen'>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js' type='text/javascript'>
    </script>
    <!--script(src="../js/jquery.js")-->
    <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js'>
    </script>
    <title>
      DWA2013
    </title>
  </head>
  <body>
    <div class='navbar navbar-fixed-top'>
      <div class='navbar-inner'>
        <div class='container-fluid'>
          <a href='<?php echo $basePageURL ?>' class='brand'>
            DWA2013
          </a>
          <ul class='nav'>
            <li class='active'>
              <a href='<?php echo $basePageURL ?>'>
                Početak
              </a>
            </li>
          </ul>
          <p class='navbar-text pull-right'>
            Dobrodošao
            <a href='#'>
              <?php echo htmlspecialchars($user) ?>
            </a>
            <a href='logout'>
              <button type='submit' data-toggle='button' style='position:relative; top:-4px' class='btn'>
                Odspoji me
              </button>
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row-fluid'>
        <div class='span12'>
          <?php if($vijest) { ?>
            <h2 class='truncate'>
              <?php echo htmlspecialchars($vijest["title"]) ?>
            </h2>
            <p>
              by
              <?php echo htmlspecialchars($vijest["author"]) ?>
              on 
              <?php echo htmlspecialchars($vijest["date"]) ?>
            </p>
            <p>
              <?php echo htmlspecialchars($vijest["text"]) ?>
            </p>
            <p>
              <a href='<?php echo $basePageURL ?>' class='btn'>
                Natrag &raquo;
              </a>
            </p>
          <?php } ?>
        </div>
      </div>
    </div>
    <hr>
    <footer>
      <p class='text-center'>
         &copy; TVZ 2013
      </p>
    </footer>
  </body>
  <script type="text/javascript"> window.history.forward();
 
 
 
</script>
</html>
