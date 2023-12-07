@include('headerHome')


<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10 ">
        <h1 class="text-center"> ADDRESSE </span></h1>
        <a href="{{ route('AddAddresse') }}" class="btn btn-success ">+ Ajouter une addresse</a>
        <br><br>
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h4> Liste des addresses</h4>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Entreprise</th>
                        <th class="text-center" style="width: 100px">Address Ligne 1</th>
                        <th class="text-center">Address Ligne 2</th>
                        <th class="text-center">Ville</th>
                        <th class="text-center">Province</th>
                        <th class="text-center">Pays</th>
                        <th class="text-center">Code Postale</th>
                        <th class="text-center">Site Web</th>
                        <th class="text-center">Date modification</th>
                        <th class="text-center">Type address</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach ($listAddresse as $item)
                        <tr>
                            @foreach ($listEntreprise as $e)
                                @if ($e->EntrepriseID == $item->EntrepriseID)
                                    <td>{{ $e->EntrepriseName }}</td>
                                @endif
                            @endforeach
                            <td>{{ $item->AddressLine1 }}</td>
                            <td>{{ $item->AddressLine2 }}</td>
                            <td>{{ $item->City }}</td>
                            <td>{{ $item->Province }}</td>
                            <td>{{ $item->Country }}</td>
                            <td>{{ $item->PostalCode }}</td>
                            <td><a href="{{ $item->WebSiteURL }}">{{ $item->WebSiteURL }}</a> </td>
                            <td>{{ $item->ModifiedDate }}</td>
                            @foreach ($listAddresseType as $type)
                                @if ($type->AddressTypeID == $item->AddressTypeID)
                                    <td>{{ $type->AddressType }}</td>
                                @endif
                            @endforeach
                            <td>
                                <a href="{{ URL::to('Addresse/Modifier?id=' . $item->AddressID) }}"class="btn btn-primary">Modifier</a>
                                <a href="{{ URL::to('Addresse/Detail?id=' . $item->AddressID) }}" class="btn btn-warning ">Détail</a>
                                <a href="" class="btn btn-danger confirmDelete" data-id={{ $item->AddressID }}>Supprimer</a>
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

        if (confirm("Êtes-vous sûr de vouloir supprimer cette addresse?")) {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('deleteAddresse') }}",
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
