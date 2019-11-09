</<!DOCTYPE html>
<html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<h1>All Feed Data</h1>

@foreach ($feeds as $feed)
    <li>
        <div>{{ $feed->title}}</div>
        <a href="{{ route('feed.detail', ['id' => $feed->id]) }}">Edit</a>
        <p class="del-feed" data-id="{{$feed->id}}">Delete</p>
    </li>
@endforeach

{{ $feeds->links() }}

</body>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".del-feed").click(function(e){
        e.preventDefault();
        var id = $(this).attr("data-id")
        $.ajax({
            method:'POST',
            url:'/feedsdelete',
            data:{id:id, _token:"{{csrf_token()}}"},
            success:function(){
                location.reload();
            }

        });
    });

</script>
</html>