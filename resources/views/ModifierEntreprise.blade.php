@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Modifier une entreprise</h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/entrepriseModifier" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom de l'entreprise </label>
                        <input type="text" class="form-control" id="nom" name="nom" required
                            value="{{ $entreprise->EntrepriseName }}" required>
                        <div class="invalid-feedback ">
                            Veuillez entrer le nom de l'entreprise
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Note de l'entreprise </label>
                        <input type="text" class="form-control" id="note" name="note" required
                            value="{{ $entreprise->EntrepriseNote }}" required>
                        <div class="invalid-feedback ">
                            Veuillez entrer la note de l'entreprise
                        </div>
                    </div>
                    <br>
                    <input type="hidden" id="id" name="id" value="{{ $entreprise->EntrepriseID }}">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                    <br>
                    <p class="text-danger">{{ isset($info) }}</p>
                </form>
            </div>
        </div>
        <br> 
        <a href="{{ URL::to('home') }}">Retour à la liste des entreprises</a>
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
