<x-admin-master>
    @section('content')
        <hr>
        <h1>Uređivanje kategorije</h1>
        <div class="col-md-6">
            <form method="post" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('PATCH')

                <div class="form-group mb-3">
                    <label for="name"></label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="{{$category->name}}" required>
                </div>

                <button type="submit" class="btn btn-primary">Ažuriraj</button>
            </form>
        </div>
    @endsection
</x-admin-master>
