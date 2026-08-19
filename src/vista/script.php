<script src="<?php echo HOST_VAR  ?>js/splide.min.js?<?php echo $cache; ?>"></script>
<script src="<?php echo HOST_VAR  ?>js/app.js?<?php echo $cache; ?>"></script>

<script>
document.addEventListener('click', function (e) {
    const target = e.target;

    if (!(target instanceof Element)) return;

    const link = target.closest('a');

    if (!link) return;

    const href = link.href || '';

    // Agendar cita
    if (href.includes('citas.montefiori.com.pe')) {
        if (typeof fbq === 'function') {
            fbq('track', 'Schedule');
        }
    }
    // WhatsApp
    if (href.includes('wa.me') || href.includes('api.whatsapp.com') || href.includes('whatsapp.com')
    ) {
        if (typeof fbq === 'function') {
            fbq('track', 'Contact');
        }
    }

    // Selección de médico desde resultados
    if (link.classList.contains('meta-medico-result')) {
        if (typeof fbq === 'function') {
            fbq('track', 'Search');
        }
    }
});
</script>