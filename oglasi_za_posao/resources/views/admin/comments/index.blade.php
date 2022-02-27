<x-admin-master>
    @section('content')

        <div class="card mb-4">
             <div class="card-header">
                 <i class="fas fa-table me-1"></i>
                 <b>Pregled svih komentara|Ukupan broj komentara: {{$comments->count()}}</b>
             </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID oglasa</th>
                        <th>Naslov oglasa</th>
                        <th>Autor komentara</th>
                        <th>Gost</th>
                        <th>Sadržaj</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Brisanje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>ID oglasa</th>
                        <th>Naslov oglasa</th>
                        <th>Autor komentara</th>
                        <th>Gost</th>
                        <th>Sadržaj</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Brisanje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->post->id}}</td>
                            <td>{{$comment->post->title}}</td>
                            <td>{{$comment->user->name ?? 'NULL'}} </td>
                            <td>{{$comment->nickname}}</td>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->updated_at}}</td>
                            <td>
                                <form method="post" action="{{route('comment.delete',$comment->id)}}" enctype="multipart/form-data">
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
