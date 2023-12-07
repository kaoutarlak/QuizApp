@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Détail type de téléphone</h3>
            </div>
            <div class="card-body">
                <br>
                <table class="table text-center">
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Type de téléphone :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $TelephoneType->PhoneNumberType }}</h4>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Date de modification :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $TelephoneType->ModifiedDate }}</h4>
                        </td>

                    </tr>

                </table>
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
