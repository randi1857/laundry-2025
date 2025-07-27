<!DOCTYPE html>
<html>
<head>
    <title>Jaringan Cabang Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 15px;
        }

        input[type="text"] {
            padding: 8px;
            width: 48%;
            margin-right: 2%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            background: #fff;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        li {
            margin-bottom: 5px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
        }

        .reset-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Jaringan Antar Cabang Laundry</h1>

    <form action="{{ route('graph.tambah') }}" method="POST">
        @csrf
        <input type="text" name="from" placeholder="Cabang Dari" required>
        <input type="text" name="to" placeholder="Cabang Ke" required>
        <div class="form-buttons">
            <button type="submit">Tambah Koneksi</button>
        </div>
    </form>

    <div class="reset-container">
        <form action="{{ route('graph.reset') }}" method="POST">
            @csrf
            <button type="submit">Reset Jaringan</button>
        </form>
    </div>

    <h3>Daftar Koneksi:</h3>
    <ul>
        @forelse($graph as $cabang => $tujuan)
            <li><strong>{{ $cabang }}</strong> terhubung ke: {{ implode(', ', $tujuan) }}</li>
        @empty
            <li><i>Belum ada koneksi antar cabang</i></li>
        @endforelse
    </ul>
</body>
</html>
