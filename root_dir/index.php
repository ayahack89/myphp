<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=http://127.0.0.1/myphp/root_dir/home/main.php">
    <meta name="google-site-verification" content="2MFbMdbyunwBJ4iibPaO_wI5PoMj08UC1i-W3iTEO1U" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="">
    <title>Index.php</title>
    <?php include "asset/style.php"; ?>
</head>


<style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text-center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .text-danger {
        color: red;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1);
        }
    }
</style>


<body class="bg-light">
    <div class="text-center">
        <i class="ri-box-2-line text-danger" style="font-size:5rem;"></i>
    </div>

    <?php include "asset/script.php"; ?>
</body>

</html>