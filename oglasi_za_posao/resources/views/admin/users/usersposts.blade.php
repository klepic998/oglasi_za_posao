<x-admin-master>
    @section('content')
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Korisnik:{{$user->name}}|Ukupan broj oglasa: {{$user->posts()->count()}}
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Kategorija</th>
                        <th>Naslov</th>
                        <th>Slika</th>
                        <th>Lokacija</th>
                        <th>Adresa</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Komentari</th>
                        <th>Detalji</th>
                        <th>Brisanje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Kategorija</th>
                        <th>Naslov</th>
                        <th>Slika</th>
                        <th>Lokacija</th>
                        <th>Adresa</th>
                        <th>Kreiran</th>
                        <th>Ažuriran</th>
                        <th>Komentari</th>
                        <th>Detalji</th>
                        <th>Brisanje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                                <img height = "50" width="100%" src="{{asset("storage/images/$post->post_image")}}" alt="">
                            </td>
                            <td>{{$post->location}}</td>
                            <td>{{$post->address}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>{{$post->comments->count()}}</td>
                            <td><a class="btn btn-warning" href="{{route('users.post', $post->id)}}">Učitaj oglas</a></td>
                            <td>

                                <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
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
