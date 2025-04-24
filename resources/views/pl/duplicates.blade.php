<!DOCTYPE html>
<html>

<head>
    <title>Duplicate PL Numbers</title>
</head>

<body>
    <h2>Duplicate PL Entries</h2>

    @if($records->isEmpty())
    <p>No duplicates found.</p>
    @else
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>PL Number</th>
            <th>Created At</th>
        </tr>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->pl_number }}</td>
            <td>{{ $record->created_at }}</td>
        </tr>
        @endforeach
    </table>
    @endif
</body>

</html>