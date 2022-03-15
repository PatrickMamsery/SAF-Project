@extends('layouts.userdash')

@section('content')
    <div class="container">
        <div class="mt-3 py-3 px-0 custom-title">
            <h4 class="custom-title">
                Welcome, {{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}
            </h4>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    <div class="row">
                        <div class="col-md-6"><h5 class="text-center">User Details</h5></div>
                        <div class="col-md-6">
                            <a href="{{ route('membership_form') }}" class="p-0">
                                <button class="btn btn-custom">Update Profile</button>
                            </a>
                        </div>
                    </div>
                    <label for="Name">Name: </label> {{ $user->fname }} {{ $user->sname }} <br>
                    <label for="Voice">Voice: </label> {{ $user->voice }} <br>
                    <label for="Gender">Gender: </label> {{ $user->gender }}
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    @if (!$user->profilePhoto)
                        @if ($user->gender == 'male')
                            <div class="profile_img">
                                <img class="user_img" src="img/profile_photos/avatar.png" alt="user_profile">
                                <div class="overlay">
                                    <a class="btn btn-default btn-circle" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto">
                                        <i class='bx bxs-image-add'></i>
                                    </a>
                                </div>
                            </div>
                        @elseif ($user->gender == 'female')
                        <div class="profile_img">
                            <img class="user_img" src="img/profile_photos/avatar-female.png" alt="user_profile">
                            <div class="overlay">
                                <a class="btn btn-default btn-circle" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto">
                                    <i class='bx bxs-image-add'></i>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="profile_img">
                            <img class="user_img" src="img/profile_photos/avatar.png" alt="user_profile">
                            <div class="overlay">
                                <a class="btn btn-default btn-circle" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto">
                                    <i class='bx bxs-image-add'></i>
                                </a>
                            </div>
                        </div>
                        @endif

                    @elseif ($user->profilePhoto)
                    <div class="profile_img">
                        <img class="user_img" src="{{ $user->profilePhoto->path }}" alt="user_profile">
                        <div class="overlay">
                            <a class="btn btn-default btn-circle" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto">
                                <i class='bx bxs-image-add'></i>
                            </a>
                        </div>
                    </div>
                    @endif
                    

                    <!-- Add Photo Modal -->
                    <div class="modal fade" id="addProfilePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Change Profile Photo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                            <form id="photos-form" method="POST" enctype="multipart/form-data" action="addProfilePhoto">

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
                                    <input type="file" id="img-input" class="custom-file-input" name="profile_photo" required>
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
                </div>
            </div>
        </div>

        <!-- Posts content --->
        <div class="works-section mb-3" id="photo_posts">
            
            <div class="row mt-3">
                @foreach ($photos as $photo)
                    <div class="col-md-3 my-3">
                        <div class="work-img">
                            <img src="{{ $photo->path }}" alt="">
                        </div>
                        <div class="work-caption">
                            {{-- <p class="list-group-item-text" style="text-align: justify;">{{strip_tags(substr($photo->caption,0,300))}}</p> --}}
                            <div class="actions">
                                <a href="" class="btn btn-sm delete-photo" data-title="Delete Photo" data-toggle="modal" data-target="#deletePhoto" data-photo_id="{{ $photo->id }}" data-user_id="{{ $photo->user_id }}">
                                    <i class='bx bxs-trash-alt'></i>
                                </a> 
                                <a href="" class="btn btn-sm view-photo" data-title="View Photo" data-toggle="modal" data-target="#viewPhoto" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
                                    <i class='bx bx-show'></i>
                                </a>
                                <a href="" class="btn btn-sm" data-title="Add Photo" data-toggle="modal" data-target="#editPhoto">
                                    <i class='bx bxs-edit'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>


<!-- MODALS -->

<!-- Update Photo post modal -->
<div class="modal fade" id="viewPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
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
                </div>
            </div>

            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="{{ route('deletePhoto') }}">
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
</div>

<!-- Delete Photo post modal -->
<div class="modal fade" id="deletePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete Photo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <p class="text-center">
                Are you sure you want to delete this photo?
            </p>

            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="{{ route('deletePhoto') }}">
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.delete-photo').click(function(){
            // alert($(this).data('photo_id'));
            $('#photo-delete').val($(this).data('photo_id'));
        });
    });

    $(document).ready(function () {
        $('.view-photo').click(function(){
            // alert($(this).data('photo_id'));
            $('#photo-view').attr("src", $(this).data('photo_path'));
        });
    });
</script>
@endsection