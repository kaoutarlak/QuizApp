@include('header')
<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <h2 class="display1 text-center font-weight-bold ">Inscription</h2>
        <br>
        <form action="/enregistrement" method="POST" class="needs-validation" novalidate>
            @csrf
            <label for="email">Email </label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
            <div class="invalid-feedback ">
                Veuillez entrer votre email
            </div>
            <br>
            <label for="password">Mot de passe </label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Mot de passe"
                required>
            <div class="invalid-feedback">
                Veuillez entrer votre mot de passe
            </div>
            <br>
            <label for="passwordConfirm">Confirmer le mot de passe </label>
            <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm"
                placeholder="Mot de passe" required>
            <div class="invalid-feedback">
                Veuillez répéter le même mot de passe
            </div>

            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-lg btn-block"
                    >S'inscrire</button>
            </div>
            <div class="form-group">
                <p class="text-danger">{{$message}}</p>
            </div>
        </form>
        <br>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {

                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();

                    }
                    form.classList.add('was-validated');

                    //input.classList.add('is-valid');
                    //document.getElementsByClassName('form-control').classList.add('is-valid');
                }, false);
            });
        }, false);

    })();
    $("form").on("submit", function(e) {
        var password = $("#password").val();
        var passwordConfirm = $("#passwordConfirm").val();
        
        if (password != passwordConfirm) {
            alert("Les mots de passe ne correspondent pas !");
            e.preventDefault();
        }
        
    });
</script>


