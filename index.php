<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="validation.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container offset-2 offset-sm-3 offset-lg-4 pt-4">
    <form class="form-horizontal" action="validation_overall.php" method="POST">
        <div class="form-group">
            <div class="row">
                <label for="name" class="col-sm-2 control-label text-sm-right">Имя</label>
                <div class="col-7 col-sm-5 col-md-4 col-lg-3">
                    <input id="name" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3">
                    <span id="name_failed" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="surname" class="col-sm-2 control-label text-sm-right">Фамилия</label>
                <div class="col-7 col-sm-5 col-md-4 col-lg-3">
                    <input id="surname" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3">
                    <span id="surname_failed" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="email"  class="col-sm-2 control-label text-sm-right">e-mail</label>
                <div class="col-7 col-sm-5 col-md-4 col-lg-3">
                    <input id="email" type="email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3">
                    <span id="email_failed" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="password" class="col-sm-2 control-label text-sm-right">Пароль</label>
                <div class="col-7 col-sm-5 col-md-4 col-lg-3">
                    <input id="password" type="password" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3">
                    <span id="password_failed" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="password_check" class="col-sm-2 control-label text-sm-right">Повтор пароля</label>
                <div class="col-7 col-sm-5 col-md-4 col-lg-3">
                    <input id="password_check" type="password" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3">
                    <span id="password_check_failed" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-sm-2 col-7 col-sm-5 col-md-4 col-lg-3 d-flex flex-row justify-content-center">
                <button type="button"  class="btn btn-success" onclick="validate()">Отправить</button>
            </div>
        </div>
    </form>
</div>
<div id="success_message" style="display: none">Вы успешно зарегистрировались!</div>
</body>