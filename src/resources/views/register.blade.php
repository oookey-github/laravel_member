<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仮登録</title>
</head>
<body>
    <h1>仮登録</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">仮登録</button>
    </form>
</body>
</html>
