@include('header')
<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <h2 class="display1 text-center font-weight-bold ">Se connecter</h2>
        <br>
        <form action="/send" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="email">Entrer votre courriel </label>
                <input type="email" class="form-control" id="email"placeholder="Courriel @" name="email" required>
                <div class="invalid-feedback ">
                    Veuillez entrer votre courriel
                </div>
            </div>
            
            <br>
            <button type="submit" class="btn btn-warning btn-lg btn-block">Envoyer</button>
        </form>
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
</script>
