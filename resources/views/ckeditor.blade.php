<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ckeditor Image Upload Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
    </style>
</head>
<body>
    
<div class="container">
  
    <h1>Laravel Ckeditor Image Upload Example - ItSolutionStuff.com</h1>
  
    <form>
  
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
        </div>
  
        <div class="form-group">
            <strong>Slug:</strong>
            <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ old('slug') }}">
        </div>
  
        <div class="form-group">
            <strong>Body:</strong>
            <textarea name="editor" id="editor"></textarea>
        </div>
  
        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
  
    </form>
      
</div>
     
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
              
        } );
</script>
     
</body>
</html>