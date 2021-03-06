<!-- Posts content --->
<div class="container-fluid user-photos" id="photo_posts">
    <div class="title">
        <h3>{{ $user->fname }} {{ $user->sname }} | Photos</h3>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-responsive table-borderless">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" width="5%"><input id="check_all" class="form-check-input" type="checkbox"></th>
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
                        <th scope="row"><input class="form-check-input" type="checkbox" name="photo[]" value="{{ $photo->id }}"></th>
                        <td>{{ $i++ }}</td>
                        <td>
                            <img width="25" height="25" style="object-fit: cover; border-radius: 50%" src="{{ $photo->path }}" alt="">
                            <span>
                                <a href="" class="text-reset view-photo" data-bs-title="View Photo" data-bs-toggle="modal" data-bs-target="#viewPhoto" data-photo_id="{{ $photo->id }}" data-photo_path="{{ $photo->path }}">
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
                                <a href="javascript:void(0);" class="text-reset" data-bs-title="Edit Photo" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    <i class='bx bxs-edit'></i>
                                </a>
                            </span>
                            <span>
                                <a href="javascript:void(0);" class="text-reset delete-photo" data-bs-toggle="modal" data-bs-target="#deletePhoto" data-photo_id="{{ $photo->id }}" data-user_id="{{ $photo->user_id }}">
                                    <i class='bx bxs-trash-alt'></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    </div>



<!-- MODALS -->

<!-- Update Photo post modal -->
<div class="modal fade" id="viewPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Photo</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <img id="photo-view" src="" alt="photo" style="width: 100%">
                </div>
            </div>

            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="{{ route('deletePhoto') }}">
                {{ csrf_field() }}
                {{-- <input type="hidden" class="form-control form-custom" id="user_id" name="user_id">
                <input type="hidden" class="form-control form-custom" id="photo-delete" name="photo_id"> --}}

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-custom">Delete</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>

<!-- Delete Photo post modal -->
<div class="modal fade" id="deletePhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete Photo</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-custom">Delete</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>