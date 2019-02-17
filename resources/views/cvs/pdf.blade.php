<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
      h1 {
        text-align: center;
      }
    
      h2 {
        margin: 16px 20px 0;
        width: 100%
      }
      .divider {
        height: 2px;
        margin: 12px 0;
        width: 100%;
        background-color: grey;
      }
      .group {
        margin: 12px;
        font-size: 16px;
      }
      .user-image {
        width: 100px;
      }
  </style>
</head>
<body>
  <h1>CV</h1>
  <h2>Pamatinformācija</h2>
  <div class="divider"></div>
  <div class="group">
      <img src="{{ base_path('storage/app/public/'.$cv->image) }}" alt="" class="user-image">
  </div>
  <div class="group">
    <div>Vārds Uzvārds: {{ $cv->first_name }} {{ $cv->last_name }}</div>
    <div>Dzimšanas datums: {{ (new DateTime($cv->birth_date))->format('d.m.Y') }}</div>
    <div>Epasta adrese: {{ $cv->email }}</div>
  </div>
  <h2>Izglītība</h2>
  <div class="divider"></div>
  @foreach ($cv->educations as $education)
  <div class="group">
    <div>Izglītības iestādes nosaukums: <b>{{ $education->name }}</b></div>
    <div>Gads no: {{ (new DateTime($education->from))->format('Y') }}</div>
    <div>Gads līdz: {{ (new DateTime($education->to))->format('Y') }}</div>
    <div>Specialitāte: {{ $education->major }}</div>
  </div>
  @endforeach
  <h2>Valodas</h2>
  <div class="divider"></div>
  @foreach ($cv->languages as $language)
  <div class="group">
    <div>{{ $loop->index + 1}}. {{ $language->name }} - {{ $language->level }}</div>
  </div>
  @endforeach

</body>
</html>