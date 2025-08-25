<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Nuevo mensaje de contacto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      background-color: #f9f9f9;
      padding: 20px;
    }
    .container {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 20px;
      max-width: 600px;
      margin: 0 auto;
    }
    h2 {
      margin-top: 0;
      color: #444;
    }
    p {
      margin: 8px 0;
      line-height: 1.4;
    }
    strong {
      color: #000;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Nuevo mensaje de contacto desde la Web altamanufactura.com</h2>
    <p><strong>Nombre:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Teléfono:</strong> <?= $telefono ?></p>
    <p><strong>Empresa:</strong> <?= $empresa ?></p>
    <p><strong>Prefiere ser contactado por:</strong> <?= $contact ?></p>
  </div>
</body>
</html>
