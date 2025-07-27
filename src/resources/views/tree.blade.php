<!DOCTYPE html>
<html>
<head>
    <title>Kategori Layanan</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 15px;
        }
        .form-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            flex: 1;
            padding: 8px;
            font-size: 14px;
        }
        button {
            padding: 8px 14px;
            font-size: 14px;
            cursor: pointer;
        }
        h3 {
            margin-top: 30px;
        }
        ul {
            list-style-type: none;
            padding-left: 20px;
        }
        li {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <h1>Manajemen Kategori Layanan</h1>

    <form action="{{ route('tree.tambah') }}" method="POST">
        @csrf
        <div class="form-row">
            <input type="text" name="nama" placeholder="Nama Kategori" required>
            <select name="induk">
                <option value="">(Kategori Utama)</option>
                @foreach ($tree as $key => $value)
                    <option value="{{ $key }}">{{ $value['nama'] }}</option>
                @endforeach
            </select>
            <button type="submit">Tambah</button>
        </div>
    </form>

    <form action="{{ route('tree.reset') }}" method="POST">
        @csrf
        <button type="submit" style="background-color: #f44336; color: white;">Reset</button>
    </form>

    <h3>Struktur Kategori:</h3>
    <ul>
        @foreach ($tree as $key => $node)
            @if (empty($node['induk']))
                <li>
                    {{ $node['nama'] }}
                    @include('tree_child', ['tree' => $tree, 'parent' => $key])
                </li>
            @endif
        @endforeach
    </ul>
</body>
</html>
