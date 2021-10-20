<html>
<head>
    <title>@yield('title')</title>
    <style>
    body{
        font-size:16pt;
        margin:5px;
    }
    h1{
        font-size:50pt;
        text-align:center;
        color:#f6f6f6;
        background-color:#0F044C;
        padding:2% 0;
    }
    ul{
        font-size:12pt;
    }

    .user{
        background-color:#787A91;
        color:white;
        padding:10px;
    }

    .user a{
        color:black;
    }

    .content{
        margin:10px;
    }

    .main{
        background-color:#EEEEEE;
        padding:30px;
    }


    .detail{
        font-size:20px;
        margin:5%;
        float:left;
    }

    .article{
        text-align:center;
    }

    .articlep{
        font-size:20px;
    }

    img{
        width:50%;
        height:50%;
        margin-bottom:5%;
    }

    .good{
        display:inline-block;
    }

    .button{
        padding: 0.5em 1em 0.3em;
        color: #0099ff;
        border: none;
        border-radius: 5px;
        background: linear-gradient(
            -45deg,
            #ddeeff 25%,
            #c6e6fb 25%,
            #c6e6fb 50%,
            #ddeeff 50%,
            #ddeeff 75%,
            #c6e6fb 75%,
            #c6e6fb
        );
        background-size: 10px 10px;
        cursor: pointer;
    }

    .comment form{
        display:inline-block;
    }

    .comment h3{
        margin:3% 0;
        background:#141E61;
        padding:15px;
        color:white;
    }

    .commentAdd h3{
        margin:3% 0;
        background:#141E61;
        padding:15px;
        color:white;
    }

    .commentform{
        margin-top:2%;
        width:500px;
        height:100px;
    }

    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <ul>
        <li>@show</li>
    </ul>
    <hr>
    <div class = "content">
    @yield('content')
    </div>
</body>
</html>