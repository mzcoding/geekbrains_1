<html>
<head>
    <title>Список статей</title>
</head>
<body>
<div style="margin-left: 15px;">
  @forelse($names as $name)
     <p>{{ $name }}</p>
     @empty
      <h2>Массив пустой</h2>
  @endforelse
</div>
</body>
</html>