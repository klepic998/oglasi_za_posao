<x-user-master>
    @section('head')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kreiraj novi oglas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset("css/styles.css")}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    @endsection
    @section('content')
    <h1>Novi oglas</h1>
    <form method="post" action="{{route('userspost.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-2">
            <label for="title">Naslov</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Unesi naslov">
        </div>
        <div class="form-group mb-2">
            <label for="file">Fotografija</label>
            <input type="file" name="post_image" class="form-control" id="post_image">
        </div>
        <div class="form-group mb-2">
            <label for="location">Lokacija</label>
            <input type="text" name="location" class="form-control" id="location">
        </div>
        <div class="form-group mb-2">
            <label for="address">Adresa</label>
            <input type="text" name="address" class="form-control" id="address">
        </div>
        <div class="form-group mb-2">
            <label for="body">Sadržaj</label>
            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group mb-2">
            <label for="address"><b>Kategorija</b></label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Izaberi kategoriju</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">Da li želite da dobijete obavještenje kada neko komentariše Vaš oglas?</label>
            <label><input type="radio" name="get_notification" id="get_notification" value="1"> Da </label>
            <label><input type="radio" name="get_notification" id="get_notification" value="0"> Ne </label>
        </div>
        <button type="submit" class="btn btn-primary">Kreiraj</button>
    </form>
    @endsection
</x-user-master>
