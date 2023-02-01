
    <!-- Dropdown - etude Information -->
@section('tableHeader')
    <tr>
        <td>N°</td>
        <td>Name</td>
        <td>Actions</td>
    </tr>
@endsection

{{-- Table Body --}}
@section('tableBody')
    @php $i = 1 @endphp
    @isset($entities)
        @foreach ($entities as $entity)
        <tr>
            <td>{{ $i }} </td>
            <td>{{ $entity->name }}</td>
            <td style="width:100px !important">
                {{-- <a href="{{ route($espace.'.entitys.show', $entity->id) }}" id="{{ $entity->id }}" class="btn btn-primary btn-sm etude">
                    <i class="fa fa-eye"></i>
                </a> --}}
                <a href="{{ route($espace.'.'.$model.'.update', $entity->id)  }}"
                    class="btn btn-warning btn-sm editModal"
                    type="button"
                    data-toggle="modal"
                    data-name        = "{{ $entity->name }}"
                    data-description = "{{ $entity->description }}"
                    data-target="#editModal">
                    <i class="fa fa-edit"></i>
                </a>
                @include('partials.components.deleteBtnElement',[
                    'url'=>route('admin.'.$model.'.destroy',$entity->id),
                    'class'=> 'btn btn-sm btn-danger',
                    'message_confirmation'=>"Voulez-vous vraiment supprimer l'élément ? " .$entity->name,
                    'entity'=>$entity
                ])
            </td>
        </tr>
        @php $i++ @endphp
        @endforeach
    @endisset

@endsection
