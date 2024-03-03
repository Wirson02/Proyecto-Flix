<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .preview-container {
      text-align: center;
    }

    #preview-img {
      max-width: 100%;
      max-height: 200px; /* Puedes ajustar la altura máxima según tus necesidades */
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <form id="profileForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="profilePicture">Foto de perfil:</label>
    <input type="file" id="profilePicture" name="profilePicture" accept="image/*" onchange="previewImage(event)" required>

    <div class="preview-container">
      <img id="preview-img" alt="Previsualización de la foto de perfil">
    </div>

    <button type="submit">Enviar</button>
  </form>

  <script>
    function previewImage(event) {
      const input = event.target;
      const previewImg = document.getElementById('preview-img');

      const file = input.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
          previewImg.src = e.target.result;
        };

        reader.readAsDataURL(file);
      } else {
        previewImg.src = '';
      }
    }
  </script>
</body>
</html>
