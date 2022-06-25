@extends('layouts.dash')

@section('info')

    <div class="add-info">
        <div class="container">
            <h2>Add Info</h2>

            <div class="form-container">
                <form action="{{ route('admin.addInfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" class="form-control form-custom" name="title" placeholder="Add Title" required>
                    </div>
                    <div class="form-group mb-2" id="postpanel">
                        <textarea  rows="15" cols="70" name="content" id="content-add-ta" required> </textarea>
                    </div>
                    <div class="form-group mb-2">
                        <input type="file" class="form-control" placeholder="Upload image" name="media" required>
                    </div>
                    <div class="form-group my-3">
                        <input type="checkbox" class="form-check-input" name="inhouse" id="check" aria-describedby="checkHelpBlock">
                        <label for="check">Inhouse</label>
                        <div id="checkHelpBlock" class="form-text">
                            Please check the box if it is only for inhouse (choir) viewing.
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-success col-md-12">POST</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>

@endsection

@section('third-party-scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="{{ asset('packages/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: "#content-add-ta",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            branding:false
        });
    </script>
    
@endsection