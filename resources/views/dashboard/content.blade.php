@extends('layouts.dash')

@section('info')
<div class="">
    <div class="mt-3 py-3 px-0 custom-title">
        <h4 class="custom-title">
            Welcome, {{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}
        </h4>
    </div>
    
    <div class="container">
        <div class="container mt-5 px-2">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div class="position-relative"> 
                    {{-- <span class="position-absolute search"><i class="fa fa-search"></i></span>  --}}
                    <input class="form-control w-100" placeholder="Search by order#, name..."> 
                </div>
                <div class="px-2"> <span>Filters <i class="fa fa-angle-down"></i></span> <i class="fa fa-ellipsis-h ms-3"></i> </div>
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
                            <td><img src="{{ $user->profilePhoto != NULL ? $user->profilePhoto->path : 'img/profile_photos/avatar.png' }}" width="25"> {{ $user->fname }} {{ $user->sname }}</td>
                            <td>{{ $user->userRole->title }}</td>
                            <td class="text-end"><span class="fw-bolder">$0.99</span> </td>
                            <td></i></td>
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
                        </tr>
                        <tr>
                            <th scope="row"><input class="form-check-input" type="checkbox"></th>
                            <td>17</td>
                            <td>1 Nov, 21</td>
                            <td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Paid</span></td>
                            <td><img src="https://i.imgur.com/VKOeFyS.png" width="25"> Althan Travis</td>
                            <td>Apple Macbook air</td>
                            <td class="text-end"><span class="fw-bolder">$1.99</span> <i class="fa fa-ellipsis-h ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"><input class="form-check-input" type="checkbox"></th>
                            <td>90</td>
                            <td>19 Oct, 21</td>
                            <td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Paid</span></td>
                            <td><img src="https://i.imgur.com/VKOeFyS.png" width="25"> Travis head</td>
                            <td>Apple Macbook Pro</td>
                            <td class="text-end"><span class="fw-bolder">$9.99</span> <i class="fa fa-ellipsis-h ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row"><input class="form-check-input" type="checkbox"></th>
                            <td>12</td>
                            <td>1 Oct, 21</td>
                            <td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Paid</span></td>
                            <td><img src="https://i.imgur.com/nmnmfGv.png" width="25"> Althan Travis</td>
                            <td>Wirecard for figma</td>
                            <td class="text-end"><span class="fw-bolder">$0.99</span> <i class="fa fa-ellipsis-h ms-2"></i></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="works-section mb-3" id="photo_posts">
            <div class="row mt-3">
                @foreach ($photos as $photo)
                    <div class="col-md-3 my-3">
                        <div class="work-img">
                            <img src="{{ $photo->path }}" alt="">
                        </div>
                        <div class="work-caption">
                            <p class="text-center" style="text-align: justify;">{{ $photo->caption == NULL ? 'No Caption' : strip_tags(substr($photo->caption,0,300)) }}</p>
                            <div class="actions">
                                <a href="javascript:void(0);" class="btn btn-xs delete-photo" data-toggle="modal" data-target="#deletePhoto" data-photo_id="{{ $photo->id }}" data-user_id="{{ $photo->user_id }}" style="text-decoration: none!important;" >
                                    <i class='bx bxs-trash-alt'></i>
                                </a> 
                                <a href="" class="btn btn-sm view-photo" data-title="View Photo" data-toggle="modal" data-target="#viewPhoto" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
                                    <i class='bx bx-show'></i>
                                </a>
                                <a href="" class="btn btn-sm" data-title="Edit Photo" data-toggle="modal" data-target="#editPhoto">
                                    <i class='bx bxs-edit'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>

        

        {{-- <div id="users">
            @foreach ($users as $user)
                <p>{{ $user->fname }}</p>
            @endforeach
        </div> --}}
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.deletePhoto') }}">
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

<!-- Script tags -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    // function deletePhoto(photo_id) {
    //   result = confirm("Are you sure you want to delete this photo permanently?");
    //   if (result) {
    //     var url = '/admin/delete_photo/' + photo_id;
    //     var form = $('<form action="' + url + '" method="POST">' +
    //       '{{ csrf_field() }}' +
    //       '</form>');
    //     $('body').append(form);
    //     form.submit();
    //   }
    // }


    $(document).ready(function () {
        $('.delete-photo').click(function(){
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