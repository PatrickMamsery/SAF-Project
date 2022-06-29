@extends('layouts.app')


@section('styles-links')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('packages/propeller/dist/css/propeller.min.css') }}">
@endsection

@section('content')
    <div class="gallery">
        <div class="grid">
            <!-- columns -->
            <div class="grid-col grid-col--1"></div>
            <div class="grid-col grid-col--2"></div>
            <div class="grid-col grid-col--3"></div>
            <div class="grid-col grid-col--4"></div>
            <!-- items -->
            @foreach ($photos as $photo)
                <div class="grid-item">
                    <div class="content">
                        <div class="overlay">
                            <a role="button" class="btn btn-dark btn-circle view-photo" data-bs-title="View Photo" data-bs-toggle="modal" data-bs-target="#viewPhoto" data-photo_by="{{ $photo->user->fname }} {{ $photo->user->sname }}" data-photo_on="{{ $photo->created_at->diffForHumans() }}" data-photo_details_likes="{{ $photo->likes->count() }}" data-photo_details_views="{{ $photo->views->count() }}" data-photo_id="{{ $photo->id }}" data-user_id="{{ Auth::check() ? auth()->user()->id : 1 }}" data-photo_path="{{ $photo->path }}" data-photo_caption="{{ $photo->caption == NULL ? 'No Caption' : strip_tags(substr($photo->caption,0,300)) }}">
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
                            <a href="" class="btn btn-dark btn-circle add-comment" data-bs-title="Add Comment" data-bs-toggle="modal" data-bs-target="#addComment" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
                                <i class="material-icons {{ $photo->comments->count() != 0 ? "text-custom" : ""  }}">chat_bubble_outline</i>
                            </a>
                        </div>
                        <div class="phone-only dropdown">
                            <a href="#" role="button" class="btn btn-dark btn-circle add-comment" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons {{ $photo->comments->count() != 0 ? "text-custom" : ""  }}">more_vert</i>
                            </a>
                            <div class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item view-photo" type="button" data-bs-title="View Photo" data-bs-toggle="modal" data-bs-target="#viewPhoto" data-photo_by="{{ $photo->user->fname }} {{ $photo->user->sname }}" data-photo_on="{{ $photo->created_at->diffForHumans() }}" data-photo_details_likes="{{ $photo->likes->count() }}" data-photo_details_views="{{ $photo->views->count() }}" data-photo_id="{{ $photo->id }}" data-user_id="{{ Auth::check() ? auth()->user()->id : 1 }}" data-photo_path="{{ $photo->path }}" data-photo_caption="{{ $photo->caption == NULL ? 'No Caption' : strip_tags(substr($photo->caption,0,300)) }}">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <form action="/user/addLike" method="POST">
                                    @csrf 
                                    <input type="text" 
                                    name="photo_id" style="display: none" value="{{ $photo->id }}">
                                    <input type="text" 
                                    name="user_id" style="display: none" value="{{ $photo->user_id }}">
                                    <button type="submit" class="dropdown-item">
                                        <i class="material-icons {{ $photo->likes->count() != 0 ? "text-danger" : ""  }}">favorite_border</i>
                                    </button>
                                </form>
                                <a class="dropdown-item" type="button">
                                    <i class="material-icons {{ $photo->comments->count() != 0 ? "text-custom" : ""  }}">chat_bubble_outline</i>
                                </a>
                            </div>
                        </div>
                        <img src="{{ $photo->path }}" alt="pic">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="gallery-ext">
        @auth
            <!-- Floating Action button for adding photo -->
            <div class="menu pmd-floating-action"  role="navigation"> 
                <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-light" data-bs-title="Add Photo" data-bs-toggle="modal" data-bs-target="#addPhoto"> 
                    <span class="pmd-floating-hidden">Add Photo</span>
                    <i class="material-icons">add_photo_alternate</i>
                </a> 
                <a href="javascript:void(0);" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-light" data-bs-title="Add Video"> 
                    <span class="pmd-floating-hidden">Add Video</span> 
                    <i class="material-icons">video_call</i> 
                </a>
                <a class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-custom" data-bs-title="Add" href="javascript:void(0);"> 
                    <span class="pmd-floating-hidden">Primary</span>
                    <i class="material-icons pmd-sm">add</i> 
                </a> 
            </div>
        

            <!-- Add Photo Modal -->
            <div class="modal" style="width: 100% !important" id="addPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                {{-- <span aria-hidden="true">&times;</span> --}}
                            </button>
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

                            <div class="custom-file" id="root">
                                <input type="file" id="img-input" class="custom-file-input" name="photo" required>
                                <label for="img-input" class="custom-file-label d-flex">
                                    <span><i class="material-icons">file_upload</i></span>
                                    Choose photo
                                </label>
                            </div>

                
                            {{ csrf_field() }}
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Photo</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="photo-view" src="" alt="photo" style="width: 100%">
                            <div class="caption text-align center">
                                <p id="photo-caption"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-center">Photo Details</h6>
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <td>Posted By: </td>
                                        <td id="photo-details-postedBy"></td>
                                    </tr>
                                    <tr>
                                        <td>Posted On: </td>
                                        <td id="photo-details-postedOn"></td>
                                    </tr>
                                    <tr>
                                        <td>Likes: </td>
                                        <td id="photo-details-likes"></td>
                                    </tr>
                                    <tr>
                                        <td>Views: </td>
                                        <td id="photo-details-views"></td>
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
                                                {{-- <img src="{{ $comment->user->profilePhoto->path ? $comment->user->profilePhoto->path : '/img/profile_photos/avatar.png' }}" width="25" height="25" alt="profile"> --}}
                                                {{ $comment->user->fname }} {{ $comment->user->sname }}
                                            </div>
                                            <div class="card-body">
                                                {{ $comment->body }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @auth
                                    <form method="POST" enctype="multipart/form-data" action="{{ route('addComment') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group form-elements form-group-custom label-floating co-md-12">
                                            <label for="caption" class="control-label">Comments</label>
                                            <input type="text" class="form-control form-custom" id="comment" name="comment" value="" placeholder="Add any comment... civility is advised">
                                        </div>
                                        <input type="hidden" class="form-control form-custom" id="user" name="user_id">
                                        <input type="hidden" class="form-control form-custom" id="photo-comment" name="photo_id">
                        
                                        <button type="submit" class="btn btn-custom">Post Comment</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <form method="POST" enctype="multipart/form-data" action="">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Done</button>
                    </form>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

{{-- <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="/js/animations.js" type="text/javascript"></script> --}}
{{-- <script src="/packages/propeller/propeller.min.js"></script> --}}
<script src="https://unpkg.com/colcade@0/colcade.js"></script>
<script src="js/photo_resize.js"></script>

<script>
    $('.grid').colcade({
        columns: '.grid-col',
        items: '.grid-item'
    })

    $(document).ready(function () {
        $('.view-photo').click(function(){
            // alert($(this).data('photo_id'));
            $('#photo-details-likes').html($(this).data('photo_details_likes'));
            $('#photo-details-views').html($(this).data('photo_details_views'));
            $('#photo-details-postedBy').html($(this).data('photo_by'));
            $('#photo-details-postedOn').html($(this).data('photo_on'));
            $('#photo-view').attr("src", $(this).data('photo_path'));
            $('#photo-comment').val($(this).data('photo_id'));
            $('#photo-caption').text($(this).data('photo_caption'));
            $('#user').val($(this).data('user_id'));
        });
    });
</script>

@endsection