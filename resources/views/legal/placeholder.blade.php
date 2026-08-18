<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title }} — {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: system-ui, sans-serif; max-width: 40rem; margin: 3rem auto; padding: 0 1.5rem; line-height: 1.6; color: #1a202c; }
        h1 { font-size: 1.5rem; }
        .notice { background: #fff8e1; border: 1px solid #f0d98c; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <div class="notice">
        This is a self-hosted, personal instance of {{ config('app.name') }} (open-source software). This page is a
        placeholder confirming an operator and a point of contact exist — it is not a substitute for a lawyer-drafted
        policy. Contact: {{ config('mail.from.address') }}.
    </div>
    {!! $body !!}
</body>
</html>
