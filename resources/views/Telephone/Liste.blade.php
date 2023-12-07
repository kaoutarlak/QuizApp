@include('headerHome')


<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10 ">
        <h1 class="text-center"> TELEPHONE</span></h1>
        <a href="{{ route('AddTelephone') }}" class="btn btn-success ">+ Ajouter un numéro de téléphone</a>
        <br><br>
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h4> Liste des numéros de téléphone</h4>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Employée</th>
                        <th class="text-center">Téléphone</th>
                        <th class="text-center">Type de téléphone</th>
                        <th class="text-center">Date de modification</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach ($listTelephone as $item)
                        <tr>
                            @foreach ($listEmployee as $e)
                                @if ($e->EmployeeID == $item->EmployeeID)
                                    <td>{{$e->FirstName}} {{$e->LastName}}</td>
                                @endif
                            @endforeach
                            
                            <td>{{ $item->PhoneNumber }}</td>
                            @foreach ($listTelephoneType as $tel)
                                @if ($tel->PhoneNumberTypeID == $item->PhoneNumberTypeID)
                                    <td>{{$tel->PhoneNumberType}}</td>
                                @endif
                            @endforeach
                            <td>{{ $item->ModifiedDate }}</td>
                            <td>
                                <a href="{{ URL::to('Telephone/Modifier?id=' . $item->PhoneNumberID) }}"class="btn btn-primary">Modifier</a>
                                <a href="{{ URL::to('Telephone/Detail?id=' . $item->PhoneNumberID) }}" class="btn btn-warning ">Détail</a>
                                <a href="" class="btn btn-danger confirmDelete" data-id={{ $item->PhoneNumberID }}>Supprimer</a>
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

        if (confirm("Êtes-vous sûr de vouloir supprimer ce numéro de téléphone?")) {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('deleteTelephone') }}",
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
