<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="image.png" type="img\image.png"/>
    <title>Ghost.Store</title>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

</head>
<body>
<div>
<div class="form-group col-md-12">
         <label>Content</label>
         <textarea name="txtContent" class="form-control " id="editor1"></textarea>
</div> 
</div>
</body>
</html>
<script> CKEDITOR.replace('editor1'); </script>