<x-admin-master>
    @section('content')
        <hr>
        <h1>Kreiraj kategoriju</h1>
    <div class="col-md-6">
        <form method="post" action="{{route('category.store')}}">
            @csrf

            <div class="form-group mb-3">
                <label for="name"><b>Naziv kategorije</b></label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" placeholder="Naziv kategorije" required>
            </div>

            <button type="submit" class="btn btn-primary">Kreiraj</button>
        </form>
    </div>
    @endsection
</x-admin-master>
