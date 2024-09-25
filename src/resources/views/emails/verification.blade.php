<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <h1>仮登録ありがとうございます</h1>

    <p>以下のリンクをクリックして、本登録を完了してください。</p>

    <a href="{{ url('/register/confirm?token=' . $url_token) }}">本登録はこちら</a>

    <p>このリンクは自動生成です。</p>
    <p>もしこのメールに心当たりがない場合は、無視しても構いません。</p>

    <p>よろしくお願いいたします。</p>
</body>
</html>
