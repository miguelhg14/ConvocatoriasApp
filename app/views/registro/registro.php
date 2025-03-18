<?php
// $host = 'localhost';
// $dbname = 'convoca';
// $username = 'root';
// $password = '';

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Error de conexión: " . $e->getMessage());
// }

// // Verificar si el formulario fue enviado
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtener datos del formulario
//     $tipoUsuario = $_POST['tipoUsuario'];
//     $nombre = $_POST['nombre'];
//     $tipoDocumento = $_POST['tipoDocumento'];
//     $documento = $_POST['documento'];
//     $fechaNacimiento = $_POST['fechaNacimiento'];
//     $email = $_POST['email'];
//     $genero = $_POST['genero'];
//     $estado = 'activo'; 
//     $telefono = $_POST['telefono'];
//     $eps = $_POST['eps'];
//     $tipoSangre = $_POST['tipoSangre'];
//     $peso = $_POST['peso'];
//     $estatura = $_POST['estatura'];
//     $telefonoEmergencia = $_POST['telefonoEmergencia'];
//     $password = $_POST['password'];
//     $observaciones = $_POST['observaciones'];
//     $fkIdRol = 2; 
//     $fkIdGrupo = null;
//     $fkIdCentroFormacion = null; 
//     $fkIdTipoUserGym = 1; 

//     if (empty($tipoUsuario) || empty($nombre) || empty($tipoDocumento) || empty($documento) || empty($fechaNacimiento) || empty($email) || empty($genero) || empty($telefono) || empty($tipoSangre) || empty($peso) || empty($estatura) || empty($password)) {
//         $error = "Todos los campos obligatorios deben ser completados.";
//     } else {
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//         try {
//             $sql = "INSERT INTO usuario (
//                 tipoUsuario, nombre, tipoDocumento, documento, fechaNacimiento, email, genero, estado, telefono, eps, tipoSangre, peso, estatura, telefonoEmergencia, password, observaciones, fkIdRol, fkIdGrupo, fkIdCentroFormacion, fkIdTipoUserGym
//             ) VALUES (
//                 :tipoUsuario, :nombre, :tipoDocumento, :documento, :fechaNacimiento, :email, :genero, :estado, :telefono, :eps, :tipoSangre, :peso, :estatura, :telefonoEmergencia, :password, :observaciones, :fkIdRol, :fkIdGrupo, :fkIdCentroFormacion, :fkIdTipoUserGym
//             )";
//             $stmt = $conn->prepare($sql);

//             // Vincular parámetros
//             $stmt->bindParam(':tipoUsuario', $tipoUsuario);
//             $stmt->bindParam(':nombre', $nombre);
//             $stmt->bindParam(':tipoDocumento', $tipoDocumento);
//             $stmt->bindParam(':documento', $documento);
//             $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
//             $stmt->bindParam(':email', $email);
//             $stmt->bindParam(':genero', $genero);
//             $stmt->bindParam(':estado', $estado);
//             $stmt->bindParam(':telefono', $telefono);
//             $stmt->bindParam(':eps', $eps);
//             $stmt->bindParam(':tipoSangre', $tipoSangre);
//             $stmt->bindParam(':peso', $peso);
//             $stmt->bindParam(':estatura', $estatura);
//             $stmt->bindParam(':telefonoEmergencia', $telefonoEmergencia);
//             $stmt->bindParam(':password', $hashedPassword);
//             $stmt->bindParam(':observaciones', $observaciones);
//             $stmt->bindParam(':fkIdRol', $fkIdRol);
//             $stmt->bindParam(':fkIdGrupo', $fkIdGrupo);
//             $stmt->bindParam(':fkIdCentroFormacion', $fkIdCentroFormacion);
//             $stmt->bindParam(':fkIdTipoUserGym', $fkIdTipoUserGym);

//             $stmt->execute();

//             header("Location: /login/init");
//             exit();
//         } catch (PDOException $e) {
//             $error = "Error al registrar el usuario: " . $e->getMessage();
//         }
//     }
// }
?>
<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        .login-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input, .input-group select, .input-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .checkbox-container {
            display: flex;
            justify-content: space-around;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .register-link {
            text-align: center;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style> -->
<!-- </head>
<body> -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Convocatoria</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #fafafa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        /* Contenedor principal */
        .container {
            width: 100%;
            max-width: 768px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #f1f1f1;
        }

        /* Encabezado */
        .header {
            background: #ADFA9E;
            padding: 1.5rem;
        }

        .header h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #18181b;
        }

        /* Formulario */
        .form-container {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #3f3f46;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e4e4e7;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: #18181b;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 1px rgba(139, 92, 246, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* Grid para fechas */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Selector de archivos personalizado */
        .file-upload {
            position: relative;
        }

        .file-upload-input {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 1rem;
            background-color: #f9fafb;
            border: 1px dashed #d4d4d8;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .file-upload-label:hover {
            border-color: #8b5cf6;
        }

        .file-upload-icon {
            width: 24px;
            height: 24px;
            margin-bottom: 0.5rem;
            color: #71717a;
        }

        .file-upload-text {
            font-size: 0.875rem;
            color: #52525b;
        }

        /* Botón */
        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: #8b5cf6;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background-color: #7c3aed;
        }

        /* Espaciado adicional para el botón */
        .form-actions {
            margin-top: 1.5rem;
        }

        /* Placeholder personalizado */
        ::placeholder {
            color: #a1a1aa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Registro</h2>
        </div>

        <div class="form-container">
            <form action="/user/new"></form>
                <!-- Nombre de la Convocatoria -->
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ejemplo: Esteban...">
                </div>

                <!-- Descripción -->
                <div class="form-group">
                    <label class="form-label">Apellido</label>
                    <textarea class="form-control" rows="3" placeholder="Ejemplo: Rodas..."></textarea>
                </div>



                <!-- Fechas -->
                <!-- <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fecha de Cierre</label>
                        <input type="date" class="form-control">
                    </div>
                </div> -->

                <!-- Ubicación -->


                <!-- Requisitos -->
                <div class="form-group">
                    <label class="form-label">Correo</label>
                    <textarea class="form-control" rows="3" placeholder="Ejemplo: esteban@gmail.com"></textarea>
                </div>

                <!-- Beneficios -->
                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <textarea class="form-control" rows="3" placeholder=""></textarea>
                </div>

                <!-- Enlace de Inscripción -->
                <!-- Categoría -->
                <div class="form-group">
                    <label class="form-label">Rol</label>
                    <select class="form-control">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        <option value="empleo">Empleo</option>
                        <option value="capacitacion">Capacitación</option>
                        <option value="becas">Becas</option>
                        <option value="certificaciones">Certificaciones</option>
                    </select>
                </div>

                <!-- Botón Publicar -->
                <div class="form-actions">
                    <button type="submit" class="btn">Registrarse</button>
                </div>


            </form>
        </div>
    </div>

    <script>
        // Script para mostrar el nombre del archivo seleccionado
        document.getElementById('file-upload').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Haz clic para subir una imagen';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</body>

</html>

<!-- </body>
</html> -->