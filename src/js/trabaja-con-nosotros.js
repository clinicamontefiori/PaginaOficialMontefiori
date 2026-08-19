document.addEventListener('DOMContentLoaded', () => {

    /* =========================
       ELEMENTOS
    ========================= */
    const form = document.getElementById('application-form');
    const submitBtn = form.querySelector('button[type="submit"]');
    const loading = document.getElementById('form-loading');

    const toast = document.getElementById('toast');
    const toastMsg = document.getElementById('toast-message');
    const toastIcon = document.getElementById('toast-icon');

    const fields = {
        names: document.getElementById('names'),
        phone: document.getElementById('phone'),
        email: document.getElementById('email'),
        cv: document.getElementById('cv'),
        cookies: document.getElementById('cookiesAccepted')
    };

    const errors = {
        names: document.getElementById('names-error'),
        phone: document.getElementById('phone-error'),
        email: document.getElementById('email-error'),
        cv: document.getElementById('cv-error'),
        cookies: document.getElementById('cookies-error')
    };

    const cvFileName = document.getElementById('cv-file-name');
    const customCheckbox = document.getElementById('custom-checkbox');
    const checkIcon = document.getElementById('check-icon');

    /* =========================
       CONSTANTES
    ========================= */
    const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const MAX_FILE_SIZE = 2 * 1024 * 1024;
    const ALLOWED_TYPES = [
        'image/png',
        'image/jpeg',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    /* =========================
       HELPERS
    ========================= */
    const setError = (field, msg) => errors[field].textContent = msg;
    const clearError = (field) => errors[field].textContent = '';
    const isEmpty = (v) => !v || !v.trim();

    const toggleLoading = (show) => {
        loading.classList.toggle('hidden', !show);
        submitBtn.disabled = show;
        submitBtn.classList.toggle('opacity-60', show);
        submitBtn.classList.toggle('cursor-not-allowed', show);
    };

    const showToast = (message, type = 'success') => {
        toastMsg.textContent = message;
        toastIcon.textContent = type === 'success' ? '🔔' : '❌';

        toast.classList.remove('hidden');
        toast.classList.add('animate-ring');

        setTimeout(() => toast.classList.remove('animate-ring'), 600);
        setTimeout(() => toast.classList.add('hidden'), 5000);
    };

    /* =========================
       VALIDACIÓN ARCHIVO
    ========================= */
    fields.cv.addEventListener('change', () => {
        clearError('cv');
        cvFileName.textContent = 'Examinar....';

        const file = fields.cv.files[0];
        if (!file) return;

        if (file.size > MAX_FILE_SIZE) {
            setError('cv', 'El archivo no debe superar los 2MB.');
            fields.cv.value = '';
            return;
        }

        if (!ALLOWED_TYPES.includes(file.type)) {
            setError('cv', 'Tipo de archivo no permitido.');
            fields.cv.value = '';
            return;
        }

        cvFileName.textContent = file.name;
    });

    /* =========================
       CHECKBOX UI
    ========================= */
    fields.cookies.addEventListener('change', () => {
        const checked = fields.cookies.checked;

        customCheckbox.classList.toggle('bg-green-500', checked);
        customCheckbox.classList.toggle('border-green-500', checked);
        customCheckbox.classList.toggle('bg-white', !checked);
        customCheckbox.classList.toggle('border-slate-300', !checked);
        checkIcon.classList.toggle('hidden', !checked);

        if (checked) clearError('cookies');
    });

    /* =========================
       VALIDACIÓN FORM
    ========================= */
    const validateForm = () => {
        let valid = true;

        if (isEmpty(fields.names.value)) {
            setError('names', '*Campo obligatorio.');
            valid = false;
        } else clearError('names');

        if (isEmpty(fields.phone.value)) {
            setError('phone', '*Campo obligatorio.');
            valid = false;
        } else clearError('phone');

        const email = fields.email.value.trim();
        if (isEmpty(email)) {
            setError('email', '*Campo obligatorio.');
            valid = false;
        } else if (!EMAIL_REGEX.test(email)) {
            setError('email', 'Correo inválido.');
            valid = false;
        } else clearError('email');

        if (!fields.cv.files.length) {
            setError('cv', '*Adjunta tu CV.');
            valid = false;
        } else clearError('cv');

        if (!fields.cookies.checked) {
            setError('cookies', '*Debes aceptar las políticas.');
            valid = false;
        }

        return valid;
    };


    /* =========================
    SUBMIT ACTUALIZADO V3
    ========================= */
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!validateForm()) return;

        toggleLoading(true);

        try {
            const siteKey = form.dataset.sitekey; // Captura el valor del atributo data-sitekey
            // 1. Obtener el token de reCAPTCHA de forma asíncrona
            // 'postulacion' es el nombre de la acción (puedes cambiarlo)
            const token = await grecaptcha.execute(siteKey, {action: 'postulacion'});
            
            // 2. Insertarlo en el input oculto
            document.getElementById('recaptcha_token').value = token;

            // 3. Proceder con el fetch original (FormData ya incluye el token automáticamente)
            const res = await fetch('controlador/trabaja-nosotro.php', {
                method: 'POST',
                body: new FormData(form)
            });

            const result = await res.json();
            toggleLoading(false);

            if (result.success) {
                showToast('Correo enviado satisfactoriamente');
                form.reset();
                cvFileName.textContent = 'Examinar....';
                checkIcon.classList.add('hidden');
                customCheckbox.className =
                    'w-5 h-5 border-2 rounded bg-white border-slate-300 flex items-center justify-center';

                form.scrollIntoView({ behavior: 'smooth' });
            } else {
                showToast(result.message || 'Ocurrió un error', 'error');
            }

        } catch (error) {
            toggleLoading(false);
            showToast('Error de conexión o verificación. Intente nuevamente', 'error');
            console.error("Error en el envío:", error);
        }
    });

});