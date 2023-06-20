<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="row">
        <div class="col">
        <h1>Ciao admin!</h1>
            <p>
            Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
            Nome: {{ $lead->name }}<br>
            Email: {{ $lead->email }}<br>
            Messaggio:<br>
            {{ $lead->message }}
            </p>
        </div>
    </div>
</body>

</html>