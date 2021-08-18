### PHP FUNCTION ###
function send_email() {  
  $name = $email = $phone = $text = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $name = test_input($_POST["fname"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["tel"]);
  $text = test_input($_POST["textbox"]);
  $link = $_POST["link"];

  // Generating e-mail parts
  $to = 'petras.petkevicius@horiondigital.com';
  $subject = 'Gavote žinutę nuo ' . $name;
  $body = $text.'<br>'.$phone;
  $headers = array('Content-Type: text/html; charset=UTF-8', 'From: '.$name.' <' . $email . '>', 'Reply-To: '.$name.' <' . $email . '>');

  $response = wp_mail( $to, $subject, $body, $headers );

  $redirect_link = $link . "?formreturn=false";
  if ($response) {
    $redirect_link = $link . "?formreturn=true";    
  }
  wp_redirect($redirect_link);
  exit;
}

if ( isset( $_POST['fname'] ) ) {
  send_email();
}


### HTML FORM ###
<form class="contact-sheet__form" method="POST">
  <input type="text" id="fname" name="fname" placeholder="Jūsų vardas" required>
  <div class="contact-sheet__form-wrap">
      <input type="email" id="email" name="email" placeholder="El. paštas" required>
      <input type="tel" id="tel" name="tel" placeholder="Tel. Nr." required>
  </div>
  <textarea id="textbox" name="textbox" rows="5" placeholder="Ką norite parašyti..." required></textarea>
  <input type="hidden" id="link" name="link" value="<?= the_permalink(); ?>">
  <input type="submit" id="submit" name="submit" value="Siųsti">
</form>


### RESPONSE BY GET GENERATOR ###
<?php if (isset( $_GET['formreturn'] ) && $_GET['formreturn'] == true) : ?>
  <h1 class="heading heading--primary" style=" background-color: green;">Pavyko. Susisieksime greitu metu.</h1>
<?php else: ?>
  <h1 class="heading heading--primary">Susisiekite</h1>
<?php endif; ?>
