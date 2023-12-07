@include('headerHome')


<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10 ">
        <h1 class="text-center"> ENTREPRISE </span></h1>
        <a href="{{ route('AddEnreprise') }}" class="btn btn-success ">+ Ajouter une entreprise</a>
        <br><br>
        <div class="border border-info card ">
            <div class="card-header text-white bg-info"><h4> Liste des entreprises</h4></div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Nom de l'entreprise</th>
                        <th class="text-center">Note de l'entreprise</th>
                        <th class="text-center">Date inscription</th>
                        <th class="text-center">Date de modification</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach ($listEntreprise as $item)
                        <tr>
                            <td>{{ $item->EntrepriseName }}</td>
                            <td>{{ $item->EntrepriseNote }}</td>
                            <td>{{ $item->DateInscrit }}</td>
                            <td>{{ $item->DateMod }}</td>
                            <td>
                                <a
                                    href="{{ URL::to('alterEntreprise?id=' . $item->EntrepriseID) }}"class="btn btn-primary">Modifier</a>&nbsp;
                                <a href="{{ URL::to('detailEntreprise?id=' . $item->EntrepriseID) }}"
                                    class="btn btn-warning ">&nbsp;Détail&nbsp;</a>&nbsp;
                                <a href=""
                                    class="btn btn-danger confirmDelete"data-id={{ $item->EntrepriseID }}>Supprimer</a>&nbsp;
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <div class="col-1">
        &nbsp;
    </div>
</div>

@include('footer')

<script>
    $(".confirmDelete").on('click', function() {

        if (confirm("Êtes-vous sûr de vouloir supprimer cette entreprise?")) {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('deleteEntreprise') }}",
                data: {
                    "id": id
                },
                type: 'get',
                success: function(result) {
                    console.log(result)
                }
            });
        } else {
            return false;
        }

    });
</script>
