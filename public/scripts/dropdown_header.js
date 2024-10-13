document.addEventListener('DOMContentLoaded', function() {
  var dropdowns = document.querySelectorAll('.dropdown-trigger');
  var instances = M.Dropdown.init(dropdowns, {
    coverTrigger: false, // Empêche le dropdown de se superposer au déclencheur
    constrainWidth: false, // Permet de ne pas forcer la largeur du dropdown à celle du trigger
    autoTrigger: false // Empêche le dropdown de faire défiler la page pour être visible
  });
});
