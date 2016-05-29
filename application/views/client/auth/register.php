<?php

//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
include_once 'config/connexion.php';
include_once 'login-register/functions.php';

$action = array();
$action['result'] = null;

$text = array();

//If the form is submitted
if(isset($_POST['submit'])) {

	//Verifier que les champs nom, prenom et telephone ne sont pas vide
	if(trim($_POST['nom']) == '') {
		$hasError = true;
	} else {
		$nom = trim($_POST['nom']);
	}
	
	if(trim($_POST['prenom']) == '') {
		$hasError = true;
	} else {
		$prenom = trim($_POST['prenom']);
	}
	
	if(trim($_POST['fonction']) == '') {
		$hasError = true;
	} else {
		$fonction = trim($_POST['fonction']);
	}
	
	if(trim($_POST['entreprise']) == '') {
		$hasError = true;
	} else {
		$entreprise = trim($_POST['enreprise']);
	}

	if(trim($_POST['phone']) == '') {
		$hasError = true;
	} else {
		$phone = trim($_POST['phone']);
	}

	if(trim($_POST['effectif']) == '') {
		$hasError = true;
	} else {
		$effectif = trim($_POST['effectif']);
	}
	
	if(trim($_POST['password']) == '') {
		$hasError = true;
	} else {
		$password = md5(trim($_POST['password']));
	}

	//Verifier que l'adresse email est valide
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(!isset($hasError)) {
		$select = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1") or die(mysql_error());

		if(mysql_num_rows($select) != 0) {
			$hasError = true;
			$action['result'] = 'error';
			$action['text'] = "Votre email est déjà entregistré";
		}
		else {
			$add = mysql_query("INSERT INTO users (id, nom, prenom, email, telephone, fonction, entreprise, effectif, password) VALUES (null, '$nom', '$prenom', '$email', '$telephone', '$fonction', '$entreprise', '$effectif', '$password')") or die(mysql_error());

			if ($add) { 
				$userId = mysql_insert_id();
				$username = $nom .' '. $prenom;
				$key = $username . $email . date('mY');
				$key = md5($key);
				$confirm = mysql_query("INSERT INTO confirm VALUES(NULL,'$userId','$key','$email')");
				if($confirm){
					//put info into an array to send to the function
					$info = array(
						'username' => $username,
						'email' => $email,
						'key' => $key);
				
					//send the email
					if(send_email($info)){
									
						//email sent
						$action['result'] = 'success';
						array_push($text,'Merci pour votre inscription. Vérifiez votre email pour la confirmation!');
						header("Location: register_success.php");
					
					}else{
						$hasError = true;
						$action['result'] = 'error';
						array_push($text,"Un probleme est survenu, le courriel n'est pas envoyé");
					
					}
			
				}else{
					$hasError = true;
					$action['result'] = 'error';
					array_push($text,"Un probleme est survenu: la confirmation n'est pas sauvegarder : " . mysql_error());
				}
				
			} else {
			   echo 'FAILED\n';
			}
			$action['text'] = $text;
		}
	}else{
		$action['result'] = 'error';
		$action['text'] = "S'il vous plait, Vérifier si tous les champs sont rentrés et que les informations sont valides. Merci!";
	}
	
}
?>

<?php include 'header.php' ?>
  <div class="container">
	<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
				<?php include 'sidebar.php' ?>
	</div>
			
	<div class="col-lg-9 col-sm-9 col-md-9">

    <div class="col-lg-8 col-sm-8 col-md-8 col-md-push-2" id="register">
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="registerform">
			<input type="hidden" name="action" value="user_register">
			<input type="hidden" name="module" value="register">
          <fieldset>
			<legend class="register_header">
				<div class="modal-header login_modal_header">
					<h2 class="modal-title">Veuillez vous enregistrer</h2>
				</div>
			</legend>
            <?php if(isset($hasError)) { //s'il y'a une erreur ?>
              <p class="alert alert-danger"><?= show_errors($action); ?></p>
            <?php } ?>

            <?php if(isset($emailSent) && $emailSent == true) { //Si l'email a été envoyé ?>
              <div class="alert alert-success">
                <p><strong>Inscription complété!</strong></p>
              </div>
            <?php } ?>

            <div class="form-group">
              <label for="nom">Nom<span class="help-required">*</span></label>
              <input type="text" name="nom" id="nom" value="" class="form-control required" role="input" aria-required="true" />
            </div>
			<div class="form-group">
              <label for="prenom">Prenom<span class="help-required">*</span></label>
              <input type="text" name="prenom" id="prenom" value="" class="form-control required" role="input" aria-required="true" />
            </div>
			<div class="form-group">
              <label for="email">Email<span class="help-required">*</span></label>
              <input type="text" name="email" id="email" value="" class="form-control required email" role="input" aria-required="true" />
            </div>
			<div class="form-group">
              <label for="login-pass">Password<span class="help-required">*</span></label>
              <input type="password" name="password" id="login-pass" placeholder="Password" value="" class="form-control required" role="input" aria-required="true" />
            </div>
			<div class="form-group">
              <label for="confirm-pass">Confirmation Password<span class="help-required">*</span></label>
              <input type="password" name="confirm-password" id="confirm-pass" placeholder="Password" value="" class="form-control required" role="input" aria-required="true" />
            </div>
            <div class="form-group">
              <label for="fonction">Fonction<span class="help-required">*</span></label>
              <select name="effectif" id="fonction" class="form-control required" role="select" aria-required="true">
                <option></option>
                <option>Etudiant</option>
                <option>Ingenieur</option>
				<option>Technicien</option>
				<option>Technologie de l'information</option>
				<option>Gestion</option>
				<option>Autre</option>
              </select>
            </div>
			<div class="form-group">
              <label for="phone">Numero de telephone<span class="help-required">*</span></label>
              <input type="text" name="phone" id="phone" value="" class="form-control required" role="input" aria-required="true" />
            </div>

            <div class="actions">
              <input type="submit" value="Enregistrer" name="submit" id="submitButton" class="btn btn-primary" title="Cliquez ici pour valider!" />
              <input type="reset" value="Videz le formulaire" class="btn btn-danger" title="Videz les champs" />
            </div>
          </fieldset>
        </form>
      </div><!-- col -->
	  
    </div><!-- row -->

      <hr>
    </div> <!-- /container -->
	
<?php include 'footer.php' ?>