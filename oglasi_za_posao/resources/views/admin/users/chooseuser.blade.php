<x-admin-master>
    @section('content')
        <div class="form-group">
            <form method="get" action="{{route('users.posts')}}">
               @csrf
                <label for="user">Korisnik:</label>
                <select name="user" id="user">
                        <option value="">Izaberi korisnika</option>
                        @foreach($users as $user)
                                <option name="user" value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach

                 </select>
                <button type="submit">Dalje</button>
            </form>
        </div>

    @endsection
</x-admin-master>
