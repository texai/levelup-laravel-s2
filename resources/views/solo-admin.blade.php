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
    <style>.moneda {text-align: right;}.total{background: #ffec07; padding: 6px;}</style>
</head>

<body>
    <main class="container">

        <div class="grid">
            <h1>Sólo Admin - Carrito</h1>
            <div style="text-align: right">
                <a href="/" role="button" class="outline">Regresar</a>
            </div>
        </div>

        <table role="grid">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th class="moneda">Precio</th>
                    <th class="moneda">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrito as $item)
                    <tr>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="moneda">{{ number_format($item->price, 2) }}</td>
                        <td class="moneda">{{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th class="moneda" colspan="3">TOTAL</th>
                <th class="moneda"><span class="total">{{ number_format($total, 2) }}</span></th>
            </tfoot>
        </table>

    </main>
</body>

</html>
