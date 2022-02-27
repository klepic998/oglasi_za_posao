<x-home-master>
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
<img class="img-fluid" src="{{asset("/storage/images/".$post->post_image)}}" alt="">

<hr>

<!-- Post Content -->
<p>{{$post->body}}</p>

<hr>

<!-- Comments Form -->
    <form method="post" action="{{route('store.comment',$post->id)}}" >
        @csrf
                <div class="card my-4">
                  <h5 class="card-header">Unesi komentar:</h5>
                  <div class="card-body">

                      <div class="form-group">
                          @if(!Auth::user())

                              <input type="text" name="nickname" id="nickname" placeholder="Unesite ime" required>

                          @endif
                        <textarea name="body" class="form-control mt-2" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary mt-2">Pošalji</button>
                  </div>
                </div>
    </form>
    <div class="card my-4">
        <div class="card-body">

            @foreach($post->comments as $comment)
                <div class="media mb-4">
                    <div class="media-body">
                        {{-- Show comments--}}
                        <form class="form-control">
                             @if($comment->post_id === $post->id)
                                 @if(!$comment->nickname)
                                     <div class="row">
                                         <div class="col-md-1">
                                             <img class="rounded-circle" width="60px" height="60px" src="{{asset("/storage/avatars/".$comment->user->avatar)}}" alt=".....">
                                         </div>
                                         <div class="col-md-2">
                                             <h5 class="mt-3">{{$comment->user->name}}</h5>
                                         </div>
                                     </div>
                                 @else

                                    <h5 class="mt-0">Gost - {{$comment->nickname}}</h5>
                                 @endif
                                     <hr>
                                    <p class="mb-2">{{$comment->body}}</p>
                                     <hr>
                                     <p class="text-muted text-height:10px">Kreiran {{$comment->created_at}}</p>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    @endsection
</x-home-master>
