<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins';
    }

    .container {
        width: 100%;
        margin: 150px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .error_message {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .error_message h1 {
        font-weight: 600;
        color: #222;
    }
    .btn_back {
        padding: 14px 20px;
        border-radius: 12px;
        background-color: #254074;
        color: #fff;
        border: none;
        outline: none;
        font-size: 14px;
        margin-top: 30px;
        cursor: pointer;
    }
</style>

<body>
    <div class="container">
        <div class="error_message">
            <img src="../assets/icon/112559-warning.gif" width="250px">
            <h1>403 Access Forbidden</h1>
            <button type="button" class="btn_back" onclick="history.back()">
                Kembali
            </button>
        </div>
    </div>
</body>

</html>