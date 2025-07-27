<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1 {
            color: #2c3e50;
        }
        form {
            margin-bottom: 15px;
        }
        input[type="text"] {
            padding: 8px;
            width: 250px;
            margin-right: 10px;
        }
        button {
            padding: 8px 14px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .action-buttons {
            margin-top: 10px;
        }
        .action-buttons form {
            display: inline-block;
            margin-right: 10px;
        }
        ul {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Riwayat Pelanggan Dilayani</h1>

    {{-- Form input dan tombol Tambah --}}
    <form action="{{ route('stack.tambah') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Pelanggan" required>
        <button type="submit">Tambah</button>
    </form>

    {{-- Tombol Undo & Reset di bawah --}}
    <div class="action-buttons">
        <form action="{{ route('stack.undo') }}" method="POST">
            @csrf
            <button type="submit">Undo</button>
        </form>

        <form action="{{ route('stack.reset') }}" method="POST">
            @csrf
            <button type="submit">Reset</button>
        </form>
    </div>

    <h3>Isi Riwayat:</h3>
    <ul>
        @forelse($stack as $item)
            <li>{{ $item }}</li>
        @empty
            <li><i>Belum ada pelanggan dilayani</i></li>
        @endforelse
    </ul>
</body>
</html>
