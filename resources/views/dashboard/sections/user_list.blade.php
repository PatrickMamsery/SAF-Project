<div class="container mt-5 px-2">
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <div class="position-relative"> 
            {{-- <span class="position-absolute search"><i class="bx bx-search"></i></span>  --}}
            <input class="form-control w-100" placeholder="Search by name..."> 
        </div>
        <div class="px-2"> <span>Filters <i class="bx bx-chevron-down"></i></span> <i class="fa fa-ellipsis-h ms-3"></i> </div>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
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
                    <th scope="row"><input class="form-check-input" type="checkbox"></th>
                    <td>{{ $i++ }}</td>
                    <td>1 Oct, 21</td>
                    <td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Paid</span></td>
                    <td><img class="rounded-circle" src="{{ $user->profilePhoto != NULL ? $user->profilePhoto->path : '/img/profile_photos/avatar.png' }}" width="25" height="25" style="object-fit: cover; border-radius: 50%"> {{ $user->fname }} {{ $user->sname }}</td>
                    <td>{{ $user->userRole->title }}</td>
                    <td class="text-end"><span class="fw-bolder">$0.19</span> </td>
                    <td>
                        <span><i class="bx bxs-trash-alt"></i></span>
                        <span><i class="bx bxs-edit"></i></span>
                    </td>
                </tr>
                @endforeach
                
                {{-- <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox"></th>
                    <td>14</td>
                    <td>12 Oct, 21</td>
                    <td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1">Failed</span></td>
                    <td><img src="https://i.imgur.com/nmnmfGv.png" width="25"> Tomo arvis</td>
                    <td>Altroz furry</td>
                    <td class="text-end"><span class="fw-bolder">$0.19</span> <i class="fa fa-ellipsis-h ms-2"></i></td>
                </tr> --}}
            </tbody>
        </table>
        <br>
        {{$users->links("pagination::bootstrap-4")}}
    </div>
</div>