<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#242424">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title><?= $this->title ?></title>
</head>

<body>
    <h1>404</h1>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            scroll-behavior: smooth;
            color: var(--font-color-primary);
            font-family: 'Source Sans Pro', sans-serif;
        }

        h1{
            text-transform: uppercase;
            color: white;
            text-align: center;
            font-size: 100px;           
        }

        body {
            background: #242424;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>

    <script>    
        setTimeout(function(){
            window.location.replace("<?=URL?>");
        },3000);
    </script>

</body>
</html>