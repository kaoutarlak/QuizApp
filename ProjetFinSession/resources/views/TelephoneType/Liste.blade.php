@include('headerHome')


<div class="row">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10 ">
        <h1 class="text-center"> ADDRESSE TYPE</span></h1>
        <a href="{{ route('AddTelephoneType') }}" class="btn btn-success ">+ Ajouter une type de tétéphonr</a>
        <br><br>
        <div class="border border-info card ">
            <div class="card-header text-white bg-info">
                <h4> Liste des types d'addresses</h4>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">Addresse type</th>
                        <th class="text-center">Date de modification</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach ($listTelephoneType as $item)
                        <tr>
                            <td>{{ $item->PhoneNumberType }}</td>
                            <td>{{ $item->ModifiedDate }}</td>
                            <td>
                                <a href="{{ URL::to('TelephoneType/Modifier?id=' . $item->PhoneNumberTypeID) }}"class="btn btn-primary">Modifier</a>
                                <a href="{{ URL::to('TelephoneType/Detail?id=' . $item->PhoneNumberTypeID) }}" class="btn btn-warning ">Détail</a>
                                <a href="" class="btn btn-danger confirmDelete" data-id={{ $item->PhoneNumberTypeID }}>Supprimer</a>
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

        if (confirm("Êtes-vous sûr de vouloir supprimer ce type de téléphone?")) {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "{{ route('deleteTelephoneType') }}",
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
