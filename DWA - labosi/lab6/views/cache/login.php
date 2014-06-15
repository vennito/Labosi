<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'>
    <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css' rel='stylesheet' media='screen'>
    <link href='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css' rel='stylesheet'>
    <link href='css/variables.less' rel='stylesheet' media='screen'>
    <script src='////ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' type='text/javascript'>
    </script>
    <script src='//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js'>
    </script>
    <script type='text/javascript' src='js/jquery.validate.js'>
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
            DWA2013
          </a>
          <ul class='nav'>
            <li>
              <a href='#'>
                Pomoć
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class='container-fluid'>
      <div class='row-fluid'>
        <div class='span12'>
          <div class='hero-unit'>
            <div class='container'>
              <!--poruke o grešci dođu ovdje-->
              <div class='row'>
                <div class='span4'>
                </div>
                <div class='span4'>
                  <?php echo htmlspecialchars($flash['error']) ?>
                </div>
                <div class='span4'>
                </div>
              </div>
              <div class='row'>
                <div class='span2'>
                  &nbsp;
                </div>
                <div class='span8'>
                  <form id='registerHere' method='post' action='login'>
                    <h2>
                      Molimo unesite vaše podatke:
                    </h2>
                    <div class='row'>
                      <div class='span4'>
                        Korisničko ime
                      </div>
                      <div class='span4'>
                        <div class='control-group'>
                          <label for='username' class='control-label'>
                          </label>
                          <div class='controls'>
                            <input type='text' id='username' name='username' placeholder='Korisničko ime' data-content='Korisničko ime (minimalno 4 znaka)' class='input-xlarge'>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      &nbsp
                    </div>
                    <div class='row'>
                      <div class='span4'>
                        Lozinka:
                      </div>
                      <div class='span4'>
                        <div class='control-group'>
                        </div>
                        <label for='password' class='control-label'>
                          <div class='controls'>
                            <input type='password' id='password' name='password' placeholder='Lozinka' data-content='Vaša lozinka (minimalno 8 znakova)'>
                          </div>
                        </label>
                      </div>
                    </div>
                    <div class='row'>
                      &nbsp
                    </div>
                    <div class='row'>
                      <div class='span2'>
                        <button type='submit' class='btn btn-large btn-primary'>
                          Pošalji
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class='span2'>
                </div>
              </div>
            </div>
          </div>
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
  <script type="text/javascript"> $(document).ready(function(){
            $('#registerHere input').hover(function() {
                                                         $(this).popover('show');
            },
                                            function() {
                                                         $(this).popover('hide');
                                            }
                                            );
            $("#registerHere").validate(
                 {
                     rules:{
                         username:  {
                                     required:true,
                                     minlength:4
                         } ,
                         password:   {
                                     required:true,
                                     minlength: 8
                         }
            },
                messages:{
                        username:  {
                                     required: "Unesite svoje korisničko ime",
                                     minlength: "Korisničko ime se sastoji od minimalno 4 znaka"
                        },
                        password:   {
                                     required:"Unesite svoju lozinku",
                                     minlength: "Unesite lozinku koja ima barem 8 znakova "
                        }
                         },
                errorClass: "help-inline",
                errorElement: "span",
                highlight:function(element, errorClass, validClass) {
                    $(element).parents('.control-group').addClass('error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.control-group').removeClass('error');
                    $(element).parents('.control-group').addClass('success');
                }
            });
 });
 
 
 
 
</script>
</html>
