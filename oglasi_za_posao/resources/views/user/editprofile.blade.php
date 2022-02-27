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
                        <form method="post" action="{{route('update.profile',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row mt-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="labels">Ime</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input class="form-control" type="text" name="email" value="{{$user->email}}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Avatar</label>
                                    <input class="form-control" name="avatar" type="file">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Ukupan broj postova</label>
                                    <h5>{{$user->posts->count()}}</h5>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Ukupan broj komentara</label>
                                    <h5>{{$user->comments->count()}}</h5>
                                </div>
                                <div class="mt-5 text-center col-md-6">
                                    <button class=" mr-5 btn btn-primary profile-button" type="submit">Potvrdi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </body>
    @endsection
</x-user-master>
