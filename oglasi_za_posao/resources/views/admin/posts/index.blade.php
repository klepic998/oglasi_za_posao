<x-admin-master>
@section('content')
    @if(Session::has('message'))
      <div class="alert alert-danger"> {{Session::get('message')}}  </div>
        @elseif(Session::has('post-created-message'))
            <div class="alert alert-success"> {{Session::get('post-created-message')}}  </div>
        @elseif(Session::has('post-updated-message'))
            <div class="alert alert-success"> {{Session::get('post-updated-message')}}  </div>
        @endif
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <b>Pregled svih oglasa|Ukupan broj oglasa: {{$posts->count()}}</b>
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
                                            <th>Uređivanje</th>
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
                                            <th>Uređivanje</th>
                                            <th>Brisanje</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->user->name}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>
                                                <img height = "50" width="100%" src="{{asset("storage/images/".$post->post_image)}}" alt="">
                                            </td>
                                            <td>{{$post->location}}</td>
                                            <td>{{$post->address}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->updated_at}}</td>
                                            <td>{{$post->comments->count()}}</td>
                                            <td><a class="btn btn-warning" href="{{route('post.edit', $post->id)}}">Uredi</a></td>
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
