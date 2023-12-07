@include('header')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        {{-- <h1 class="display1 text-center badge badge-primary text-wrap"><span class="display1">Nous contacter</span></h1> --}}
        <h2 class="display1 text-center font-weight-bold ">Nous contacter</h2>
        <br>
        <form action="/contact-message" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    {{-- <label for="nom">Nom *</label> --}}
                    <input type="nom" class="form-control" id="nom" placeholder="Nom" name="nom" required>
                    {{-- <div class="valid-feedback">
                        Nom valide!
                    </div> --}}
                    <div class="invalid-feedback">
                        Veuillez entrer votre nom
                    </div>
                    {{-- <small id="nomValidation" class="form-text text-muted "></small> --}}
                </div>
                <div class="form-group col-md-6">
                    {{-- <label for="email">Courriel *</label> --}}
                    <input type="email" class="form-control" id="email" aria-describedby="emailValidation"
                        placeholder="Courriel @" name="email" required>
                    <div class="invalid-feedback">
                        Veuillez entrer votre email
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{-- <label for="message">Message *</label> --}}
                <textarea class="form-control" id="message" rows="10" placeholder="Entrer votre message" name="message" required></textarea>
                <div class="invalid-feedback">
                    Veuillez saisir votre message
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-lg btn-block">Envoyer</button>
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
                    // input.classList.add('is-valid');
                    document.getElementsByTagName("input").classList.add('is-valid');
                }, false);
            });
        }, false);
    })();
</script>
