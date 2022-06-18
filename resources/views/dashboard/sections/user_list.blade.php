<div class="container mt-5 px-2">
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <div class="position-relative"> 
            {{-- <span class="position-absolute search"><i class="bx bx-search"></i></span>  --}}
            <input class="form-control w-100" placeholder="Search by name..."> 
        </div>
        <div class="px-2"> <span>Filters <i class="bx bx-chevron-down"></i></span> </div>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="5%"><input id="check_all" class="form-check-input" type="checkbox"></th>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Date</th>
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
                    <td>1 Oct, 21</td>
                    <td><i class="bx bx-check-circle green"></i><span class="ms-1">Verified</span></td>
                    <td>
                        <a href="/user/user_profile/{{ $user->id }}" class="text-reset">
                            <img class="rounded-circle" src="{{ $user->profilePhoto != NULL ? $user->profilePhoto->path : '/img/profile_photos/avatar.png' }}" width="25" height="25" style="object-fit: cover; border-radius: 50%"> {{ $user->fname }} {{ $user->sname }}
                        </a>
                    </td>
                    <td>{{ $user->userRole->title }}</td>
                    <td class="text-end">
                        <span class="fw-bolder">0</span> 
                    </td>
                    <td>
                        <span>
                            <a href="#" class="text-reset delete-user" data-title="Delete User" data-toggle="modal" data-target="#deleteUser" data-user_id="{{ $user->id }}">
                                <i class="bx bxs-trash-alt"></i>
                            </a>
                        </span>
                        <span>
                            <a href="javascript:void(0);" class="text-reset update-user-role" data-title="Edit User Roles" data-toggle="modal" data-target="#updateUserRole" data-user_id="{{ $user->id }}">
                                <i class='bx bxs-edit'></i>
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

<!-- Update User Role modal -->
<div class="modal fade" id="updateUserRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Update User Role</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.updateUserRole') }}">
                <div>
                    <select class="form-select" name="new_role" aria-label="Roles">
                        <option selected>New Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control form-custom" id="admin-update-user" name="user_id">

                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-custom">Update</button>
                    
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

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-custom disabled">Delete</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>