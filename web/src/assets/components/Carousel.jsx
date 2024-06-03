import React, { useEffect } from 'react';
import '../style/Carousel.css';

function Carousel() {
  
  useEffect(() => {
    // FONCTION POUR LE CAROUSEL
    var elems = document.querySelectorAll('.carousel');
    M.Carousel.init(elems, {
      fullWidth: false,
      indicators: true,
    });
  }, []);

  return (
    <div className="carousel">
      <a className="carousel-item" href="../pages/wikiPiliers.html">
        <img src="../img/Vladimir_45_ans_portrait.webp" className="img_carousel" />
      </a>
      <a className="carousel-item" href="../pages/wikiPiliers.html">
        <img src="../img/Basile_32ans_portrait.webp" />
      </a>
      <a className="carousel-item" href="../pages/wikiPiliers.html">
        <img src="../img/matt.webp" />
      </a>
      <a className="carousel-item" href="../pages/wikiPiliers.html">
        <img src="../img/Kraktus.webp" />
      </a>
    </div>
  );
}

export default Carousel;


