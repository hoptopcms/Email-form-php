<?php
include_once 'config.php';
include_once 'mail.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= FORM ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="shadow p-3 mb-5 bg-white rounded"><hr>
                <div class="alert text-white bg-dark" role="alert"><?= FORM ?></div>
                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="<?= $name ?>" class="form-control <?= INVALID_NAME ?>" placeholder="<?= NAME ?>" required>
                        <div class="invalid-feedback">
                            <?= NAME_INVALID ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="tel" value="<?= $tel ?>" class="form-control <?= INVALID_PHONE ?>" placeholder="<?= PHONE ?>" required>
                        <div class="invalid-feedback">
                            <?= PHONE_INVALID ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" value="<?= $email ?>" class="form-control <?= INVALID_EMAIL ?>" placeholder="<?= EMAIL ?>" required>
                        <div class="invalid-feedback">
                            <?= EMAIL_INVALID ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" name="message"  class="form-control <?= INVALID_MESSAGE ?>" placeholder="<?= MESSAGE ?>" ><?= $message ?></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" checked="" class="form-check-input" style=" margin-top: 9px" required>
                        <button type="button" class="btn btn-link" style=" font-size: 12px" data-toggle="modal" data-target="#PersonalInformation">
                            <?= CHECKBOX ?>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-dark"><?= BUTTON ?></button>
                </form>
                <hr>
                <?PHP if ($ok): ?>
                    <div class="alert alert-dark" role="alert">
                        <?= $ok ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal fade" id="PersonalInformation" tabindex="-1" role="dialog" aria-labelledby="<?= CHECKBOX ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PersonalInformation"><?= CHECKBOX ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <PRE><?= PERSONALINFORMATION ?></PRE>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap/js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>