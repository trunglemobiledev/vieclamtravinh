<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Login - Việc làm trà vinh</title>

    <link rel="stylesheet" type="text/css" href="/css/login.css">

</head>

<body>

    <head>Header</head>
    <nav>Nav</nav>
    <section>section</section>
    <div class="sigin">
        <div>
            <h1 class="title">Login</h1>
                <form role="form" method="post" >
                <fieldset>
                    <label for="">Email</label>
                    <input class="edittext" type="email" name="email">
                    <label for="">Password</label>
                    <input class="edittext" type="password" name="password">
                    <input type="submit" name="btdangnhap" value="Dang nhap">
                    {{csrf_field()}}
                </fieldset>
            </form>
        </div>
    </div>
    <footer>footer</footer>
</body>

</html>
