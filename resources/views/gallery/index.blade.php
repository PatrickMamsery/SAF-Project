@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/gallery.css">
<link rel="stylesheet" href="/css/components/comments.css">
@endsection

@section('content')
    <div class="container">
        <div class="grid">
            <div class="grid-col grid-col--1">

            </div>
            <div class="grid-col grid-col--2">

            </div>
            <div class="grid-col grid-col--3">

            </div>
            <div class="grid-col grid-col--4">

            </div>

            {{-- Display uploaded photos --}}
            @foreach ($photos as $photo)
                <div class="grid-item">
                    <div class="content">
                        {{-- <h2>Photo</h2> --}}
                        <div class="overlay">
                            <a role="button" class="btn btn-dark btn-circle view-photo" data-title="View Photo" data-toggle="modal" data-target="#viewPhoto" data-photo_id="{{ $photo->id }}" data-user_id="{{ $photo->user_id }}" data-photo_path="{{ $photo->path }}">
                                <i class="material-icons">visibility</i>
                            </a>
                            <form action="/user/addLike" method="POST">
                                @csrf 
                                <input type="text" 
                                name="photo_id" style="display: none" value="{{ $photo->id }}">
                                <input type="text" 
                                name="user_id" style="display: none" value="{{ $photo->user_id }}">
                                <button type="submit" class="btn btn-dark btn-circle">
                                    <i class="material-icons {{ $photo->likes->count() != 0 ? "text-danger" : ""  }}">favorite_border</i>
                                </button>
                            </form>
                            <a href="" class="btn btn-dark btn-circle add-comment" data-title="Add Comment" data-toggle="modal" data-target="#addComment" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
                                <i class="material-icons {{ $photo->comments->count() != 0 ? "text-custom" : ""  }}">chat_bubble_outline</i>
                            </a>
                        </div>
                        {{-- <div class="bottom-tile">
                            more info
                        </div> --}}
                    </div>
                    <img src="{{ $photo->path }}" alt="pic">
                </div>
            @endforeach


        </div>
    </div>

    @auth
        <!-- Floating Action button for adding photo -->
        <div class="menu pmd-floating-action"  role="navigation"> 
            <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-light" data-title="Add Photo" data-toggle="modal" data-target="#addPhoto"> 
                <span class="pmd-floating-hidden">Add Photo</span>
                <i class="material-icons">add_photo_alternate</i>
            </a> 
            <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-light" data-title="Add Video"> 
                <span class="pmd-floating-hidden">Add Video</span> 
                <i class="material-icons">video_call</i> 
            </a>
            <a class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-custom" data-title="Add" href="javascript:void(0);"> 
                <span class="pmd-floating-hidden">Primary</span>
                <i class="material-icons pmd-sm">add</i> 
            </a> 
        </div>
    

    <!-- Add Photo Modal -->
    <div class="modal fade" id="addPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form id="photos-form" method="POST" enctype="multipart/form-data" action="addPhoto">

                <input type="hidden" class="form-control form-custom" id="user_id" name="user_id"
                  value="{{ auth()->user()->id }}">
    
                <div class="form-group form-elements form-group-custom label-floating co-md-12">
                  <label for="name" class="control-label">Uploaded by</label>
                  <input type="text" class="form-control form-custom" id="name" name="name"
                    value="{{ auth()->user()->fname }} {{ auth()->user()->sname }}" disabled required>
                </div>

                <div class="form-group form-elements form-group-custom label-floating co-md-12">
                    <label for="caption" class="control-label">Caption (Optional)</label>
                    <input type="text" class="form-control form-custom" id="caption" name="caption"
                      value="">
                  </div>

                {{-- <div class="form-group">
                    <input type="file" id="img-input" name="photo">
                    <div class="input-group">
                        <input type="text" readonly="" class="form-control" placeholder="Choose an image...">
                        <span class="input-group-btn input-group-sm">
                            <button type="button" class="btn btn-fab btn-fab-mini">
                                <i class="material-icons">attach_file</i>
                            </button>
                        </span>
                    </div>
                </div> --}}

                <div class="custom-file text-center" id="root">
                    <input type="file" id="img-input" class="custom-file-input" name="photo" required>
                    <label for="img-input" class="custom-file-label">Choose photo...</label>
                </div>

    
                {{ csrf_field() }}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-custom">Add photo</button>
                </div>
              </form>
            </div>
    
          </div>
        </div>
    </div>
    @endauth

