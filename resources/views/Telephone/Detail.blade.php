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
                            <h4 class="font-weight-bold">Employée :</h4>
                        </td>
                        <td>
                            @foreach ($listEmployee as $item)
                                @if ($item->EmployeeID == $Telephone->EmployeeID)
                                    <h4 class="text-success">{{ $item->FirstName }} {{ $item->LastName }}</h4>
                                @endif
                            @endforeach
                       </td>

                    </tr>
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Type de téléphone :</h4>
                        </td>
                        <td>
                            @foreach ($listTelephoneType as $item)
                                @if ($item->PhoneNumberTypeID == $Telephone->PhoneNumberTypeID)
                                    <h4 class="text-success">{{ $item->PhoneNumberType }}</h4>
                                @endif
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Numéro de téléphone :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $Telephone->PhoneNumber }}</h4>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <h4 class="font-weight-bold">Date de modification :</h4>
                        </td>
                        <td>
                            <h4 class="text-success">{{ $Telephone->ModifiedDate }}</h4>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Telephone/Liste') }}">Retour à la liste des types de téléphone</a>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
