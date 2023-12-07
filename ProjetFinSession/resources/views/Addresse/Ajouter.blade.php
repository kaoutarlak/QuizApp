@include('headerHome')


<br><br>
<div class="row" style="height: 800px">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Ajouter une nouvelle addresse </h3>
            </div>
            <div class="card-body">
                <br>
                <form action="/Addresse/Ajouter" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="EntrepriseID">Enntreprise </label>
                            <select class="custom-select form-control" id="EntrepriseID" name="EntrepriseID" required>
                                <option selected>Choisir...</option>
                                @foreach ($listEntreprise as $item)
                                    <option value="{{ $item->EntrepriseID }}">{{ $item->EntrepriseName }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir l'entreprise
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="AddressTypeID">Type addresse </label>
                            <select class="custom-select form-control" id="AddressTypeID" name="AddressTypeID" required>
                                <option selected>Choisir...</option>
                                @foreach ($listAddresseType as $item)
                                    <option value="{{ $item->AddressTypeID }}">{{ $item->AddressType }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir le type d'addresse
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="AddressLine1">Address Ligne 1</label>
                            <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer la 1er ligne d'addresse
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="AddressLine2">Address Ligne 2</label>
                            <input type="text" class="form-control" id="AddressLine2" name="AddressLine2">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="City">Ville</label>
                            <input type="text" class="form-control" id="City" name="City" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer la ville
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Country">Pays</label>
                            <select class="form-control" name="Country" id="Country" required>
                                <option value="">Choisir ...</option>
                                <option value="Canada" rel="Canada">Canada</option>
                                <option value="United states" rel="United">United states</option>
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir le pays
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Province">Province</label>
                            <select class="form-control" name="Province" id="Province" required>
                                <option value="">Choisir ...</option>
                                <option value="Alberta" class="Canada">Alberta</option>
                                <option value="British Columbia" class="Canada">British Columbia</option>
                                <option value="Manitoba" class="Canada">Manitoba</option>
                                <option value="New Brunswick" class="Canada">New Brunswick</option>
                                <option value="Newfoundland and Labrador" class="Canada">Newfoundland and Labrador
                                </option>
                                <option value="Nova Scotia" class="Canada">Nova Scotia</option>
                                <option value="Ontario" class="Canada">Ontario</option>
                                <option value="Prince Edward Island" class="Canada">Prince Edward Island</option>
                                <option value="Quebec" class="Canada">Quebec</option>
                                <option value="Saskatchewan" class="Canada">Saskatchewan</option>
                                <option value="Northwest Territories" class="Canada">Northwest Territories</option>
                                <option value="Nunavut" class="Canada">Nunavut</option>
                                <option value="Yukon" class="Canada">Yukon</option>

                                <option value="alberta" class="United">Alabama</option>
                                <option value="Alaska" class="United">Alaska</option>
                                <option value="Arizona" class="United">Arizona</option>
                                <option value="Arkansas" class="United">Arkansas</option>
                                <option value="California" class="United">California</option>
                                <option value="Colorado" class="United">Colorado</option>
                                <option value="Connecticut" class="United">Connecticut</option>
                                <option value="Delaware" class="United">Delaware</option>
                                <option value="District of Columbia" class="United">District of Columbia</option>
                                <option value="Florida" class="United">Florida</option>
                                <option value="Georgia" class="United">Georgia</option>
                                <option value="Hawaii" class="United">Hawaii</option>
                                <option value="Idaho" class="United">Idaho</option>
                                <option value="Illinois" class="United">Illinois</option>
                                <option value="Indiana" class="United">Indiana</option>
                                <option value="Iowa" class="United">Iowa</option>
                                <option value="Kansas" class="United">Kansas</option>
                                <option value="Kentucky" class="United">Kentucky</option>
                                <option value="Louisiana" class="United">Louisiana</option>
                                <option value="Maine" class="United">Maine</option>
                                <option value="Maryland" class="United">Maryland</option>
                                <option value="Massachusetts" class="United">Massachusetts</option>
                                <option value="Michigan" class="United">Michigan</option>
                                <option value="Minnesota" class="United">Minnesota</option>
                                <option value="Mississippi" class="United">Mississippi</option>
                                <option value="Missouri" class="United">Missouri</option>
                                <option value="Montana" class="United">Montana</option>
                                <option value="Nebraska" class="United">Nebraska</option>
                                <option value="Nevada" class="United">Nevada</option>
                                <option value="New Hampshire" class="United">New Hampshire</option>
                                <option value="New Jersey" class="United">New Jersey</option>
                                <option value="New Mexico" class="United">New Mexico</option>
                                <option value="New York" class="United">New York</option>
                                <option value="North Carolina" class="United">North Carolina</option>
                                <option value="North Dakota" class="United">North Dakota</option>
                                <option value="Ohio" class="United">Ohio</option>
                                <option value="Oklahoma" class="United">Oklahoma</option>
                                <option value="Oregon" class="United">Oregon</option>
                                <option value="Pennsylvania" class="United">Pennsylvania</option>
                                <option value="Rhode Island" class="United">Rhode Island</option>
                                <option value="South Carolina" class="United">South Carolina</option>
                                <option value="South Dakota" class="United">South Dakota</option>
                                <option value="Tennessee" class="United">Tennessee</option>
                                <option value="Texas" class="United">Texas</option>
                                <option value="Utah" class="United">Utah</option>
                                <option value="Vermont" class="United">Vermont</option>
                                <option value="Virginia" class="United">Virginia</option>
                                <option value="Washington" class="United">Washington</option>
                                <option value="West Virginia" class="United">West Virginia</option>
                                <option value="Wisconsin" class="United">Wisconsin</option>
                                <option value="Wyoming" class="United">Wyoming</option>
                            </select>
                            <div class="invalid-feedback ">
                                Veuillez choisir la province
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="PostalCode">Code Postale</label>
                            <input type="text" class="form-control" id="PostalCode" name="PostalCode" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer le code postale
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="WebSiteURL">Site Web URL</label>
                            <input type="text" class="form-control" id="WebSiteURL" name="WebSiteURL" required>
                            <div class="invalid-feedback ">
                                Veuillez entrer l'URL site web
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Addresse/Liste') }}">Retour à la liste des addresse</a>
        <br>

        </form>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
<script>
    //change province 
    $(document).ready(function() {
        var $cat = $('select[name=Country]'),
            $items = $('select[name=Province]');
        $items.find("option").hide();

        $cat.change(function() {

            var $this = $(this).find(':selected'),
                rel = $this.attr('rel');

            // Hide all
            $items.find("option").hide();

            $set = $items.find('option.' + rel);
            $set.show().first().prop('selected', true);

        });
    });

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
