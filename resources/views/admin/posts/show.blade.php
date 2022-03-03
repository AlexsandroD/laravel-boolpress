@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">

                    <div>
                        @if ($post->image)
                            <img src="{{asset('storage/'. $post->image) }}" alt="post image">
                        @endif
                    </div>

                    <div>
                        <strong>Stato:</strong>
                        @if ($post->published)
                         <span class="badge badge-success p-1 m-3">Pubblicato</span>
                        @else
                         <span class="badge badge-secondary p-1 m-3">Bozza</span>
                        @endif
                    </div>

                    <div>
                        @if($post->category)
                            <strong>Category: {{ $post->category->name}}</strong>
                        @endif
                    </div>

                    <div>
                        @if(count($post->tags) > 0)
                            <strong>Tag:</strong>
                            @foreach ($post->tags as $tag)
                                 <span class="badge badge-primary p-1 m-3">{{ $tag->name }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div>
                        {{ $post->content }}
                    </div>
                     @if(count($post->comments) > 0)
                     <div>
                         <h3>Commenti</h3>
                         <table class="table table-dark">
                                 <tbody>
                                     @foreach ($post->comments as $comment)
                                        <tr>
                                            <td>{{ $comment->content }}</td>
                                            <td>
                                                @if(!$comment->approved)
                                                <form action="{{ route('comments.update',$comment->id) }}" method="POST">
                                                    @csrf
                                                    @method("PATCH")
                                                    <input type="hidden" name="approved" value='1'>
                                                    <button type="submit" class="btn btn-success">Approva</button>
                                                </form>
                                                @else
                                                    Approvato
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                     @endforeach
                                 </tbody>
                         </table>
                     </div>
                     @endif



                   <div class="d-flex my-2">
                       <a class="btn btn-info " href="{{ route("posts.edit",$post->id) }}" role="button">Edit</a>

                       <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                           @csrf
                           @method("DELETE")
                           <button type="submit" class="btn btn-danger mx-2">Delete</button>
                       </form>

                         <a class="btn btn-secondary " href="{{ route("posts.index") }}" role="button">Back</a>

                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


