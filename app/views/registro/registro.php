    <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden">
        <div class="bg-green-400 p-6 text-center">
            <h2 class="text-3xl font-bold text-white">
                <i class="fas fa-user-plus mr-2"></i>Registrarse
            </h2>
        </div>

        <div class="p-8">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="ml-3">
                            <p><?php echo $error; ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form action="/registro/initRegistro" method="post" class="space-y-6">
                <div class="space-y-2">
                    <label for="txtNombre" class="block text-gray-700 text-lg font-semibold">Nombre</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-600"></i>
                        </div>
                        <input type="text" name="txtNombre" id="txtNombre" required placeholder="Ingresa tu nombre"
                            class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="txtApellido" class="block text-gray-700 text-lg font-semibold">Apellido</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-600"></i>
                        </div>
                        <input type="text" name="txtApellido" id="txtApellido" required placeholder="Ingresa tu Apellido"
                            class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="txtCorreo" class="block text-gray-700 text-lg font-semibold">Correo Electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-600"></i>
                        </div>
                        <input type="email" name="txtCorreo" id="txtCorreo" required placeholder="Ingresa tu Correo"
                            class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 text-lg">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="txtContrasenia" class="block text-gray-700 text-lg font-semibold">Contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-600"></i>
                        </div>
                        <input type="password" name="txtContrasenia" id="txtContrasenia" required placeholder="Ingresa tu Contraseña"
                            class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <input type="hidden" name="txtRol" value="2">

                <button type="submit" class="w-full bg-green-400 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg text-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>Registrarse
                </button>

                <div class="text-center mt-6">
                    <p class="text-gray-600 text-lg">
                        ¿Ya tienes una cuenta?
                        <a href="/login/init" class="text-blue-600 hover:text-blue-800 font-medium">
                            <i class="fas fa-sign-in-alt mr-1"></i>Iniciar Sesión
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('txtContrasenia');
            const eyeIcon = event.currentTarget.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
    </body>

    </html>