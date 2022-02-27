<x-user-master>
    @section('head')
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Moj profil</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    @endsection
    @section('content')
            <head>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>

            <body>

            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-3" width="200px" height="200px" src="{{asset("/storage/avatars/$user->avatar")}}">
                            <span class="font-weight-bold mt-3" >{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-right">Moj profil</h3>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Ime</label>
                                    <p class="form-control">{{$user->name}} </p>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <p class="form-control">{{$user->email}}</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Avatar</label>
                                    <p class="form-control">{{$user->avatar}}</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Ukupan broj oglasa</label>
                                    <h5>{{$user->posts->count()}}</h5>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Ukupan broj komentara</label>
                                    <h5>{{$user->comments->count()}}</h5>
                                </div>
                                <div class="mt-5 text-center col-md-6">
                                    <a href="{{route('edit.profile',$user)}}" class="btn btn-primary mr-5">Izmijeni</a>
                                </div>
                                <div class="mt-5 text-center col-md-4">
                                    <form method="post" action="{{route('profile.delete',$user)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger profile-button" type="submit">Obriši profil</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            </body>
    @endsection
</x-user-master>
