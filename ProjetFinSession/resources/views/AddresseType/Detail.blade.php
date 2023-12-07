@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Détail type addresse</h3>
            </div>
            <div class="card-body">
                <br>
                <table class="table text-center">
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Type addresse :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $addresseType->AddressType }}</h4>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Date de modification :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $addresseType->ModifiedDate }}</h4>
                        </td>

                    </tr>

                </table>
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
