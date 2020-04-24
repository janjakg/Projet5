<?php $title = "Inscription";?>
<?php ob_start();?>

<div class="shadow-none m-5 pb-5 bg-light">
    <h1 class="text-center">INSCRIPTION</h1>
</div>
<p class="text-center"><a href="index.php?action=adminLogin">Si vous êtes déja inscrit connectez vous</a>
</p>

<form action="index.php?action=checkRegistration" method="post">
    <p>
        <fieldset>
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label">Pseudo :</label>
                <br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo" />
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> email :</label>
                <br>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" />
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <label for="email2" class="col-sm-2 col-form-label">Confirmer email :</label>
                <br>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email2" id="email2" placeholder="Confirmez votre email" />
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mot de passe :</label>
                <br>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" />
                    <br>
                    <br>
                </div>
            </div>
            <div class="form-group row">
                <label for="password2" class="col-sm-2 col-form-label">Confirmer mot de passe :</label>
                <br>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirmez votre mot de passe" />
                    <br>
                    <br>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </fieldset>
    </p>
</form>

<?php $content = ob_get_clean();?>

<?php require 'adminTemplate.php';?>