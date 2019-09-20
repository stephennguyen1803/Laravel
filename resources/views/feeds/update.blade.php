</<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

</head>
<body>

<h1>Feed Details</h1>

<div class="container">

    <form method="POST" action="/feedsupdate">

        {{ csrf_field() }}

        <div>
            <label >Feed Title</label>
            <input type="hidden" name="id" value="{{$feed->id}}">
            <input type="text" name="title" placeholder="Feed Title" value="{{$feed->title}}">

        </div>
        <div>
            <label >Feeds Category</label>
            <input name="category" placeholder="Feed Category" value="{{$feed->category}}}}">
        </div>
        <div>
            <input type="submit" value="Update Feed">

        </div>

    </form>

</div>

</body>
</html>