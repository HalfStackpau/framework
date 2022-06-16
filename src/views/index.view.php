<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="<?php root(); ?>public/css/style.css" />
</head>
<body style="display:inline-flex; flex-flow: row nowrap; justify-content:center; align-items:center;">
    <form id="login" method="POST" action="<?= root(); ?>login/login">
        <input type="text" placeholder="username" name="email"/>
        <input type="password" placeholder="password" name="password"/>
        <input type="submit"/>
    </form>
    <form id="login" method="POST"  action="<?= root(); ?>register/register">
        <input type="text" placeholder="Email" name="email"/>
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <input type="submit"/>
    </form>
</body>
</html>