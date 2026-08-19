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
.md\:mb-12{margin-bottom:0!important}



/* =========================
   HELPERS
========================= */
.hidden {
    display: none;
}

.hidden-file-input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    position: absolute;
    z-index: -1;
}

/* =========================
   ANIMACIONES
========================= */
@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}

.animate-blink {
    animation: blink 1.2s ease-in-out infinite;
}

@keyframes ring {
    0% { transform: rotate(0); }
    20% { transform: rotate(5deg); }
    40% { transform: rotate(-5deg); }
    60% { transform: rotate(4deg); }
    80% { transform: rotate(-4deg); }
    100% { transform: rotate(0); }
}

.animate-ring {
    animation: ring 0.6s ease-in-out;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

</style>

</head>

<body>
    <!-- Header -->
    <header class="header-site backdrop-blur-md fixed top-0 left-0 right-0  z-50 ">
        <?php include('vista/header.php')?>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section relative md:pt-28 pt-20 md:pb-10 overflow-hidden md:mb-12 pb-6 mb-6">
            <div class="container mx-auto px-4 z-10 relative">
                <?php include('vista/slider-interno-sin-fondo-amarillo.php')?>
            </div>
        </section>

    

        <section class="bg-gray-site pb-10">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="bg-white rounded-2xl p-8 md:p-12">
                    <h1 class="title-section">Programa “PROSALUD”</h1>
                    <p class="mt-4 "><strong>Tu salud y la de tu familia es lo primero.</strong> Por eso creamos
                        <strong>PROSALUD</strong>, nuestro seguro médico complementario normado y respaldado por la superintendencia de
                        entidades prestadoras de salud.</p>
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-x-14 gap-y-4 max-w-4xl mx-auto">
                        <div class="flex items-center gap-3">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600">Más de <strong>35 especialidades</strong></span></div>

                        <div class="flex items-center gap-3">
                            
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600">Hospitalización <strong>al 50%</strong></span></div>

                         <div class="flex items-center gap-3">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600">Consultas desde <strong>S/.35</strong></span></div>

                               <div class="flex items-center gap-3">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600"><strong>Emergencias 100%</strong></span></div>

                        
                        <div class="flex items-center gap-3">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600">Hasta el <strong>80% de descuento</strong> en imágenes, laboratorio y
                                farmacia</span></div>

                       
                        
                     
                        <div class="flex items-center gap-3">
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" class="flex-shrink-0">
                                <circle cx="21" cy="21" r="21" fill="#FDB733"/>
                                <path d="M30.3781 13.864C32.1178 13.5573 32.6039 15.3905 31.4825 16.7081L18.1651 29.8184C17.4299 30.3734 16.6713 30.767 15.9764 29.9354L10.7058 22.6166C9.62167 20.6992 11.8787 19.2466 13.3018 21.1692C13.9092 21.8308 16.9375 26.4501 17.2843 26.4101L29.6923 14.2635C29.8935 14.075 30.1128 13.9074 30.3753 13.8638L30.3781 13.864Z" fill="white"/>
                            </svg>
                            <span class="text-slate-600">Cobertura de <strong>maternidad y más</strong></span></div>
                    </div>
                </div>

            </div>
        </section>

        <section class="bg-gray-site mb-12 pb-10">
            <div class="container-med mx-auto md:px-4 px-7">
                <div class="grid grid-cols-1 lg:grid-cols-5 rounded-2xl overflow-hidden">
                    <div class="lg:col-span-3 bg-white p-10  md:p-12 flex flex-col">
                        <div class="flex-grow">
                            <p class="text-lg">Pueden afiliarse tú, tu familia y personas importantes para ti</p>
                            <p class="text-4xl font-bold mb-12 "><span class="text-site">Sin límite de edad</span></p>
                            <p class="text-2xl font-bold mt-6 ">Precios accesibles al mercado y según la edad.</p>
                        </div>
                        <div class="mt-12">
                            <div class="space-y-4">

                                <h3 class="font-semibold text-slate-500">Contáctanos</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
                                    
                                    <div class="col">
                                        <div class="flex items-center gap-3">
                                            <svg width="15" height="13" viewBox="0 0 15 13" fill="none">
                                            <path d="M2.64453 0.511719C2.74618 0.51725 2.84413 0.524444 2.92285 0.532227C2.94488 0.534404 2.96336 0.536275 2.97852 0.538086C2.98782 0.547884 2.99792 0.558935 3.00781 0.570312L3.0459 0.617188C3.04864 0.621312 3.05448 0.629278 3.0625 0.642578C3.07638 0.6656 3.09388 0.696734 3.11523 0.736328C3.15807 0.815773 3.21027 0.919552 3.26953 1.04199C3.3879 1.28656 3.52825 1.59395 3.66602 1.90723C3.94833 2.54921 4.1973 3.16336 4.24609 3.33105C4.28956 3.4811 4.21656 3.67228 3.88184 4.03809C3.75319 4.17867 3.55053 4.38186 3.41699 4.5459C3.29246 4.69888 3.08731 4.97629 3.11035 5.32031C3.12148 5.48665 3.19985 5.64651 3.24414 5.73242C3.30059 5.84189 3.37129 5.95861 3.44043 6.06543C3.50992 6.17279 3.58347 6.27999 3.64844 6.37207L3.80469 6.58984C4.74022 7.88377 5.93198 8.90333 7.39941 9.61035H7.40039C7.55477 9.68469 7.89283 9.87188 8.20605 9.97949C8.49509 10.0788 9.00782 10.2015 9.42188 9.87402L9.42285 9.875C9.70117 9.65472 9.94442 9.31229 10.1318 9.0459C10.3455 8.74213 10.4984 8.51779 10.6367 8.38867C10.657 8.36994 10.6667 8.36977 10.6699 8.36914C10.6795 8.36728 10.7067 8.36476 10.7627 8.37695C10.8202 8.38948 10.8892 8.41362 10.9785 8.4502C11.0225 8.46823 11.0669 8.48752 11.1162 8.50879C11.1636 8.52924 11.2166 8.55208 11.2695 8.57324C11.6899 8.74129 12.1059 8.95146 12.5371 9.17676C12.8814 9.35665 13.2406 9.5473 13.6035 9.72363C13.6565 10.4463 13.3542 11.0333 12.8438 11.4619C12.2619 11.9505 11.4091 12.2285 10.541 12.1973C9.96488 12.1763 9.12389 11.9411 8.25586 11.6016C7.39868 11.2662 6.57293 10.8523 6.04297 10.5186H6.04199C5.00516 9.86482 3.61759 8.65419 2.4834 7.28418C1.91783 6.60098 1.42501 5.88889 1.07129 5.19922C0.715467 4.50537 0.515555 3.86221 0.500977 3.30762C0.488606 2.83489 0.661493 2.12275 0.999023 1.51758C1.34232 0.902203 1.76825 0.544477 2.18555 0.501953H2.19434C2.24417 0.497579 2.42739 0.499907 2.64453 0.511719Z" fill="#5C6671" stroke="#5C6671"/>
                                            </svg>

                                        <p class="text-slate-800 text-lg">(01) 437-5151 <span
                                                class="text-slate-800">anexo 1029</span></p>
                                        </div>
                                        
                                    
                                    </div>

                                    <div class="col">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M4 4h16v16H4z"/>
                                            <path d="M22 6l-10 7L2 6"/>
                                          </svg>
                                          <p class="text-lg"><a href="mailto:prosalud@montefiori.com.pe">prosalud@montefiori.com.pe</a></p>
                                        </div>
                                    </div>

                                    <div class="col">
                                            <div class="flex items-center gap-3">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M0 16L1.09528 11.9655C0.932023 11.4811 0.657921 11.035 0.489011 10.5416C-1.54055 4.60452 3.74619 -1.20053 9.88578 0.215466C13.1988 0.979367 15.7882 3.99557 15.9854 7.38998C16.3515 13.6925 9.75722 17.8602 4.1696 14.9134L0 16ZM1.92286 14.1244L4.39393 13.4847C8.12731 15.8469 13.1709 14.0216 14.3917 9.78036C15.7833 4.9452 11.4999 0.418072 6.56715 1.50577C2.00016 2.5128 -0.0765375 7.86611 2.56306 11.7055L1.92286 14.124V14.1244Z" fill="#5C6671"/>
                                                <path d="M5.21949 4.00253C5.3221 3.99252 5.71209 4.01374 5.79612 4.03975C5.84556 4.05496 5.91694 4.14743 5.95003 4.19427C6.07866 4.3784 6.61179 5.75179 6.67945 6.01078C6.8263 6.57398 6.0255 6.99589 6.04595 7.33053C6.05376 7.46022 6.3047 7.8401 6.38687 7.96659C6.89062 8.74075 7.53007 9.34798 8.31823 9.76989C8.54204 9.88957 8.94839 10.165 9.16625 9.97323C9.40567 9.76268 9.62576 9.27393 9.8373 9.05457C10.0362 8.84882 10.2853 9.01494 10.4942 9.10781C10.9998 9.33237 11.4817 9.66381 11.9746 9.91559C12.1828 11.2157 11.0735 12.0427 9.96557 11.9983C9.2131 11.9679 7.91226 11.3386 7.27503 10.8927C6.04149 10.0289 4.03948 7.74803 4.00045 6.09163C3.98334 5.36551 4.45996 4.07738 5.21949 4.00173V4.00253Z" fill="#5C6671"/>
                                                </svg>

                                                <p class="text-lg">Whatsapp: <span class="text-slate-800">941 821 043</span></p>
                                            </div>
                                    </div>

                                </div>
                                
                                
                            </div>
                            <h2 class="text-[25px] font-bold  mt-12">Cuidar tu salud <br>
                                <span class="md:text-4xl">nunca fue tan fácil.</span></h2>
                        </div>
                    </div>
                    <div class="lg:col-span-2 p-8 md:p-12" style="background-color: #EFF2F5;">
                        <form id="form-web" class="space-y-4" >
                            <input type="hidden" id="tipo" name="tipo" value="PROSALUD">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><label for="nombres" class="block text-sm font-medium text-slate-500 mb-1">Nombres</label><input
                                        id="nombres" name="nombres" required=""
                                        class="w-full bg-white rounded-xl p-3 text-slate-800 focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out"
                                        type="text" value=""></div>
                                <div><label for="apellidos"
                                        class="block text-sm font-medium text-slate-500 mb-1">Apellidos</label><input id="apellidos" name="apellidos"
                                        required=""
                                        class="w-full bg-white  rounded-xl p-3 text-slate-800  focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out"
                                        type="text" value=""></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><label for="dni" class="block text-sm font-medium text-slate-500 mb-1">DNI</label><input id="dni" name="dni"
                                        required="" maxlength="8" pattern="\d{1,9}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                                        class="w-full bg-white rounded-xl p-3 text-slate-800  focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out"
                                        type="text" value=""></div>
                                <div><label for="edad" class="block text-sm font-medium text-slate-500 mb-1">Edad</label><input id="edad" name="edad" required="" maxlength="2"
                                        class="w-full bg-white  rounded-xl p-3 text-slate-800  focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out"
                                        type="number" value=""></div>
                            </div>
                            <div><label for="celular" class="block text-sm font-medium text-slate-500 mb-1">Número de
                                    celular</label><input id="celular" name="celular" required="" class="w-full bg-white  rounded-xl p-3 text-slate-800  focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out" maxlength="9" pattern="\d{1,9}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    type="tel" value=""></div>
                            <div><label for="email" class="block text-sm font-medium text-slate-500 mb-1">Correo
                                    electrónico</label><input id="email"  name="email" required=""
                                    class="w-full bg-white  rounded-xl p-3 text-slate-800  focus:ring-2 focus:ring-amber-400 focus:border-amber-400 focus:outline-none transition duration-150 ease-in-out"
                                    type="email" value=""></div>
                            <div class="pt-4 text-center">
                                <button type="submit"
                                    class="bg-slate-600 text-white font-bold py-3 px-12 rounded-full hover:bg-slate-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 focus:ring-offset-slate-50">Enviar</button>
                                <p class="text-center text-red-500 text-sm mt-4">*Todos los campos son obligatorios.</p>
                            </div>
                        </form>
                    </div>
                </div>
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


<!-- TOAST -->
<div id="toast" class="fixed top-6 right-6 hidden bg-white border rounded-xl shadow px-5 py-4 flex gap-3 z-50">
<div id="toast-icon"></div>
<p id="toast-message" class="text-sm"></p>
</div>

<!-- LOADING -->
<div id="form-loading" class="hidden fixed inset-0 bg-black/40 z-40 flex items-center justify-center">
<div class="w-12 h-12 border-4 border-white/30 border-t-white rounded-full animate-spin"></div>
</div>

    <script>
document.addEventListener('DOMContentLoaded',()=>{

const form=document.getElementById('form-web');
const loading=document.getElementById('form-loading');
const toast=document.getElementById('toast');
const toastMsg=document.getElementById('toast-message');
const toastIcon=document.getElementById('toast-icon');

const toggleLoading=s=>loading.classList.toggle('hidden',!s);

const showToast=(m,t='success')=>{
toastMsg.textContent=m;
toastIcon.textContent=t==='success'?'🔔':'❌';
toast.classList.remove('hidden');
toast.classList.add('animate-ring');
setTimeout(()=>toast.classList.add('hidden'),5000);
};

form.addEventListener('submit',async e=>{
e.preventDefault();

if(!nombres.value||!apellidos.value||!dni.value||!edad.value||!celular.value||!email.value){
showToast('Completa todos los campos','error');return;
}

toggleLoading(true);

try{
const r=await fetch('controlador/formularios.php',{
method:'POST',
body:new FormData(form)
});
const j=await r.json();
toggleLoading(false);

if(j.success){
showToast('Formulario enviado correctamente');
form.reset();
}else{
showToast(j.message,'error');
}
}catch{
toggleLoading(false);
showToast('Error de conexión','error');
}
});
});
</script>


</body>
</html>