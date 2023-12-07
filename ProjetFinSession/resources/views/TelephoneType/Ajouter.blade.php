@include('headerHome')

<br><br>
<div class="row" style="height: 800px">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Ajouter un nouveau type de téléphone </h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/TelephoneType/Ajouter" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="PhoneNumberType">Téléphone Type</label>
                            <input type="text" class="form-control" id="PhoneNumberType" name="PhoneNumberType" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer un type de téléphone
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/TelephoneType/Liste') }}">Retour à la liste des types de téléphone</a>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')

<script>
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {

                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();

                    }
                    form.classList.add('was-validated');

                }, false);
            });
        }, false);

    })();
</script>
