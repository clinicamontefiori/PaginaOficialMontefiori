<?php 
include ('cms/php/var.php');
include ('cms/modelo/function.php');
include ('modelo/metas.php');
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <?php include('vista/head.php');?>

    <style>
    .file-box{
    display:flex;justify-content:space-between;
    border:1px solid #cbd5e1;
    padding:12px;border-radius:8px;cursor:pointer
    }
    .animate-spin{animation:spin 1s linear infinite}
    @keyframes spin{to{transform:rotate(360deg)}}
    .animate-ring{animation:ring .6s}
    @keyframes ring{
    0%{transform:rotate(0)}25%{transform:rotate(6deg)}
    50%{transform:rotate(-6deg)}100%{transform:rotate(0)}
    }
    </style>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 pb-10 overflow-hidden">
            <div class="container mx-auto px-4 z-10 relative">
                <?php include('vista/slider-interno-sin-fondo-amarillo.php')?>
            </div>
        </section>   

        <section class="bg-gray-site pb-10">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="bg-white p-8 sm:p-12 rounded-2xl">
                    <div class="text-left mb-10">
                    <h1 class="title-section">
                        ¿Necesitas un presupuesto para tu cirugía o procedimiento?
                    </h1>
                    <p class="mt-4 text-base text-slate-500">
                        Ingresa tus datos en el formulario y en breve nos pondremos en contacto contigo.
                    </p>
                </div>
            <form id="quote-form" data-sitekey="<?php echo SITE_KEY; ?>" class="space-y-8" enctype="multipart/form-data">
                <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <!-- Nombres -->
                    <div>
                        <label for="nombres" class="block text-sm font-medium text-slate-600 mb-1">
                            Nombres<span class="text-red-600"> *</span>
                        </label>
                        <input type="text" id="nombres" name="nombres" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>                   
                    <!-- Apellido Paterno -->
                    <div>
                        <label for="apellidoPaterno" class="block text-sm font-medium text-slate-600 mb-1">
                            Apellido Paterno
                        </label>
                        <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>
                    <!-- Apellido Materno -->
                    <div>
                        <label for="apellidoMaterno" class="block text-sm font-medium text-slate-600 mb-1">
                            Apellido Materno
                        </label>
                        <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>
                     <!-- DNI -->
                    <div>
                        <label for="dni" class="block text-sm font-medium text-slate-600 mb-1">
                            DNI<span class="text-red-600"> *</span>
                        </label>
                        <input type="text" id="dni" name="dni" maxlength="8" pattern="^(?!([0-9])\1+$)\d{1,9}$" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>
                    <!-- Género -->
                    <div>
                        <label for="genero" class="block text-sm font-medium text-slate-600 mb-1">
                            Género
                        </label>
                        <div class="relative">
                            <select id="genero" name="genero" class="appearance-none w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            <svg class="pointer-events-none w-5 h-5 text-slate-400 absolute top-1/2 right-4 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Teléfono de contacto -->
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-slate-600 mb-1">
                            Teléfono de contacto<span class="text-red-600"> *</span>
                        </label>
                        <input type="tel" id="telefono" name="telefono" maxlength="9" pattern="^9\d{8}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>
                    <!-- Correo electrónico -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-1">
                            Correo electrónico
                        </label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition">
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-slate-700">Información del procedimiento <span class="font-normal">(verifica los datos en tu orden médica)</span></h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-4">
                        <!-- Orden médica -->
                        <div>
                            <label for="ordenMedica" class="block text-sm font-medium text-slate-600 mb-1">
                                Orden médica
                            </label>
                            <div id="ordenMedica-wrapper" class="relative w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-500 cursor-pointer flex items-center justify-between">
                                <span id="ordenMedica-filename" class="truncate pr-2">Examinar....</span>
                                <input type="file" id="ordenMedica" name="ordenMedica" class="hidden" accept=".png,.jpg,.jpeg,.pdf">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">PNG / JPG / PDF</p>
                        </div>
                        <!-- Otro archivo -->
                        <div>
                             <label for="otroArchivo" class="block text-sm font-medium text-slate-600 mb-1">
                                Otro archivo
                            </label>
                            <div id="otroArchivo-wrapper" class="relative w-full px-4 py-3 bg-white border border-slate-300 rounded-lg text-slate-500 cursor-pointer flex items-center justify-between">
                                <span id="otroArchivo-filename" class="truncate pr-2">Examinar....</span>
                                <input type="file" id="otroArchivo" name="otroArchivo" class="hidden" accept=".png,.jpg,.jpeg,.pdf">
                                <svg class="w-5 h-5 text-slate-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">PNG / JPG / PDF</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mt-10">
                    <p class="text-red-600 text-sm">*Todos los campos son obligatorios.</p>
                    <button type="submit" class="w-full md:w-auto bg-slate-700 hover:bg-slate-800 text-white font-semibold py-3 px-10 rounded-full transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                        Enviar
                    </button>
                </div>
            </form>
            

           

    
            </div>
            </div>
        </section>


        <div class="container mx-auto md:px-4 px-7">
            <div class="border-t mb-10"></div>
        </div>

        <!-- Opening Hours Section -->
        <section class="py-20 pt-0">
            <?php include('vista/horarios.php')?>
        </section>

        <!-- Contact Section -->
        <section class="section-contact">
            <?php include('vista/contacto.php')?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-white pt-12 pb-8">
      <?php include('vista/footer.php')?>
    </footer>

    <!-- Floating WhatsApp Button -->
    <?php include('vista/whatsapp.php')?>
    <?php include('vista/script.php')?>


    <!-- TOAST -->
<div id="toast"
class="fixed top-6 right-6 z-50 hidden bg-white border rounded-xl shadow px-5 py-4 flex gap-3">
<div id="toast-icon"></div>
<p id="toast-message" class="text-sm"></p>
</div>

<!-- LOADING -->
<div id="form-loading"
class="hidden fixed inset-0 bg-black/40 z-40 flex items-center justify-center">
<div class="w-12 h-12 border-4 border-white/30 border-t-white rounded-full animate-spin"></div>
</div>

<script src="<?php echo HOST_VAR  ?>js/solicita-presupuesto.js"></script> 
</body>
</html>