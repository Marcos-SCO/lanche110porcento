<h1><?= $title ?? ''?></h1>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt5">

            <p>Preencha os campos</p>
            <form action="<?=$BASE?>/users/login" method="post">
                <!-- Email -->
                <div class="form-group">
                    <label for="email">E-mail: <sup>*</sup></label>
                    <input type="email" name="email" id="email"
                        class="form-control form-control-lg <?= isset($error['email_error']) && $error['email_error'] != '' ? 'is-invalid' : '' ?>"
                        value="<?= $data['email'] ?? '' ?>">
                    <span class="invalid-feedback">
                        <?= $error['email_error'] ?? '' ?>
                    </span>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Senha: <sup>*</sup></label>
                    <input type="password" name="password" id="password"
                        class="form-control form-control-lg <?= isset($error['password_error']) && $error['password_error'] != '' ? 'is-invalid' : '' ?>">
                    <span class="invalid-feedback">
                        <?= $error['password_error'] ?? '' ?>
                    </span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>