@include('headerHome')

<br><br>
<div class="row" style="height: 800px">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Modifier un type d'addresse </h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/AddresseType/Modifier" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="AddressType">Address Type</label>
                            <input type="text" class="form-control" id="AddressType" name="AddressType" value="{{ $addresseType->AddressType }}" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer un type d'addresse
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ $addresseType->AddressTypeID }}">
                    <br>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/AddresseType/Liste') }}">Retour à la liste des types d'addresse</a>
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
</script>
