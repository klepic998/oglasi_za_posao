<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               <b>Pregled svih korisnika|Ukupan broj: {{$users->count()}}</b>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Korisničko ime</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Ukupan broj oglasa</th>
                        <th>Ukupan broj komentara</th>
                        <th>Brisanje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Korisničko ime</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Ukupan broj oglasa</th>
                        <th>Ukupan broj komentara</th>
                        <th>Brisanje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><img class="rounded-circle" height="50" width="50" src="{{asset("/storage/avatars/".$user->avatar)}}" alt="..."></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->posts->count()}}</td>
                            <td>{{$user->comments->count()}}</td>
                            <td>

                                <form method="post" action="{{route('user.delete',$user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Obriši</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
</x-admin-master>
