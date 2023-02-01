@php
    /*
    Variables
    1- $faculte
    */
@endphp
<div class="card card">
    <div class="card-header bg-primary h5">{{$faculte->name}}</div>
    <div class="card-body">
        <table class="table">
            <thead class="text-primary">
                <th>Departments</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($faculte->departements as $departement)
                    <tr>
                        <th >{{$departement->name}}</th>
                        <th>
                            <a href="{{route('admin.departement.configure',['id'=>$departement->id])}}" class="btn btn-primary py-0 float-right"><i class="fa fa-cog"></i></a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
