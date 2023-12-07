@include('headerHome')

<br>
<div class="row">
    <div class="col-3">
        &nbsp;
    </div>
    <div class="col-6">
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h3 class="display1 text-center font-weight-bold ">Détail entreprise</h3>
            </div>
            <div class="card-body">
                <br>
                    <table class="table text-center">
                        <tr>
                            <td>
                                <h3 class="font-weight-bold">Nom de l'entreprise :</h3>
                            </td>
                            <td>
                                <h3 class="text-success">{{ $entreprise->EntrepriseName }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="font-weight-bold">Note de l'entreprise :</h3>
                            </td>
                            <td>
                                <h3 class="text-success">{{ $entreprise->EntrepriseNote }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="font-weight-bold">Date d'inscription :</h3>
                            </td>
                            <td>
                                <h3 class="text-success">{{ $entreprise->DateInscrit }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 class="font-weight-bold">Date de modification :</h3>
                            </td>
                            <td>
                                <h3 class="text-success">{{ $entreprise->DateMod }}</h3>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
        <br>
        <a href="{{ URL::to('home') }}">Retour à la liste des entreprises</a>
        <br>

    </div>
    <div class="col-3">
        &nbsp;
    </div>
</div>

@include('footer')
