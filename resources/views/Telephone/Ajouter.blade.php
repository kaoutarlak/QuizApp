@include('headerHome')

<br><br>
<div class="row" style="height: 800px">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Ajouter un numéro de téléphone </h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/Telephone/Ajouter" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="EmployeeID">Employée </label>
                            <select class="custom-select form-control" id="EmployeeID" name="EmployeeID" required>
                                <option selected></option>
                                @foreach ($listEmployee as $item)
                                    <option value="{{ $item->EmployeeID }}">{{ $item->FirstName }}&nbsp;{{ $item->LastName }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir l'employée
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="TelephoneTypeID">Type téléphone </label>
                            <select class="custom-select form-control" id="PhoneNumberTypeID" name="PhoneNumberTypeID" required>
                                <option selected></option>
                                @foreach ($listTelephoneType as $item)
                                    <option value="{{ $item->PhoneNumberTypeID }}">{{ $item->PhoneNumberType }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir le type de téléphone
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="PhoneNumber">Téléphone </label>
                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le numéro de téléphone
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Telephone/Liste') }}">Retour à la liste des numéros de téléphone</a>
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
