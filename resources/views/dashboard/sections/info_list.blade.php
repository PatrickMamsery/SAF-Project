<div class="info-list">
    <div class="row mt-3">
        <h2>Info | News | {{ $infos->count() }}</h2>
        <div class="table-responsive">
            <div class="row mb-2">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-outline-success" href="{{ route('addInfo') }}">Add New</a>
                </div>
            </div>
            <table class="table table-responsive table-borderless">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" width="5%"><input id="check_all" class="form-check-input" type="checkbox"></th>
                        <th scope="col" width="5%">Preview</th>
                        <th scope="col" width="20%" class="text-center">Title</th>
                        <th scope="col" width="35%" class="text-center">Content</th>
                        <th scope="col" width="5%" class="text-start">Inhouse</th>
                        <th scope="col" width="10%" class="text-start">Created at</th>
                        <th scope="col" class="text-center" width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($infos == NULL)
                        <tr class="text-center">
                            Nothing to display
                        </tr>
                    @endif
                    @foreach ($infos as $info)
                        <tr>
                            <th scope="row"><input class="form-check-input" type="checkbox" name="info[]" value="{{ $info->id }}"></th>
                            <td>
                                <img width="25" height="25" style="object-fit: cover; border-radius: 50%" src="{{ $info->media }}" alt="">
                                <span>
                                    <a href="" class="text-reset view-photo" data-title="View Photo" data-toggle="modal" data-target="#viewPhoto" data-photo_id="{{ $info->id }}" data-photo_path="{{ $info->media }}">
                                        <i class='bx bx-show'></i>
                                    </a>
                                </span>
                            </td>
                            <td>
                                {{ $info->title }}
                            </td>
                            <td>
                                {{ $info->content == NULL ? 'No Content' : strip_tags(substr($info->content,0,300)) }}
                            </td>
                            <td>
                                {{ $info->inhouse == 1 ? 'Yes' : 'No' }}
                            </td>
                            <td>
                                {{ $info->created_at->toFormattedDateString() }}
                            </td>
                            <td class="text-center">
                                <span>
                                    <a href="javascript:void(0);" class="text-reset" data-title="Edit Info" data-toggle="modal" data-target="#editInfo">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="javascript:void(0);" class="text-reset delete-info" data-toggle="modal" data-target="#deleteInfo" data-info_id="{{ $info->id }}">
                                        <i class='bx bxs-trash-alt'></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{$infos->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>

<!-- Delete Photo post modal -->
<div class="modal fade" id="deleteInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Delete Info</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-center">
                Are you sure you want to delete this info?
            </p>
            <div class="modal-footer">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.deleteInfo') }}">
                {{ csrf_field() }}
                <input type="hidden" class="form-control form-custom" id="admin-delete" name="info_id">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>

        </div>
    </div>
</div>