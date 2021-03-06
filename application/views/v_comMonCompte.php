<?php
	$this->load->helper('url');
	$this->load->helper('security');
?>
<div id="vue-titre">
	<h2>Détails de mon compte</h2>
</div>
<div id="vue-contenu">
	<?php
		if (isset($notifySuccess))
		{
			echo
			'<div class="notify notify-success">
				<div>
					<strong>Action(s) validée(s) :</strong>
					<ul>'.$notifySuccess.'</ul>
				</div>
				<span class="notify-close" onclick="closeNotify(this);">&#10006;</span>
			</div>';
		}
		if (isset($notifyError))
		{
			echo
			'<div class="notify notify-error">
				<div>
					<strong>Une erreur est survenue !</strong>
					<ul>'.$notifyError.'</ul>
				</div>
				<span class="notify-close" onclick="closeNotify(this);">&#10006;</span>
			</div>';
		}
	?>
	<div id="utilisateur-general">
		<fieldset>
			<legend>Général</legend>
			<div class="form-list">
				<?php
					$id = $infosUtil['id'];
					$nom = $infosUtil['nom'];
					$prenom = $infosUtil['prenom'];
					$login = $infosUtil['login'];
					$dateEmbauche = $infosUtil['dateEmbauche'];
				?>
				<p>
					<span class="form-label label-small">Groupe :</span>
					Comptable
				</p>
				<p>
					<span class="form-label label-small">Identifiant :</span>
					<?php echo $id;?>
				</p>
				<p>
					<span class="form-label label-small">Nom :</span>
					<?php echo $nom;?>
				</p>
				<p>
					<span class="form-label label-small">Prénom :</span>
					<?php echo $prenom;?>
				</p>
				<p>
					<span class="form-label label-small">Login :</span>
					<?php echo $login;?>
				</p>
				<p>
					<span class="form-label label-small">Embauché le :</span>
					<?php echo $dateEmbauche;?>
				</p>
			</div>
		</fieldset>
	</div>
	<div id="utilisateur-securite">
		<form method="post" action="<?php echo base_url('c_comptable/majSecurite');?>">
			<fieldset>
				<legend>Sécurité</legend>
				<div class="form-list">
					<p>
						<label class="form-label label-medium" for="txt-current-mdp">Mot de passe actuel*</label>
						<input id="txt-current-mdp" class="input input-medium" name="currentMdp" required="required" maxlength="60" value="" type="password"/>
					</p>
					<p>
						<label class="form-label label-medium" for="txt-new-mdp">Nouveau mot de passe*</label>
						<input id="txt-new-mdp" class="input input-medium" name="newMdp" required="required" maxlength="60" value="" type="password"/>
					</p>
					<p>
						<label class="form-label label-medium" for="txt-confirm-mdp">Confirmation*</label>
						<input id="txt-confirm-mdp" class="input input-medium" name="confirmMdp" required="required" maxlength="60" value="" type="password"/>
					</p>
					<p class="form-buttons-container">
						<input id="securite-ok" class="button" value="Enregistrer" type="submit"/><input id="securite-annuler" class="button" value="Annuler" type="reset"/>
						<input name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" type="hidden"/>
					</p>
				</div>
			</fieldset>
		</form>
	</div>
	<div id="utilisateur-residence">
		<form id="residence" method="post" action="<?php echo base_url('c_comptable/majResidence');?>">
			<fieldset>
				<legend>Lieu de résidence</legend>
				<div class="form-list">
					<?php
						$ville = $infosUtil['ville'];
						$cp = $infosUtil['cp'];
						$adresse = $infosUtil['adresse'];
					?>
					<p>
						<label class="form-label label-small" for="txt-ville">Ville*</label>
						<input id="txt-ville" class="input input-medium" name="ville" required="required" maxlength="30" value="<?php echo xss_clean($ville);?>" type="text"/>
					</p>
					<p>
						<label class="form-label label-small" for="txt-cp">Code postal*</label>
						<input id="txt-cp" class="input input-small" name="cp" required="required" maxlength="5" value="<?php echo xss_clean($cp);?>" type="text"/>
					</p>
					<p>
						<label class="form-label label-small" for="txt-adresse">Adresse*</label>
						<input id="txt-adresse" class="input input-medium" name="adresse" required="required" maxlength="30" value="<?php echo xss_clean($adresse);?>" type="text"/>
					</p>
					<p class="form-buttons-container">
						<input id="residence-ok" class="button" value="Enregistrer" type="submit"/><input id="residence-annuler" class="button" value="Annuler" type="reset"/>
						<input name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" type="hidden"/>
					</p>
				</div>
			</fieldset>
		</form>
	</div>
</div>