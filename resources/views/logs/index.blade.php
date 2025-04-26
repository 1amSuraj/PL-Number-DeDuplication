<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Logs</title>
    <style>
    pre {
        background: #f4f4f4;
        padding: 10px;
        border-radius: 5px;
        overflow-x: auto;
    }
    </style>
</head>

<body>
    <h1>Application Logs</h1>
    <pre>
        @foreach($logs as $log)
            {{ $log }}
        @endforeach
    </pre>
</body>

</html>