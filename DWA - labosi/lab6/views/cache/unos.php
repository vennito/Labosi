<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css' rel='stylesheet' media='screen'>
    <link href='css/variables.css' rel='stylesheet' media='screen'>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js' type='text/javascript'>
    </script>
    <!--script(src="js/jquery.js")-->
    <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js'>
    </script>
    <script src='js/check.js'>
    </script>
    <title>
      DWA2013
    </title>
  </head>
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
            <form action='ispis' method='POST'>
              <label for='ime'>
              </label>
              	Ime:
              <br>
              <input type='text' name='ime' id='ime'>
              <br>
              <label for='prezime'>
              </label>
              	Prezime:
              <br>
              <input type='text' name='prezime' id='prezime'>
              <br>
              <label for='spol'>
              </label>
              	Spol:
              <br>
              <input type='radio' name='spol' value='M' checked>
              	M
              <input type='radio' name='spol' value='Ž'>
              	Ž
              <br>
              <label for='datum'>
              </label>
              	Datum rođenja:
              <br>
              <input type='date' name='datum' id='datum'>
              <br>
              <label for='adresa'>
              </label>
              <w>
                	Adresa i mjesto stanovanja:
              </w>
              <br>
              <input type='text' name='adresa' id='adresa'>
              <br>
              <label for='krv'>
              </label>
              	Krvna grupa(nije obavezno):
              <br>
              <input type='radio' name='krv' value='A'>
              	A
              <input type='radio' name='krv' value='B'>
              	B
              <input type='radio' name='krv' value='AB'>
              	AB
              <input type='radio' name='krv' value='0'>
              	0
              <input type='radio' name='krv2' value='+'>
              	+ (pos)
              <input type='radio' name='krv2' value='-'>
              	- (neg)
              <br>
              <label for='tegobe'>
              </label>
              	Ima li prijašnjih medicinskih tegoba (srčane tegobe, tlak, virusne bolesti (Hepatits, HIV))
              <br>
              <input type='radio' name='tegobe' id='tegobe1' value='da'>
              	Da
              <input type='radio' name='tegobe' id='tegobe2' value='ne' checked>
              	Ne
              <br>
              <span id='tegobeinfo'>
                <label for='tegobeinfo'>
                </label>
                	Koje tegobe:
                <br>
                <input type='text' name='tegobeinfo' id='tegobeinfotext'>
              </span>
              <br>
              <label for='alergija'>
              </label>
              	Jeste li alergični na lijekove:
              <br>
              <input type='radio' name='alergija' id='alergija1' value='da'>
              	Da
              <input type='radio' name='alergija' id='alergija2' value='ne' checked>
              	Ne
              <input type='radio' name='alergija' id='alergija3' value='nezna'>
              	Ne znam
              <br>
              <span id='alergijainfo'>
                <label for='alergijainfo'>
                </label>
                	Na koje lijekove ste alergični:
                <br>
                <input type='text' name='alergijainfo' id='alergijainfotext'>
                <br>
              </span>
              <input type='submit' name='submit' id='submit' value='Pošalji'>
            </form>
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
