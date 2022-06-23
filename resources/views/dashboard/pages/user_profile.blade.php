<div class="container user-profile">
    <div class="main-body">
    
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @if (!$user->profilePhoto)
                            @if ($user->gender == 'male')
                            <img class="rounded-circle" src="/img/profile_photos/avatar.png" alt="user_profile" width="150">
                            <a class="btn btn-outline-success" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto" data-user_id="{{ $user->id }}">
                                <span>
                                    <i class='bx bxs-image-add'></i>
                                </span>
                                <span>Change image</span>
                            </a>
                            @elseif ($user->gender == 'female')
                            <img class="rounded-circle" src="/img/profile_photos/avatar-female.png" alt="user_profile" width="150">
                            <a class="btn btn-outline-success" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto" data-user_id="{{ $user->id }}">
                                <span>
                                    <i class='bx bxs-image-add'></i>
                                </span>
                                <span>Change image</span>
                            </a>
                            @else
                            <img class="rounded-circle" src="/img/profile_photos/avatar.png" alt="user_profile" width="150">
                            <a class="btn btn-outline-success" data-title="Add Photo" data-toggle="modal" data-target="#addProfilePhoto" data-user_id="{{ $user->id }}">
                                <span>
                                    <i class='bx bxs-image-add'></i>
                                </span>
                                <span>Change image</span>
                            </a>
                            @endif

                        @elseif ($user->profilePhoto)
                        <img class="rounded-circle" src="{{ $user->profilePhoto->path }}" alt="user_profile" width="150">
                        <a class="btn btn-outline-success edit-profile-photo" data-title="Add Photo" data-toggle="modal" data-target="#editProfilePhoto" data-photo_id="{{ $user->profilePhoto->id }}" data-user_id="{{ $user->id }}">
                            <span>
                                <i class='bx bxs-image-add'></i>
                            </span>
                            <span>Change image</span>
                        </a>
                        @endif

                        <div class="mt-3">
                            <h4>{{ $user->fname }} {{ $user->sname }}</h4>
                            <p class="text-secondary mb-1">{{ ucfirst($user->userRole->title) }}</p>
                            <p class="text-muted font-size-sm">Dar Es Salaam, Tanzania</p>
                            <button class="btn btn-custom">Follow</button>
                            <button class="btn btn-outline-success">Message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <i class="bx bx-calendar"></i>
                            <h6 class="mb-0 px-2">Date of Registry</h6>
                        </div>
                        <span class="text-secondary">{{ $user->entrydate ? $user->entrydate : $user->created_at->toFormattedDateString() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <i class="bx bx-paper-plane"></i>
                            <h6 class="mb-0 px-2">Posts</h6>
                        </div>
                        <span class="text-secondary">0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <i class="bx bx-like"></i>
                            <h6 class="mb-0 px-2">Likes</h6>
                        </div>
                        <span class="text-secondary">0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <i class="bx bxl-instagram"></i>
                            <h6 class="mb-0 px-2">Instagram</h6>
                        </div>
                        <span class="text-secondary">bootdey</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->fname }} {{ $user->sname }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        (+255){{ $user->phone }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Voice</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ ucfirst($user->voice) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ ucfirst($user->gender) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a class="btn btn-custom" target="" href="{{ route('membership_form') }}">Edit Profile</a>
                    </div>
                </div>
            </div>
            </div>

            <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="my-3 text-center">Password Reset</h6>
                            <form action="{{ route('user.passwordReset', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <input type="password" class="form-control" name="current_password" id="pwd" aria-describedby="pwdHelp" placeholder="Current Password">
                                </div>
                                <div class="mb-2">
                                    <input type="password" class="form-control" name="password" id="pwd" aria-describedby="pwdHelp" placeholder="New Password">
                                    <div id="pwdHelp" class="form-text">Make sure your password is strong.</div>
                                </div>
                                <div class="mb-2">
                                    <input type="password" class="form-control" name="password_confirmation" id="" aria-describedby="pwdHelp" placeholder="Confirm password">
                                </div>
                                <button type="submit" class="btn btn-custom">Change</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                    <div class="card-body text-center">
                        <p>More Manipulation</p>
                    </div>
                    </div>
                </div>
            </div>



        </div>
        </div>

        </div>
</div>

<!-- Add Photo Modal -->
<div class="modal fade" id="addProfilePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Change Profile Photo</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="photos-form" method="POST" enctype="multipart/form-data" action="/addProfilePhoto">

            <input type="hidden" class="form-control form-custom" id="user_id" name="user_id"
            value="{{ auth()->user()->id }}">

            <div class="form-group form-elements form-group-custom label-floating co-md-12">
            <label for="name" class="control-label">Uploaded by</label>
            <input type="text" class="form-control form-custom" id="name" name="name"
                value="{{ auth()->user()->fname }} {{ auth()->user()->sname }}" disabled required>
            </div>

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

<!-- Edit Profile Photo Modal -->
<div class="modal fade" id="editProfilePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Change Profile Photo</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="" method="POST" enctype="multipart/form-data" action="/editProfilePhoto">

            <div class="form-group form-elements form-group-custom label-floating co-md-12">
            <label for="name" class="control-label">Uploaded by</label>
            <input type="text" class="form-control form-custom" id="name" name="name"
                value="{{ auth()->user()->fname }} {{ auth()->user()->sname }}" disabled required>
            </div>

            <div class="custom-file text-center" id="root">
                <input type="file" id="img-input" class="custom-file-input" name="profile_photo" required>
                <label for="img-input" class="custom-file-label">Choose photo...</label>
            </div>
            <input type="hidden" class="form-control form-custom" id="user_profile" name="user_id">
            <input type="hidden" class="form-control form-custom" id="profile-photo-edit" name="profile_photo_id">

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