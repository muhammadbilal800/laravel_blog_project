<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
     <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
    </style> 
</head>
<body>
    <x-dashboard.navbar />
    @yield('content')

  
  
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