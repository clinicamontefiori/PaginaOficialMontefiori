<?php     
$titulo_p = json_unico_detalle ('jpopup_general', 'cms/json/','titulo');
$url_p = json_unico_detalle ('jpopup_general', 'cms/json/','url');
$img_p = json_unico_detalle ('jpopup_general', 'cms/json/','imgdesktop');
$estado_p = json_unico_detalle ('jpopup_general', 'cms/json/','estado');

// Generar un ID único para este popup (por si cambias el contenido después)
$popup_id = md5($img_p . $titulo_p); // Cambia si el popup es diferente
?>

<?php if ($estado_p==1): ?>
<div id="popup-modal"
     class="fixed inset-0 z-50 flex items-center justify-center p-4
            bg-black/80 backdrop-blur-md opacity-0 pointer-events-none
            transition-all duration-300">

    <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full overflow-hidden">
        <button  id="popup-close"
            class="absolute top-2 right-2 bg-black/60 hover:bg-red-500 
                   text-white rounded-full p-2 transition">
            ✕
        </button>

        <?php if (!empty($url_p) && $url_p != '#'): ?>
            <a href="<?php echo $url_p; ?>">
        <?php endif; ?>
        <img src="<?php echo HOST_VAR  ?>uploads/popup/<?php echo $img_p; ?>" 
             alt="<?php echo $titulo_p; ?>" 
             class="w-full block">
        <?php if (!empty($url_p) && $url_p != '#'): ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("popup-modal");
    const closeBtn = document.getElementById("popup-close");
    
    // Usar sessionStorage en lugar de localStorage
    const popupKey = 'popup_shown_<?php echo $popup_id; ?>';
    const alreadyShown = sessionStorage.getItem(popupKey);
    
    if (!alreadyShown) {
        setTimeout(() => {
            modal.classList.remove("opacity-0", "pointer-events-none");
            modal.classList.add("opacity-100");
            sessionStorage.setItem(popupKey, 'true');
        }, 500);
    }
    
    function cerrarPopup() {
        modal.classList.add("opacity-0", "pointer-events-none");
        modal.classList.remove("opacity-100");
    }
    
    closeBtn.addEventListener("click", cerrarPopup);
    modal.addEventListener("click", (e) => {
        if (e.target === modal) cerrarPopup();
    });
});
</script>
<?php endif; ?>