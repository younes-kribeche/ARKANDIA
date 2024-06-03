
import Carousel from '../components/Carousel'

import '../style/HomePage.css'

function HomePage(){
  return (
    <>
    <div className="container">
      <div className="section-carousel">
        <div className="text_bienvenue">
          <h1>BIENVENUE</h1>
          <p>Vladimir Maguire VIe Pendragon</p>
        </div>
       <Carousel />
      </div>
    </div>
    </>
  );
}

export default HomePage;