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
    <link rel="stylesheet" href="<?php echo HOST_VAR  ?>css/trabaja-con-nosotros.css">
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

        <!-- Quick Actions Section -->
        <section class="bg-gray-site pt-3 pb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="title-section mb-6">Trabaja con nosotros</h1>
                    <div class="paragraph">
                        <p>En Clínica Montefiori sabemos que nuestra mayor fortaleza son las personas que nos acompañan día a día. Por eso, buscamos siempre al mejor talento: profesionales comprometidos, cercanos y apasionados por brindar un servicio de calidad que marque la diferencia.</p>
                        <p>
                            Hoy queremos invitarte a crecer con nosotros y ser parte de una familia que pone la salud y el bienestar en el centro de todo. Aquí encontrarás un espacio donde tu vocación y tus habilidades no solo se valoran, sino que también te permiten desarrollarte, aportar y dejar huella. 
                        </p>
                    </div>
                </div>
                <div class="flex gap-4 md:gap-6 justify-center">
                    <div class=""><img alt="Hospital exterior" class="rounded-2xl shadow-lg object-cover"
                            src="tmp/86355465.jpg" width="531" height="273" style="height: 273px;"></div>
                   
                </div>
            </div>
            </div>
        </section>

        <section class="bg-gray-site mb-14 pb-12">
            <div class="container-med mx-auto md:px-4 px-7">
                <h2 class="text-2xl font-bold mb-8">¡Súmate y vive la experiencia de trabajar en Clínica Montefiori!</h2>
                    
                <form id="application-form" data-sitekey="<?php echo SITE_KEY; ?>" novalidate>
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 relative">

                                <!-- Nombres -->
                                <div>
                                    <label for="names" class="block text-sm font-medium text-slate-600 mb-1">
                                        Nombres <span class="text-red-500">*</span>
                                    </label>
                                    <input id="names" name="names" type="text" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-400 transition" />
                                    <p id="names-error" class="text-red-500 text-xs"></p>
                                </div>                               

                                <!-- Apellidos -->
                                <div>
                                    <label for="surnames" class="block text-sm font-medium text-slate-600 mb-1">Apellidos</label>
                                    <input id="surnames" name="surnames" type="text" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-400 transition" />
                                </div>

                                <!-- Teléfono -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-slate-600 mb-1">
                                        Indica un teléfono de contacto <span class="text-red-500">*</span>
                                    </label>
                                    <input id="phone" name="phone" type="tel" maxlength="9" pattern="^9\d{8}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-400 transition" />
                                    <p id="phone-error" class="text-red-500 text-xs"></p>
                                </div>

                                <!-- Correo -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-600 mb-1">Correo electrónico <span class="text-red-500">*</span></label>
                                    <input id="email" name="email" type="email" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-400 transition" />
                                    <p id="email-error" class="text-red-500 text-xs"></p>
                                </div>
                                
                                <!-- CV Upload -->
                                <div>
                                    <label for="cv" class="block text-sm font-medium text-slate-600 mb-1">
                                        Adjunta tu cv <span class="text-red-500">*</span>
                                    </label>
                                    <label for="cv" class="relative flex items-center w-full px-4 py-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-slate-400 transition">
                                        <span id="cv-file-name" class="flex-grow text-slate-400 truncate pr-2">Examinar....</span>
                                        <!-- Paperclip Icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-slate-500 flex-shrink-0">
                                            <path d="m21.44 11.05-9.19 9.19a6 6 0 0 1-8.49-8.49l8.57-8.57A4 4 0 1 1 18 8.84l-8.59 8.59a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                        </svg>
                                    </label>
                                    <input id="cv" name="cv" type="file" required class="hidden-file-input" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx" />
                                    <p id="cv-error" class="text-red-500 text-xs h-4"></p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mt-1 pt-8">
                                        <p class="text-slate-500 text-xs">Máximo 1 Fichero - Límite 2MB - PNG / JPG / PDF / Docx.</p>
                                        
                                    </div>
                                </div>

                                <!-- Cookies Checkbox -->
                                <div class="md:col-span-2 mt-4">
                                    <label for="cookiesAccepted" class="flex items-center cursor-pointer select-none">
                                        <div class="relative">
                                            <input id="cookiesAccepted" name="cookiesAccepted" type="checkbox" required class="sr-only" />
                                            <div id="custom-checkbox" class="w-5 h-5 border-2 rounded bg-white border-slate-300 flex items-center justify-center transition-colors flex-shrink-0">
                                                <!-- Check Icon SVG -->
                                                <svg id="check-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white hidden">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="ml-3 text-sm text-slate-600">
                                            He leído y acepto las condiciones establecidas en la Política de Cookies <span class="text-red-500">*</span>
                                        </span>
                                    </label>
                                    <p id="cookies-error" class="text-red-500 text-xs mt-1 h-4"></p>
                                </div>

                                <!-- Footer and Submit -->
                                <div class="md:col-span-2 mt-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <a href="politicas-de-cookies" class="text-slate-600 hover:text-slate-800 text-sm">
                                        Cláusula informativa de <span class="font-bold">Protección de Datos Personales</span>
                                    </a>
                                    <button type="submit" class="bg-slate-600 min-w-[300px] text-white font-semibold py-3 px-10 rounded-full hover:bg-slate-700 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 w-full md:w-auto">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>          
              

            </div>
        </section>


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

<div id="toast"
     class="fixed top-6 right-6 z-50 hidden max-w-sm bg-white border border-slate-200 rounded-xl shadow-lg px-5 py-4 flex items-center gap-3">
    <div id="toast-icon"></div>
    <p id="toast-message" class="text-sm text-slate-700"></p>
</div>

<!-- Spinner -->
<div id="form-loading"
     class="hidden fixed inset-0 bg-black/40 z-40 flex items-center justify-center">
    <div class="w-12 h-12 border-4 border-white/30 border-t-white rounded-full animate-spin"></div>
</div>


<script src="<?php echo HOST_VAR  ?>js/trabaja-con-nosotros.js"></script>

</body>
</html>