<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
  </head>
  <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css' rel='stylesheet' media='screen'>
  <body>
    <div class='navbar navbar-fixed-top'>
      <div class='navbar-inner'>
        <div class='container-fluid'>
          <a href='#' class='brand'>
            DWA2014
          </a>
          <ul class='nav'>
            <li>
              <a href='/'>
                Početak
              </a>
            </li>
            <li class='active'>
              <a href='unos'>
                Unos
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
          <div class='hero-unit'>
            <p>
              <b>
                	Ime: 
              </b>
              <?php echo htmlspecialchars($ime) ?>
            </p>
            <p>
              <b>
                	Prezime:
              </b>
              <?php echo htmlspecialchars($prezime) ?>
            </p>
            <p>
              <b>
                	Spol:
              </b>
              <?php echo htmlspecialchars($spol) ?>
            </p>
            <p>
              <b>
                	Datum:
              </b>
              <?php echo htmlspecialchars($datum) ?>
            </p>
            <p>
              <b>
                	Adresa:
              </b>
              <?php echo htmlspecialchars($adresa) ?>
            </p>
            <p>
              <b>
                	Krvna grupa:
              </b>
              <?php echo htmlspecialchars($krv) ?>
            </p>
            <p>
              <b>
                	Medicinske tegobe:
              </b>
              <?php echo htmlspecialchars($tegobe) ?>
            </p>
            <p>
              	
              <b>
                	Opis tegoba:
              </b>
              <?php echo htmlspecialchars($tegobeinfo) ?>
            </p>
            <p>
              <b>
                	Alergicni na ljekove:
              </b>
              <?php echo htmlspecialchars($alergija) ?>
            </p>
            <p>
              <b>
                	Ljekovi:
              </b>
              <?php echo htmlspecialchars($alergijainfo) ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <footer>
      <p class='text-center'>
         &copy; TVZ 2014
      </p>
    </footer>
  </body>
  <script type="text/javascript"> window.history.forward();
 
</script>
</html>
