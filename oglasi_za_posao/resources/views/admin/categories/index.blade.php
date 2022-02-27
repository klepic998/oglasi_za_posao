<x-admin-master>
    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-danger"> {{Session::get('message')}}  </div>
        @elseif(Session::has('category-deleted-message'))
            <div class="alert alert-success"> {{Session::get('category-deleted-message')}}  </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <b>Pregled kategorija|Ukupan broj kategorija: {{$categories->count()}}</b>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Ukupan broj oglasa</th>
                        <th>Brisanje</th>
                        <th>Uređivanje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Ime</th>
                        <th>Ukupan broj oglasa</th>
                        <th>Uređivanje</th>
                        <th>Brisanje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts()->count()}}</td>
                            <td><a class="btn btn-warning" href="{{route('category.edit', $category->id)}}">Uredi</a></td>
                            <td>
                                    <form method="post" action="{{route('category.destroy', $category->id)}}" enctype="multipart/form-data">
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
