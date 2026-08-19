<?php
$cache = 'v4';
?>

<!-- Codificación -->
<meta charset="UTF-8">

<!-- Responsive (obligatorio para SEO) -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO Básico -->
<title><?php echo $mtitle; ?></title>
<meta name="description" content="<?php echo $mdescription; ?>">

<!-- Canonical -->
<link rel="canonical" href="<?php echo $canonical; ?>">

<!-- Indexación -->
<meta name="robots" content="index, follow">

<!-- Idioma -->
<meta http-equiv="Content-Language" content="es">

<!-- Favicons -->
<link rel="icon" href="<?php echo HOST_VAR  ?>img/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo HOST_VAR  ?>img/favicon.ico">

<!-- Open Graph (Facebook / WhatsApp / LinkedIn) -->
<meta property="og:title" content="<?php echo $mtitle; ?>">
<meta property="og:description" content="<?php echo $mdescription; ?>">
<meta property="og:image" content="<?php echo $imgpage; ?>">
<meta property="og:url" content="<?php echo $canonical; ?>">
<meta property="og:type" content="website">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $mtitle; ?>">
<meta name="twitter:description" content="<?php echo $mdescription; ?>">
<meta name="twitter:image" content="<?php echo $imgpage; ?>">

<!-- Preconnect (Acelerar carga de fuentes e imágenes) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com/"></script>

<!-- Preload de CSS prioritario -->
<link rel="preload" href="<?php echo HOST_VAR  ?>css/splide.min.css?<?php echo $cache; ?>" as="style">
<link rel="stylesheet" href="<?php echo HOST_VAR  ?>css/splide.min.css?v<?php echo $cache; ?>">

<link rel="preload" href="<?php echo HOST_VAR  ?>css/styles.css?v<?php echo $cache; ?>" as="style">
<link rel="stylesheet" href="<?php echo HOST_VAR  ?>css/styles.css?<?php echo $cache; ?>">

<!-- Schema Markup: Clínica (Rich Snippets) -->
<?php if (isset($tipo_pagina) && $tipo_pagina === 'medico') { ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Physician",
  "name": "Dr(a). <?php echo $detalle->especialidad; ?>",
  "image": "<?php echo $img_medico; ?>",
  "url": "<?php echo $canonical; ?>",
  "medicalSpecialty": "<?php echo $detalle->especialidad; ?>",
  "telephone": "+51 944 571 133",
  "worksFor": {
    "@type": "MedicalClinic",
    "name": "Clínica Montefiori",
    "url": "https://www.montefiori.com.pe"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Av. Separadora Industrial 1820",
    "addressLocality": "Lima",
    "addressRegion": "Lima",
    "postalCode": "15023",
    "addressCountry": "PE"
  }
}
</script>

<?php }else{ ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalClinic",
  "name": "Clínica Montefiori",
  "url": "https://www.montefiori.com.pe",
  "logo": "https://www.montefiori.com.pe/img/logo_montefiori.svg",
  "image": "https://www.montefiori.com.pe/uploads/blog/Proyecto%20nuevo.webp",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Av. Separadora Industrial #1820 - La Molina",
    "addressLocality": "Lima",
    "addressRegion": "Lima",
    "postalCode": "15023",
    "addressCountry": "PE"
  },
  "telephone": "+51 944 571 133",
  "medicalSpecialty": ["Cardiología", "Pediatría", "Ginecología", "Medicina General"]
}
</script>

<?php } ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N67W7V3P');</script>
<!-- End Google Tag Manager -->