@include('headerHome')

<br><br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Ajouter un nouveau employée</h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/Employee/Ajouter" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="LastName">Prénom </label>
                            <input type="text" class="form-control" id="LastName" name="LastName" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le prénom de l'employée
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="MiddleName">2ème prénom </label>
                            <input type="text" class="form-control" id="MiddleName" name="MiddleName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="FirstName">Nom </label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le nom de l'employée
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="EmailAddress">Adresse mail </label>
                            <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le courriel de l'employée
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Gender">Genre</label>
                            <select class="custom-select form-control" id="Gender" name="Gender" required>
                                <option selected>Choisir...</option>
                                <option value="F">Femme</option>
                                <option value="M">Homme</option>
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir le genre de l'employée
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Titre">Titre </label>
                            <input type="text" class="form-control" id="Titre" name="Titre" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le titre de l'employée
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Department">Départment</label>
                            <input type="text" class="form-control" id="Department" name="Department" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le départment de l'employée
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="EntrepriseID">Enntreprise </label>
                            <select class="custom-select form-control" id="EntrepriseID" name="EntrepriseID" required>
                                <option selected>Choisir...</option>
                                @foreach ($listEntreprise as $item)
                                    <option value="{{$item->EntrepriseID}}">{{$item->EntrepriseName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir l'entreprise
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Employee/Liste') }}">Retour à la liste des employées</a>
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
