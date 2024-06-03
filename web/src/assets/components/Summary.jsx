import '../style/Summary.css'

function Summary(){
  return(
    <div className="sidebar">
        <div className="toc">
          <h4>Sommaire</h4>
          <ul>
            <li><a href=".infobox">//Biographie//</a></li>
            <li><a href="#section1">//Chapitre 1//</a></li>
            <li><a href="#section2">//Chapitre 2//</a></li>
          </ul> 
        </div>
      </div>
  )
}

export default Summary;