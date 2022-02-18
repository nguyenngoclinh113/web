<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Example</title>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

    <script>
        function getMessage(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/getmsg',
                success:function(res){
                    users = res.data;
                    $("#msg").html(res);
                    $.each(users, function(i, value){
                         console.log(value.id);
                         console.log(i);
                     })

                }
            });
        }
    </script>
</head>

<body>
<div id = 'msg'>This message will be replaced using Ajax.
    Click the button to replace the message.</div>

<button onclick="getMessage()">Replace Message</button>
</body>

</html>