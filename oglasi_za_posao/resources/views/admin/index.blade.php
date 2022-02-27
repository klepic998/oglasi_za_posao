<x-admin-master>
    @section('content')

    <h1 class="h3 mb-4 text-gray-800">Dobrodošao</h1>

                <a class="nav-link" href="{{route('posts.index')}}">Lista svih oglasa</a>


                <a class="nav-link" href="{{route('category.index')}}">Lista svih kategorija</a>

                <a class="nav-link" href="{{route('users.index')}}">Lista svih korisnika</a>

                <a class="nav-link" href="{{route('comments.show')}}">Lista svih komentara</a>

    @stop
</x-admin-master>
