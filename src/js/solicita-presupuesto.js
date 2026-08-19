document.addEventListener('DOMContentLoaded',()=>{

	const form=document.getElementById('quote-form');
	const loading=document.getElementById('form-loading');
	const toast=document.getElementById('toast');
	const toastMsg=document.getElementById('toast-message');
	const toastIcon=document.getElementById('toast-icon');

	const toggleLoading=s=>{
		loading.classList.toggle('hidden',!s);
	};

	const showToast=(m,t='success')=>{
		toastMsg.textContent=m;
		toastIcon.textContent=t==='success'?'🔔':'❌';
		toast.classList.remove('hidden');
		toast.classList.add('animate-ring');
		setTimeout(()=>toast.classList.add('hidden'),5000);
	};

	const setupFile=(w,i,f)=>{
		const W=document.getElementById(w);
		const I=document.getElementById(i);
		const F=document.getElementById(f);
		W.onclick=()=>I.click();
		I.onchange=()=>F.textContent=I.files[0]?.name||'Examinar....';
	};

	setupFile('ordenMedica-wrapper','ordenMedica','ordenMedica-filename');
	setupFile('otroArchivo-wrapper','otroArchivo','otroArchivo-filename');

	form.addEventListener('submit',async e=>{

		e.preventDefault();

		if(!nombres.value||!dni.value||!telefono.value){
			showToast('Completa los campos obligatorios','error');return;
		}

		toggleLoading(true);

		try{

			const siteKey = form.dataset.sitekey; // Captura el valor del atributo data-sitekey
            // 1. Obtener el token de reCAPTCHA de forma asíncrona
            // 'postulacion' es el nombre de la acción (puedes cambiarlo)
            const token = await grecaptcha.execute(siteKey, {action: 'presupuesto'});
            
            // 2. Insertarlo en el input oculto
            document.getElementById('recaptcha_token').value = token;

			const r=await fetch('controlador/solicita-presupuesto.php?v1',{
				method:'POST',body:new FormData(form)
			});
			const j=await r.json();
			toggleLoading(false);

			if(j.success){
				showToast('Solicitud enviada correctamente');
				form.reset();
				document.getElementById('ordenMedica-filename').textContent='Examinar....';
				document.getElementById('otroArchivo-filename').textContent='Examinar....';
			}else{
				showToast(j.message,'error');
			}
		}catch{
			toggleLoading(false);
			showToast('Error de conexión','error');
		}

	});
});