document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.carousel');
  var instances = M.Carousel.init(elems, {
    fullWidth: false,
    indicators: true,
    numVisible: 3,
    shift: 50,
    padding: 50,
    dist: -50,
    duration: 200, // Réduire la durée de l'animation pour plus de rapidité
    onCycleTo: function() {
      // Mettre à jour l'arrière-plan ici si nécessaire
      updateBackground(this.center);
    }
  });

  var carousel = document.querySelector('.carousel');
  var instance = M.Carousel.getInstance(carousel);
  var isAnimating = false;

  function smoothScroll(targetIndex) {
    var currentIndex = instance.center;
    var totalItems = carousel.children.length;
    var distance = (targetIndex - currentIndex + totalItems) % totalItems;

    if (distance === 0) return;

    var direction = distance > totalItems / 2 ? -1 : 1;
    var steps = direction > 0 ? distance : totalItems - distance;

    function step(count) {
      if (count === steps) {
        isAnimating = false;
        return;
      }
      instance.next(1);
      requestAnimationFrame(() => step(count + 1));
    }

    isAnimating = true;
    step(0);
  }

  carousel.addEventListener('click', function(e) {
    if (isAnimating) return;

    var clickedItem = e.target.closest('.carousel-item');
    if (clickedItem) {
      var clickedIndex = Array.from(carousel.children).indexOf(clickedItem);
      smoothScroll(clickedIndex);
    }
  });

  // Fonction pour mettre à jour l'arrière-plan
  function updateBackground(index) {
    var activeItem = carousel.children[index];
    var backgroundImage = activeItem.getAttribute('data-background');
    if (backgroundImage) {
      document.querySelector('main').style.backgroundImage = `url(${backgroundImage})`;
    }
  }

  // Navigation manuelle
  document.querySelector('.carousel-prev').addEventListener('click', function(e) {
    e.preventDefault();
    if (!isAnimating) {
      isAnimating = true;
      instance.prev(1, function() {
        isAnimating = false;
      });
    }
  });

  document.querySelector('.carousel-next').addEventListener('click', function(e) {
    e.preventDefault();
    if (!isAnimating) {
      isAnimating = true;
      instance.next(1, function() {
        isAnimating = false;
      });
    }
  });
});