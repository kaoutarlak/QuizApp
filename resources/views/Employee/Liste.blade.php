@include('headerHome')


<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10 ">
        <h1 class="text-center"> EMPLOYEE </span></h1>
        <a href="{{ route('AddEmployee') }}" class="btn btn-success ">+ Ajouter un employeé</a>
        <br><br>
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h4> Liste des employeés</h4>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">2ème Prénom</th>
                        <th class="text-center">Genre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Titre</th>
                        <th class="text-center">Département</th>
                        <th class="text-center">Date modification</th>
                        <th class="text-center">Nom de l'entreprise</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach ($listEmployee as $item)
                        <tr>
                            <td>{{ $item->FirstName }}</td>
                            <td>{{ $item->LastName }}</td>
                            <td>{{ $item->MiddleName }}</td>
                            <td>{{ $item->Gender }}</td>
                            <td>{{ $item->EmailAddress }}</td>
                            <td>{{ $item->Titre }}</td>
                            <td>{{ $item->Department }}</td>
                            <td>{{ $item->ModifiedDate }}</td>
                            @foreach ($listEntreprise as $e)
                                @if ($e->EntrepriseID == $item->EntrepriseID)
                                    <td>{{ $e->EntrepriseName }}</td>
                                @endif
                            @endforeach
                            <td>
                                <a
                                    href="{{ URL::to('Employee/Modifier?id=' . $item->EmployeeID) }}"class="btn btn-primary">Modifier</a>&nbsp;
                                <a href="{{ URL::to('Employee/Detail?id=' . $item->EmployeeID) }}"
                                    class="btn btn-warning ">&nbsp;Détail&nbsp;</a>&nbsp;
                                <a href=""
                                    class="btn btn-danger confirmDelete" data-id={{ $item->EmployeeID }}>Supprimer</a>&nbsp;
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

        if (confirm("Êtes-vous sûr de vouloir supprimer cet employée?")) {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('deleteEmployee') }}",
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
