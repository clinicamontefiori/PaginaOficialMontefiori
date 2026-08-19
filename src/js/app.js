  const ismovile = navigator.userAgent.match(/iPhone|android|iPod/i);
  
  document.addEventListener('DOMContentLoaded', function () {
            const menuOpenButton = document.getElementById('menu-open-button');
            const menuCloseButton = document.getElementById('menu-close-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuOpenButton && menuCloseButton && mobileMenu) {
                menuOpenButton.addEventListener('click', function () {
                    mobileMenu.classList.remove('-translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                });

                menuCloseButton.addEventListener('click', function () {
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('-translate-x-full');
                });
            }
        });


 /*    const swiper = new Swiper('.swiper', {
                        autoplay: {
                        delay: 5000,
                    },pagination: {
        el: ".swiper-pagination",
      },
                    loop: false,
                });

                 */


const sliders = document.querySelectorAll(".splide");

sliders.forEach(function(element){
   /*  const interval = element.dataset.interval;
    console.log(interval); */

    if(!ismovile && element.dataset.restrict === "desktop"){
        return;
    }
 
    var splide = new Splide( element, element.dataset.config ? JSON.parse(element.dataset.config) : {} );
    splide.mount(); 
});




        const modal = document.getElementById('video-modal');
        const modalContent = document.getElementById('modal-content');
        const iframe = document.getElementById('youtube-iframe');
        const closeBtn = document.getElementById('close-btn');

 // 4. Lógica del Modal
        function openModal(id) {
            // Asignar URL al iframe (autoplay activado)
            iframe.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0&modestbranding=1`;
            
            // Mostrar y Animar entrada
            modal.classList.remove('modal-enter');
            modal.classList.add('modal-enter-active');
            
            // Pequeño delay para asegurar que el navegador procese el cambio de display/visibilidad
            requestAnimationFrame(() => {
                modalContent.classList.remove('modal-content-enter');
                modalContent.classList.add('modal-content-active');
            });
            
            document.body.style.overflow = 'hidden'; // Bloquear scroll del body
        }

        function closeModal() {
            // Animar salida
            modalContent.classList.remove('modal-content-active');
            modalContent.classList.add('modal-content-enter');

            modal.classList.remove('modal-enter-active');
            modal.classList.add('modal-enter');

            // Limpiar iframe después de la animación para detener audio
            setTimeout(() => {
                iframe.src = '';
                document.body.style.overflow = ''; // Restaurar scroll
            }, 300); // Duración coincide con CSS transition duration
        }

        // 5. Event Listeners Globales
        if(closeBtn) closeBtn.addEventListener('click', closeModal);

        // Cerrar al dar click fuera del contenido (backdrop)
        if(modal) modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

  
      





















/*  const MOCK_DOCTORS = [
        { id: '1', name: 'Rodriguez Garcia Xiomara', specialty: 'Otorrinolaringología', imageUrl: 'https://picsum.photos/id/64/200/200' },
        { id: '2', name: 'Perez Juan Carlos', specialty: 'Cardiología', imageUrl: 'https://picsum.photos/id/91/200/200' },
        { id: '3', name: 'Gomez Ana Maria', specialty: 'Pediatría', imageUrl: 'https://picsum.photos/id/1027/200/200' },
        { id: '4', name: 'Lopez Ricardo', specialty: 'Otorrinolaringología', imageUrl: 'https://picsum.photos/id/177/200/200' },
        { id: '5', name: 'Fernandez Laura', specialty: 'Dermatología', imageUrl: 'https://picsum.photos/id/338/200/200' },
        { id: '6', name: 'Martinez Pedro', specialty: 'Neurología', imageUrl: 'https://picsum.photos/id/823/200/200' }
      ]; */

      const fetchDoctors = async (query, endpoint) => {
        console.log(`Fetching from endpoint: ${endpoint} with query: "${query}"`);
        return new Promise((resolve) => {

            fetch(endpoint)
            .then(response => response.json())
            .then(MOCK_DOCTORS => {

                if (!query) { resolve([]); return; }
                const lowerQuery = query.toLowerCase();
                const filtered = MOCK_DOCTORS.filter(doc => 
                doc.name.toLowerCase().includes(lowerQuery) || 
                doc.specialty.toLowerCase().includes(lowerQuery)
                );
                resolve(filtered);
                
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                resolve([]);
            });

         
        });
      };

      /**
       * REUSABLE SEARCH COMPONENT CLASS
       */
      class SearchComponent {
        constructor(containerId, options) {
          this.container = document.getElementById(containerId);
          this.endpoint = options.endpoint;
          this.placeholder = options.placeholder || "Buscar...";
          this.renderItem = options.renderItem;
          this.onSelect = options.onSelect;
          this.icon = options.iconoSvg || '';
          this.big = options.big || false;
          this.query = "";
          this.results = [];
          this.isLoading = false;
          this.debounceTimer = null;

          this.init();
        }

        init() {
          // Render basic structure
          this.container.innerHTML = `
            <div class="relative group font-sans w-full mx-auto">
              <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
               ${this.icon}
              </div>
              <input
                type="text"
                class="${this.big ? 'shadow-sm py-6 pl-14 pr-5':'py-4 pl-16 pr-4'} w-full bg-white rounded-full  text-slate-800 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                placeholder="${this.placeholder}"
              />
              <div class="loading-indicator absolute inset-y-0 right-0 pr-6 flex items-center hidden">
                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500"></div>
              </div>
              
              <!-- Results Dropdown -->
              <div class="results-dropdown absolute z-50 w-full mt-4 bg-white rounded-3xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] overflow-hidden border border-gray-100 hidden">
                <div class="results-list max-h-[400px] overflow-y-auto custom-scrollbar p-2"></div>
              </div>

              <!-- No Results -->
              <div class="no-results absolute z-50 w-full mt-4 bg-white rounded-3xl shadow-lg p-6 text-center text-gray-500 hidden">
                No se encontraron resultados.
              </div>
            </div>
          `;

          // Select DOM elements
          this.inputEl = this.container.querySelector('input');
          this.loadingEl = this.container.querySelector('.loading-indicator');
          this.dropdownEl = this.container.querySelector('.results-dropdown');
          this.resultsListEl = this.container.querySelector('.results-list');
          this.noResultsEl = this.container.querySelector('.no-results');

          // Bind events
          this.inputEl.addEventListener('input', (e) => this.handleInput(e));
          this.inputEl.addEventListener('focus', () => {
             if (this.results.length > 0) this.showDropdown();
          });

          // Click outside to close
          document.addEventListener('click', (e) => {
            if (!this.container.contains(e.target)) {
              this.hideDropdown();
            }
          });
        }

        handleInput(e) {
          const value = e.target.value;
          this.query = value;

          if (this.debounceTimer) clearTimeout(this.debounceTimer);

          if (value.length < 2) {
            this.results = [];
            this.hideDropdown();
            return;
          }

          this.debounceTimer = setTimeout(() => this.performSearch(), 300);
        }

        async performSearch() {
          this.showLoading();
          try {
            const data = await fetchDoctors(this.query, this.endpoint);
            this.results = data;
            this.renderResults();
          } catch (err) {
            console.error(err);
            this.results = [];
          } finally {
            this.hideLoading();
          }
        }

        showLoading() {
          this.loadingEl.classList.remove('hidden');
        }

        hideLoading() {
          this.loadingEl.classList.add('hidden');
        }

        showDropdown() {
          if (this.results.length > 0) {
            this.dropdownEl.classList.remove('hidden');
            this.noResultsEl.classList.add('hidden');
          } else if (this.query.length >= 2 && !this.isLoading) {
             this.dropdownEl.classList.add('hidden');
             this.noResultsEl.classList.remove('hidden');
          }
        }

        hideDropdown() {
          this.dropdownEl.classList.add('hidden');
          this.noResultsEl.classList.add('hidden');
        }

        renderResults() {
          this.resultsListEl.innerHTML = '';
          
          if (this.results.length === 0) {
            this.dropdownEl.classList.add('hidden');
            if(this.query.length >= 2) this.noResultsEl.classList.remove('hidden');
            return;
          }

          this.noResultsEl.classList.add('hidden');
          this.dropdownEl.classList.remove('hidden');

          this.results.forEach(item => {
            const itemEl = document.createElement('div');
            itemEl.className = "cursor-pointer transition-colors duration-200 hover:bg-blue-50/50 rounded-2xl";
            // Use the passed render function to get HTML string
            itemEl.innerHTML = this.renderItem(item, this.query);
            itemEl.addEventListener('click', () => {
              this.onSelect(item);
              this.hideDropdown();
              this.inputEl.value = ""; // Clear input on select
              this.query = "";
            });
            this.resultsListEl.appendChild(itemEl);
          });
        }
      }

      /**
       * UTILS
       */
      function highlightText(text, highlight, boldMain = false) {
        if (!highlight.trim()) {
           return `<span class="${boldMain ? 'font-bold text-gray-800' : 'text-gray-500'}">${text}</span>`;
        }
        const regex = new RegExp(`(${highlight})`, 'gi');
        return `<span class="${boldMain ? 'text-gray-800' : 'text-gray-500'}">` + 
          text.replace(regex, (match) => `<span class="bg-yellow-100 text-gray-900 font-semibold">${match}</span>`) +
        `</span>`;
      }

      function showToast(doctor) {
        const container = document.getElementById('toast-container');
        container.innerHTML = `
          <div class="bg-white p-6 rounded-2xl shadow-2xl animate-bounce-in max-w-sm border-l-4 border-yellow-400">
            <h3 class="font-bold text-gray-800">Seleccionado:</h3>
            <p class="text-blue-600">${doctor.name}</p>
            <p class="text-gray-500">${doctor.specialty}</p>
            <button onclick="document.getElementById('toast-container').innerHTML = ''" class="mt-4 text-sm text-gray-400 hover:text-gray-600 underline">Cerrar</button>
          </div>
        `;
      }