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

    th{
        background-color:#999;
        color:#fff;
        padding:5px 10px;
    }

    td{
        border:solid 1px #aaa;
        color:#999;
        padding:5px 10px;
    }

    .detail{
        font-size:20px;
        margin:5%;
        float:left;
    }

    img{
        width:50%;
        height:50%;
        margin-bottom:5%;
    }

    .button{
        display: inline-block;
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

    .indent{
        background-color:#EEEEEE;
        padding:5%;
        margin:5% 1%;
        float:left;
        text-align:center;
    }

    h2{
        text-align:center;
        color:#141E61;
    }

    .contents{
        margin:0 auto;
    }

    .rank{
        clear:both;
        background-color:#EEEEEE;
        padding:5%;
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