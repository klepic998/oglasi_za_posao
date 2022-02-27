<x-user-master>
    @section('head')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Uredi oglas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    @endsection
    @section('content')
        <h1>Uredi svoj oglas</h1>
        <form method="post" action="{{route('userspost.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title"><b>Naslov</b></label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Unesi novi naslov" value="{{$post->title}}">
            </div>
            <div class="form-group">

                <img height="100px" width="auto" src="{{asset("storage/images/".$post->post_image)}}" alt="">
                <br>
                <label for="file"><b>Fotografija</b></label>
                <input type="file" name="post_image" class="form-control" id="post_image">
            </div>
            <div class="form-group">
                <label for="location"><b>Lokacija</b></label>
                <input type="text" name="location" class="form-control" id="location" value="{{$post->location}}">
            </div>
            <div class="form-group">
                <label for="address"><b>Adresa</b></label>
                <input type="text" name="address" class="form-control" id="address" value="{{$post->address}}">
            </div>
            <div class="form-group">
                <label for="address"><b>Sadržaj</b></label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <div class="form-group mb-2">
                <label for="address"><b>Kategorija</b></label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj</button>
        </form>
    @endsection
</x-user-master>
