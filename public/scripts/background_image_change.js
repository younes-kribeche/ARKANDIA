document.addEventListener('DOMContentLoaded', function() {
  const carouselItems = document.querySelectorAll('.carousel-item');
  const main = document.querySelector('main');
  const nomsPiliers = document.querySelectorAll('.nom_pilier');
  const bgLayer1 = document.getElementById('bg-layer-1');
  const bgLayer2 = document.getElementById('bg-layer-2');
  let currentLayer = bgLayer1;
  let nextLayer = bgLayer2;
  const colorThief = new ColorThief();
  const imageCache = new Map();

  function adjustBrightness(color, factor) {
    return color.map(channel => Math.max(0, Math.min(255, Math.round(channel * factor))));
  }

  function rgbToHex(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
  }

  function preloadImage(url) {
    if (imageCache.has(url)) {
      return Promise.resolve(imageCache.get(url));
    }
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.crossOrigin = "Anonymous";
      img.onload = () => {
        imageCache.set(url, img);
        resolve(img);
      };
      img.onerror = reject;
      img.src = url;
    });
  }

  function updateVisuals(img, newBackground) {
    return new Promise(resolve => {
      requestAnimationFrame(() => {
        const dominantColor = colorThief.getColor(img);
        // Assombrir la couleur pour un meilleur contraste
        const adjustedColor = adjustBrightness(dominantColor, 0.7);
        const newColor = rgbToHex(...adjustedColor);

        // Appliquer la nouvelle couleur à tous les éléments .nom_pilier
        nomsPiliers.forEach(nomPilier => {
          nomPilier.style.color = newColor;
        });

        nextLayer.style.backgroundImage = `url(${newBackground})`;
        nextLayer.style.opacity = '1';
        currentLayer.style.opacity = '0';

        // Swap layers
        [currentLayer, nextLayer] = [nextLayer, currentLayer];

        resolve();
      });
    });
  }

  async function updateBackground() {
    const activeItem = document.querySelector('.carousel-item.active');
    if (activeItem) {
      const newBackground = activeItem.getAttribute('data-background');
      if (newBackground) {
        try {
          const img = await preloadImage(newBackground);
          await updateVisuals(img, newBackground);
        } catch (error) {
          console.error("Erreur lors du chargement de l'image:", error);
          // Couleur par défaut en cas d'erreur
          nomsPiliers.forEach(nomPilier => {
            nomPilier.style.color = '#FFFFFF';
          });
        }
      }
    }
  }

  // Précharger toutes les images du carousel
  Promise.all(Array.from(carouselItems).map(item => 
    preloadImage(item.getAttribute('data-background'))
  )).then(() => {
    console.log("Toutes les images sont préchargées");
    updateBackground(); // Setup initial
  });

  // Écouteurs d'événements pour le carousel
  carouselItems.forEach(item => {
    item.addEventListener('transitionend', () => {
      if (item.classList.contains('active')) {
        updateBackground();
      }
    });
  });

  // Pour les carousels automatiques ou manuels
  const carousel = document.querySelector('.carousel');
  carousel.addEventListener('slide.bs.carousel', updateBackground);
});