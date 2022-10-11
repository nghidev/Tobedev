<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style> 
    
    /* .ok{
        color: red
    } */
    </style>
</head>
<body>
{!!$body!!}
   @foreach($item as $it)
            <div class="ok" style="color:blue;">
                {{$it->id}} 
                {{$it->name}} <br>
                </div>
   @endforeach
</body>
</html>