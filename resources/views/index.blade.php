<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Up - Ernesto Anaya</title>
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/postcss.config.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css" rel="stylesheet">
    <style>.hl{background: #ffec07;}</style>
</head>

<body>
    <main class="container">

        <div class="grid">
            <h1>Listado de Artículos</h1>
            <div style="text-align: right">
                <a href="/solo-admin" role="button" class="outline">Sólo Admin</a>
            </div>
        </div>

        <form>
            <div class="grid">
                <label style="text-align: center; padding-top: 17px;">Buscar por título:</label>
                <input type="text" id="q" name="q" value="{{$search}}">
                <button type="submit">Buscar</button>
                <div></div>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                @if ($search)
                                    <td>{!! str_ireplace($search, "<span class=hl>$search</span>", $article->title) !!}</td>
                                @else
                                    <td>{{ $article->title }}</td>
                                @endif
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>

    </main>
</body>

</html>
