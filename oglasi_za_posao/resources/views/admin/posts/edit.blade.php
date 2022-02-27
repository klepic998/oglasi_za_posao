<x-admin-master>
    @section('content')
        <hr>
        <h1>Uredi oglas</h1>
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
           @csrf
            @method('PATCH')

            <div class="form-group mb-2">
                <label for="title"><b>Naslov</b></label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
            </div>
            <div class="form-group mb-2">
                <img height="100px" width="auto" src="{{asset("storage/images/$post->post_image")}}" alt="">
                <br>
                <label for="file"><b>Fotografija</b></label>
                <input type="file" name="post_image" class="form-control" id="post_image">
            </div>
            <div class="form-group mb-2">
                <label for="location"><b>Lokacija</b></label>
                <input type="text" name="location" class="form-control" id="location" value="{{$post->location}}">
            </div>
            <div class="form-group mb-2">
                <label for="address"><b>Adresa</b></label>
                <input type="text" name="address" class="form-control" id="address" value="{{$post->address}}">
            </div>
            <div class="form-group mb-2">
                <label for="body"><b>Sadržaj</b></label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
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
            <button type="submit" class="btn btn-primary"><b>Ažuriraj</b></button>
        </form>
    @endsection
</x-admin-master>
