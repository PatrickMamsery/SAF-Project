<!-- Posts Section -->
        <div class="works-section mb-3" id="photo_posts">
            <div class="row mt-3">
                <div class="table-responsive">
                    <table class="table table-responsive table-borderless">
                        <thead>
                            <tr class="bg-light">
                                <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="5%">Preview</th>
                                <th scope="col" width="25%">Caption</th>
                                <th scope="col" width="20%">Posted on</th>
                                <th scope="col" width="10%"># of Likes</th>
                                <th scope="col" class="text-end" width="10%"><span># of Views</span></th>
                                <th scope="col" class="text-center" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
            
                            @foreach ($photos as $photo)
                            <tr>
                                <th scope="row"><input class="form-check-input" type="checkbox"></th>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img width="25" height="25" style="object-fit: cover; border-radius: 50%" src="{{ $photo->path }}" alt="">
                                    <span>
                                        <a href="" class="text-reset view-photo" data-title="View Photo" data-toggle="modal" data-target="#viewPhoto" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    </span>
                                </td>
                                <td>
                                    {{ $photo->caption == NULL ? 'No Caption' : strip_tags(substr($photo->caption,0,300)) }}
                                </td>
                                <td>
                                    {{ $photo->created_at->toFormattedDateString() }}
                                </td>
                                <td class="text-end">
                                    <span class="fw-bolder">0</span>
                                </td>
                                <td class="text-end">
                                    <span class="fw-bolder">0</span> 
                                </td>
                                <td class="text-center">
                                    <span>
                                        <a href="javascript:void(0);" class="text-reset" data-title="Edit Photo" data-toggle="modal" data-target="#editPhoto">
                                            <i class='bx bxs-edit'></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="javascript:void(0);" class="text-reset delete-photo" data-toggle="modal" data-target="#deletePhoto" data-photo_id="{{ $photo->id }}" data-user_id="{{ $photo->user_id }}">
                                            <i class='bx bxs-trash-alt'></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <br>
                    {{$photos->links("pagination::bootstrap-4")}}
                </div>                
            </div>
        </div>



<!-- MODALS -->

<!-- Update Photo post modal -->
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