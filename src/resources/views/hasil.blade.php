<!DOCTYPE html>
<html>
<head>
    <title>Data Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }

        h1 {
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        th, td {
            border: 1px solid #bdc3c7;
            padding: 0.75rem;
            text-align: left;
        }

        th {
            background-color: #ecf0f1;
        }

        a {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>
    <h1>Data Layanan Laundry</h1>

    <table>
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Tarif per Kg</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($layanan as $index => $jenis)
                <tr>
                    <td>{{ $jenis }}</td>
                    <td>Rp {{ number_format($tarif[$index]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Promosi Mingguan</h2>
    <ul>
        @foreach ($promo as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <a href="{{ route('strukturdata.index') }}">← Kembali</a>
</body>
</html>
