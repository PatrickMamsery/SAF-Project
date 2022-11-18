<div class="container mt-4 px-2">
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <form action="">
            <div class="position-relative"> 
                {{-- <span class="position-absolute search"><i class="bx bx-search"></i></span>  --}}
                <input class="form-control w-100" id="search" placeholder="Search by name..." onkeyup="showResult(this.value)"> 
                <div id="livesearch"></div>
            </div>
        </form>
        <div class="px-2 d-flex flex-row gap-3">
            {{-- <span>
                <form action="{{ route('admin.sendWelcomeEmails') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-success" type="submit">Send Emails</button>
                </form>
            </span> --}}
            <span><button class="btn btn-success" data-toggle="modal" data-target="#bulk">Bulk upload users</button></span>
            <span>Filters <i class="bx bx-chevron-down"></i></span> 
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-borderless yajra-datatable" id="allusers">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="5%"><input id="check_all" class="form-check-input" type="checkbox"></th>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Created</th>
                    <th scope="col" width="10%">Status</th>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="10%">Role</th>
                    <th scope="col" class="text-end" width="20%"><span># of Posts</span></th>
                    <th scope="col" width="10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>

                @foreach ($users as $user)
                <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox" name="user[]" value="{{ $user->id }}"></th>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{ $user->joindate ? $user->joindate : $user->created_at ? $user->created_at->toFormattedDateString() :  "Unknown"}}
                    </td>
                    <td>
                        <i class="bx bx-check-circle text-success"></i><span class="ms-1">Verified</span>
                    </td>
                    <td>
                        <a href="/user/user_profile/{{ $user->id }}" class="text-reset">
                            <img class="rounded-circle" src="{{ $user->profilePhoto != NULL ? $user->profilePhoto->path : '/img/profile_photos/avatar.png' }}" width="25" height="25" style="object-fit: cover; border-radius: 50%"> {{ $user->fname }} {{ $user->sname }}
                        </a>
                    </td>
                    <td>
                        <span class="badge rounded-pill {{ $user->userRole->title == 'admin'? 'bg-success': ($user->userRole->title == 'root'? 'bg-danger' : 'bg-dark') }} text-light">
                            {{ ucfirst($user->userRole->title) }}
                            <i class="bx bxs-lock"></i>
                        </span>
                    </td>
                    <td class="text-end">
                        <span class="fw-bolder">{{ $user->photos? $user->photos->count() : 0 }}</span> 
                    </td>
                    <td>
                        <span>
                            <a href="#" class="text-reset delete-user" data-title="Delete User" data-toggle="modal" data-target="#deleteUser" data-user_id="{{ $user->id }}">
                                <i class="bx bxs-trash-alt text-danger"></i>
                            </a>
                        </span>
                        <span>
                            @if ($user->userRole->title == 'user')
                                <a href="javascript:void(0);" class="text-reset elevate-user-role" data-title="Edit User Roles" data-toggle="modal" data-target="#elevateUserRole" data-user_id="{{ $user->id }}">
                                    <i class='bx bxs-user'></i>
                                </a>
                            @else
                                <a href="javascript:void(0);" class="text-reset demote-access" data-title="Edit User Roles" data-toggle="modal" data-target="#demoteAccess" data-user_id="{{ $user->id }}">
                                    <i class='bx bxs-user'></i>
                                </a>
                            @endif
                        </span>
                        <span>
                            <a href="javascript:void(0)" class="text-reset reset-password" data-toggle="modal" data-target="#resetPasswordModal" data-user_id="{{ $user->id }}">
                                <i class="bx bxs-lock text-success"></i>
                            </a>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{$users->links("pagination::bootstrap-4")}}
    </div>
</div>

<!-- Elevate User Role to Admin modal -->
<div class="modal fade" id="elevateUserRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Elevate User Role</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.elevateUserRole') }}">
                <p class="text-center">
                    Are you sure you want to make user an Admin?
                </p>
                <div class="modal-footer">
                    
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control form-custom" id="user-elevate" name="user_id">

                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-custom">Confirm Elevation</button>
                    
                </div>
            </form>
        </div>

        </div>
    </div>
</div>

<!-- Demote Admin/Root to User modal -->
<div class="modal fade" id="demoteAccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Demote Admin</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.demoteAccess') }}">
                <p class="text-center">
                    Are you sure you want to remove Admin priviledges?
                </p>
                <div class="modal-footer">
                    
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control form-custom" id="admin-demote" name="user_id">

                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-custom">Confirm Demotion</button>
                    
                </div>
            </form>
        </div>

        </div>
    </div>
</div>

<!-- Delete User modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete User</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-center">
                Are you sure you want to delete this user?
            </p>
            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.deleteUser') }}">
                {{ csrf_field() }}
                <input type="hidden" class="form-control form-custom" id="admin-delete-user" name="user_id">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger disabled">Delete</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>

<!-- Reset User Default Password -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reset Default Password</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to reset this user's password?
                </p>
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.resetPassword')}}">
    
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="password-reset">
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-custom">Confirm Reset</button>
                </div>
    
                </form>
            </div>
        
        </div>
    </div>
</div>


<!-- Bulk Upload Users Modal -->
<div class="modal fade" id="bulk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Upload excel file</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.bulkUploadUsers') }}">
                    @csrf
                    <div class="file-upload-wrapper">
                        <input type="file" id="file" name="file" class="bg-light" data-height="500"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-custom">Save</button>
            </div>
            </form> {{-- End of form to upload --}}
        </div>
    </div>
</div>