<!-- View Photo modal -->
<div class="modal fade" id="viewPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Photo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img id="photo-view" src="" alt="photo" style="width: 100%">
                </div>
                <div class="col-md-6">
                    <h6 class="text-center">Photo Details</h6>
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td>Posted By: </td>
                                <td>{{ $photo->user_id }}</td>
                            </tr>
                            <tr>
                                <td>Posted On: </td>
                                <td>{{ $photo->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Likes: </td>
                                <td>{{ $photo->likes->count() }}</td>
                            </tr>
                            <tr>
                                <td>Views: </td>
                                <td>{{ $photo->views->count() }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <h3 class="text-center">Comments</h3>
                        @if ($photo->comments->count() < 1)
                            <p>No comments posted</p>
                        @elseif ($photo->comments->count() != 0)
                            @foreach ($photo->comments as $comment)
                                <div class="card">
                                    <div class="card-header">
                                        {{ $comment->user_id }}
                                    </div>
                                    <div class="card-body">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <form method="POST" enctype="multipart/form-data" action="{{ route('addComment') }}">
                            {{ csrf_field() }}
                            <div class="form-group form-elements form-group-custom label-floating co-md-12">
                                <label for="caption" class="control-label">Comments</label>
                                <input type="text" class="form-control form-custom" id="comment" name="comment" value="" placeholder="Add any comment... civility is advised">
                            </div>
                            <input type="hidden" class="form-control form-custom" id="user_id" name="user_id">
                            <input type="hidden" class="form-control form-custom" id="photo-comment" name="photo_id">
            
                            <button type="submit" class="btn btn-custom">Post Comment</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="">
                {{ csrf_field() }}
                <button type="button" class="btn btn-custom" data-dismiss="modal">Done</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>

    <!-- Add Comment Modal -->
    {{-- <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Photo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="container mt-5 comments">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="headings d-flex justify-content-between align-items-center mb-3">
                                <h5>Unread comments(6)</h5>
                                <div class="buttons"> <span class="badge bg-white d-flex flex-row align-items-center"> <span class="text-primary">Comments "ON"</span>
                                        <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked> </div>
                                    </span> </div>
                            </div>
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span> </div> <small>2 days ago</small>
                                </div>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                                    <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                                </div>
                            </div>
                            <div class="card p-3 mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile! </small></span> </div> <small>3 days ago</small>
                                </div>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                                    <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                                </div>
                            </div>
                            <div class="card p-3 mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/0LKZQYM.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using? </small></span> </div> <small>3 days ago</small>
                                </div>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                                    <div class="icons align-items-center"> <i class="fa fa-user-plus text-muted"></i> <i class="fa fa-star-o text-muted"></i> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                                </div>
                            </div>
                            <div class="card p-3 mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/ZSkeqnd.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold text-primary">@macky_lones</small> <small class="font-weight-bold text-primary">@rashida_jones</small> <small class="font-weight-bold">Thanks </small></span> </div> <small>3 days ago</small>
                                </div>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-4"> <small>Remove</small> <span class="dots"></span> <small>Reply</small> <span class="dots"></span> <small>Translate</small> </div>
                                    <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer">
                <form method="POST" enctype="multipart/form-data" action="">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control form-custom" id="user_id" name="user_id">
                    <input type="hidden" class="form-control form-custom" id="photo-delete" name="photo_id">
    
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-custom">Delete</button>
                </form>
                </div>
            </div>
    
            </div>
        </div>
    </div> --}}

    <script src="https://unpkg.com/colcade@0/colcade.js"></script>
    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });
    </script>
    <script src="js/photo_resize.js"></script>
    <script src="js/addPhotoAttributes.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.add-comment').click(function(){
                // alert($(this).data('photo_id'));
                $('#add-comment').attr("src", $(this).data('photo_path'));
            });
        });

        $(document).ready(function () {
            $('.view-photo').click(function(){
                // alert($(this).data('photo_id'));
                $('#photo-view').attr("src", $(this).data('photo_path'));
                $('#photo-comment').val($(this).data('photo_id'));
                $('#user_id').val($(this).data('user_id'));
            });
        });
    </script>
@endsection