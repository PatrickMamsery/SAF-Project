@extends('layouts.app')

@section('styles-links')
<link rel="stylesheet" href="/css/gallery.css">
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
                        <div>
                            <button class="btn btn-dark btn-circle btn-xs">
                                <i class="material-icons">visibility</i>
                            </button>
                            <button class="btn btn-dark btn-circle btn-xs">
                                <i class="material-icons">favorite_border</i>
                            </button>
                        </div>
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

    <script src="https://unpkg.com/colcade@0/colcade.js"></script>
    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });
    </script>
@endsection