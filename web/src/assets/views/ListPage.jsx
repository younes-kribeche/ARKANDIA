import '../style/ListPage.css';

function ListPage() {
  return (
    <>
      <div className="container">
        <div className="section-list">
          <p>WIKI</p>
          <li className="filter">
            <a className="dropdown-trigger" href="#!" data-target="dropdown2">
              Filtres
              <i className="material-icons right filterArrow">arrow_drop_down</i>
            </a>
          </li>
          <ul id="dropdown2" className="dropdown-content">
            <li><a href="#!">Environnement terrestre</a></li>
            <li><a href="#!">Environnement aquatique</a></li>
            <li><a href="#!">Environnement aérien</a></li>
            <li><a href="#!">Agréssif</a></li>
            <li><a href="#!">Neutre</a></li>
            <li><a href="#!">Passif</a></li>
            <li><a href="#!">Puissance croissante</a></li>
            <li><a href="#!">Puissance décroissante</a></li>
          </ul>
        </div>
      </div>
    </>
  );
}

export default ListPage;
