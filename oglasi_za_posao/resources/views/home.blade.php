<x-home-master>

@section('content')


        <!-- Blog Post -->
       @foreach($posts as $post)
                <div class="card mb-3" style="max-width: 740px;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{asset("/storage/images/$post->post_image")}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text"><b>Autor oglasa</b> {{$post->user->name}}</p>
                                <p class="card-text"><b>Lokacija</b> {{$post->address . ", " . $post->location}}</p>
                                <p class="card-text">{{Str::limit($post->body,'50','...')}}</p>
                                <a href="{{route('post', $post->id)}}" class="btn btn-primary mb-2">Nastavak...</a>
                                <div class="card-footer text-muted">
                                    Postavljeno {{$post->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            {{$posts->links()}}
        </ul>

@endsection
    @section('category_nav')
        <div class="card my-4">
            <h5 class="card-header bg-primary text-white-50" >Kategorije</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            @foreach($categories_nav as $category_nav)
                            <li>
                                <a href="{{route('search.category',$category_nav->category->id)}}">{{$category_nav->category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-home-master>
