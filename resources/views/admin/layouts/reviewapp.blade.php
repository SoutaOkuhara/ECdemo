<html>
<head>
    <title>@yield('title')(管理者)</title>
    <style>
    body{
        font-size:16pt;
        margin:5px;
    }
    h1{
        font-size:50pt;
        text-align:center;
        color:#f6f6f6;
        background-color:#CC3333;
        padding:2% 0;
    }
    ul{
        font-size:12pt;
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


    .main{
        background-color:#EEEEEE;
        padding:30px;
        margin:3% 10%;
    }

    .main1{
        background-color:#EEEEEE;
        padding:30px;
        margin:3% 0;
        text-align:center;
    }

    .main1 p{
        margin:2% 0;
    }

    table{
        margin-bottom:5%;
    }

    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1>@yield('title')(管理者)</h1>
    @section('menubar')
    <ul>
        <li>@show</li>
    </ul>
    <a href="/admin/"><button class="button">ホームに戻る</button></a>
    <hr>
    <div class = "content">
    @yield('content')
    </div>
</body>
</html>