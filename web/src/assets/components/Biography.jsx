import '../style/Biography.css'

function Biography(){
  return(
    <div className="container">
          <div>
            <h1>//Nom du pilier//</h1>

            <p>
              //Courte description// Lorem ipsum dolor sit amet, consectetur
              adipiscing elit. Nullam suscipit elit non lectus lacinia, sed aliquet
              dui blandit. Mauris efficitur erat in lorem aliquet tincidunt.
              Suspendisse potenti.
            </p>
            <h2 id="section1">//Chapitre 1//</h2>
            <p>
              //histoire chap1// Proin sit amet lorem vel urna venenatis fringilla.
              Morbi condimentum, metus sit amet sollicitudin sodales, lectus dolor
              varius lorem, at scelerisque erat libero eget nulla. Phasellus sed
              vestibulum purus.
            </p>
            <ul>
              <li>Point 1</li>
              <li>Point 2</li>
              <li>Point 3</li>
            </ul>
            <h2 id="section2">Section 2</h2>
            <p>
              Integer dapibus, arcu non efficitur vestibulum, nisi orci lacinia velit,
              eget auctor quam urna non justo. Suspendisse potenti. Cras et luctus
              libero, non bibendum magna.
            </p>
            <ol>
              <li>Etape 1</li>
              <li>Etape 2</li>
              <li>Etape 3</li>
            </ol>
            <div className="footer">
              <p>
                Cet article est un exemple de page type Wikipedia. Pour plus
                d'informations, visitez le site officiel de
                <a href="https://www.wikipedia.org/">Wikipedia</a>.
              </p>
            </div>
          </div>
        </div>
  );
};

export default Biography;