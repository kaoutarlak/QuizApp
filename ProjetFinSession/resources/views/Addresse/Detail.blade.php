@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Détail adresse</h3>
            </div>
            <div class="card-body">
                <br>
                    <table class="table text-center">
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Entreprise :</h4>
                            </td>
                            <td>
                                @foreach ($listEntreprise as $item)
                                    @if ($item->EntrepriseID == $addresse->EntrepriseID)
                                        <h4 class="text-success">{{ $item->EntrepriseName }}</h4>
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Type d'addresse :</h4>
                            </td>
                            <td>
                                @foreach ($listAddresseType as $item)
                                    @if ($item->AddressTypeID == $addresse->AddressTypeID)
                                        <h4 class="text-success">{{ $item->AddressType }}</h4>
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Addresse ligne 1 :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->AddressLine1 }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Addresse ligne 2 :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->AddressLine2 }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Ville :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->City }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Province :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->Province }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Pays :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->Country }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Code Postale :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->PostalCode }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Site web :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $addresse->WebSiteURL }}</h4>
                            </td>

                        </tr>
                        
                    </table>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Addresse/Liste') }}">Retour à la liste des addresses</a>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
