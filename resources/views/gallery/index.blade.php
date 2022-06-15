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
                            <a role="button" class="btn btn-dark btn-circle view-photo" data-bs-title="View Photo" data-bs-toggle="modal" data-bs-target="#viewPhoto" data-bs-photo_id="{{ $photo->id }}" data-bs-user_id="{{ $photo->user_id }}" data-bs-photo_path="{{ $photo->path }}">
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
                            <a href="" class="btn btn-dark btn-circle add-comment" data-bs-title="Add Comment" data-bs-toggle="modal" data-bs-target="#addComment" data-bs-photo_id="{{ $photo->id }}" data-bs-photo_path="{{ $photo->path }}">
                                <i class="material-icons {{ $photo->comments->count() != 0 ? "text-custom" : ""  }}">chat_bubble_outline</i>
                            </a>
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
    </div>
@endsection

@section('javascript')

{{-- <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="/js/animations.js" type="text/javascript"></script> --}}
<script src="/packages/propeller/propeller.min.js"></script>
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
            $('#photo-view').attr("src", $(this).data('photo_path'));
            $('#photo-comment').val($(this).data('photo_id'));
            $('#user_id').val($(this).data('user_id'));
        });
    });
</script>

@endsection