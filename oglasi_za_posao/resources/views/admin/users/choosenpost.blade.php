<x-admin-master>
    @section('content')
        <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                <b>Autor oglasa</b>
                <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Kreiran {{$post->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid" height="500" width="500" src="{{asset("/storage/images/".$post->post_image)}}" alt="">

            <hr>

            <!-- Post Content -->
            <p>{{$post->body}}</p>

        @endsection
</x-admin-master>
