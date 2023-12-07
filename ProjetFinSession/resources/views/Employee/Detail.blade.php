@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Détail employeé</h3>
            </div>
            <div class="card-body">
                <br>
                    <table class="table text-center">
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Nom :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->FirstName }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Prénom :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->LastName }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">2ème prénom :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->MiddleName }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Genre :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->Gender }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Courriel :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->EmailAddress }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Titre :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->Titre }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="font-weight-bold">Départment :</h4>
                            </td>
                            <td>
                                <h4 class="text-success">{{ $employee->Department }}</h4>
                            </td>
                            <td>
                                <h4 class="font-weight-bold">Entreprise :</h4>
                            </td>
                            <td>
                                @foreach ($listEntreprise as $item)
                                    @if ($item->EntrepriseID == $employee->EntrepriseID)
                                        <h4 class="text-success">{{ $item->EntrepriseName }}</h4>
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('/Employee/Liste') }}">Retour à la liste des employées</a>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
