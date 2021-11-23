<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <main class="py-4">
          <template>
              <post-table></post-table>
          </template>
      </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>