@include('headerHome')

<br><br>
<div class="row" >
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Modifier un type de téléphone </h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/Telephone/Modifier" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="EmployeeID">Employée </label>
                            <select class="custom-select form-control" id="EmployeeID" name="EmployeeID" required>
                                @foreach ($listEmployee as $item)
                                    @if ($item->EmployeeID == $Telephone->EmployeeID)
                                        <option value="{{ $item->EmployeeID }}" selected>
                                            {{ $item->FirstName }}&nbsp;{{ $item->LastName }}</option>
                                    @else
                                        <option value="{{ $item->EmployeeID }}" selected>
                                            {{ $item->FirstName }}&nbsp;{{ $item->LastName }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir l'employée
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="TelephoneID">Type téléphone </label>
                            <select class="custom-select form-control" id="PhoneNumberTypeID" name="PhoneNumberTypeID"
                                required>
                                @foreach ($listTelephoneType as $item)
                                    @if ($item->PhoneNumberTypeID == $Telephone->PhoneNumberTypeID)
                                        <option value="{{ $item->PhoneNumberTypeID }}" selected>{{ $item->PhoneNumberType }}
                                        </option>
                                    @else
                                        <option value="{{ $item->PhoneNumberTypeID }}">{{ $item->PhoneNumberType }}
                                        </option>
                                    @endif
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
                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{$Telephone->PhoneNumber}}" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le numéro de téléphone
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="{{ $Telephone->PhoneNumberID }}">
                    <br>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
