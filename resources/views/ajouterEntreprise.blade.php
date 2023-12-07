@include('headerHome')

<br><br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Ajouter une nouvelle entreprise</h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/AddEnreprise" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom de l'entreprise </label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                        <div class="invalid-feedback ">
                            Veuillez entrer le nom de l'entreprise
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Note de l'entreprise </label>
                        <input type="text" class="form-control" id="note" name="note" required>
                        <div class="invalid-feedback ">
                            Veuillez entrer la note de l'entreprise
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('home') }}">Retour à la liste des entreprises</a>
        <br>

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
