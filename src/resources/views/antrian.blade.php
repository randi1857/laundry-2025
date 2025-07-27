<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Antrian Laundry</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 30px auto;
            padding: 10px;
        }
        h1 {
            color: #222;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input[type="text"], select, button {
            padding: 8px;
            font-size: 1em;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .empty {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Antrian Laundry</h1>

    <!-- Form Tambah Antrian -->
    <form method="POST" action="{{ route('antrian.tambah') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama Pelanggan" required>
        <select name="layanan" required>
            <option value="">-- Pilih Layanan --</option>
            <option value="Cuci Kering">Cuci Kering</option>
            <option value="Setrika Saja">Setrika Saja</option>
            <option value="Express">Express</option>
            <option value="Kiloan">Kiloan</option>
            <option value="Selimut">Selimut</option>
        </select>
        <button type="submit">Tambahkan ke Antrian</button>
    </form>

    <!-- Form Layani Antrian -->
    <form method="POST" action="{{ route('antrian.layani') }}">
        @csrf
        <button type="submit">Layani Pelanggan Pertama</button>
    </form>

    <!-- Tabel Antrian -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Layanan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($queue as $index => $pelanggan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pelanggan['nama'] }}</td>
                    <td>{{ $pelanggan['layanan'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty">Belum ada antrian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
