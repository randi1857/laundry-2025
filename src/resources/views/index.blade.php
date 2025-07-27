<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }

        h1 {
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 1rem;
        }

        input, select {
            padding: 0.5rem;
            width: 300px;
        }

        button {
            margin-top: 1.5rem;
            padding: 0.6rem 1.2rem;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Manajemen Laundry</h1>

    <form method="POST" action="{{ route('strukturdata.proses') }}">
        @csrf

        <label>Daftar Layanan Laundry (pisahkan dengan koma):</label>
        <input type="text" name="layanan" placeholder="Cuci Kering,Setrika Saja,Express,Kiloan,Selimut" required>

        <label>Tarif per Kg (pisahkan dengan koma - urut sesuai layanan):</label>
        <input type="text" name="tarif" placeholder="5000,3000,8000,4000,10000" required>

        <label>Promosi Mingguan (pisahkan dengan koma):</label>
        <input type="text" name="promo" placeholder="Diskon 10%,Gratis Setrika,Diskon 20%" required>

        <br>
        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>
