<x-user-master>
    @section('head')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Moji oglasi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    @endsection
    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-danger"> {{Session::get('message')}}  </div>
        @elseif(Session::has('post-created-message'))
            <div class="alert alert-success"> {{Session::get('post-created-message')}}  </div>
        @elseif(Session::has('post-updated-message'))
            <div class="alert alert-success"> {{Session::get('post-updated-message')}}  </div>
        @endif
            <h1 class="mt-4">Moji oglasi</h1>
        <div class="card mb-4">
           {{-- <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>--}}
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
                                <img height = "50" width="100%" src="{{asset("/storage/images/$post->post_image")}}" alt="">
                            </td>
                            <td>{{$post->location}}</td>
                            <td>{{$post->address}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td><a class="btn btn-warning" href="{{route('userspost.edit',$post->id)}}">Uredi</a></td>
                            <td>
                                    <form method="post" action="{{route('userspost.destroy', $post->id)}}" enctype="multipart/form-data">
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

</x-user-master>
