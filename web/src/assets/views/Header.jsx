import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';

import '../style/Header.css'

function Header() {

  useEffect(() => {
    
    // FONCTION POUR LE DROPDOWN
      const dropdowns = document.querySelectorAll('.dropdown-trigger');
      M.Dropdown.init(dropdowns);
    }, []);

  return (
    <>
    <header>
      <nav>
        <div className="nav-wrapper">
          <a href="/" className="brand-logo">ARKANDIA</a>
          <div className="div_onglets">
            <ul id="nav-mobile" className="left hide-on-med-and-down" style={{ marginLeft: '150px' }}>
              <li><a href="#!">MAP</a></li>
              <li><a href="#!">Timeline</a></li>
              <li><a className="dropdown-trigger" href="#!" data-target="dropdown1">Wiki<i className="material-icons right">arrow_drop_down</i></a></li>
            </ul>
          </div>
          <form className="right" style={{ marginRight: '20px' }}>
            <div className="input-field">
              <input id="search" type="search" required />
              <label className="label-icon" htmlFor="search"><i className="material-icons">search</i></label>
              <i className="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>

      <ul id="dropdown1" className="dropdown-content">
        <li><a href="../pages/wikiList.html">Armes</a></li>
        <li><a href="#!">Artéfacts</a></li>
        <li><a href="#!">Divinités</a></li>
        <li><a href="#!">Familiers</a></li>
        <li><a href="#!">Faune</a></li>
        <li><a href="#!">Flore</a></li>
        <li><a href="#!">Magies</a></li>
        <li><a href="#!">Monuments</a></li>
        <li><a href="#!">Personnages secondaires</a></li>
        <li><a href="#!">Piliers</a></li>
        <li><a href="#!">Races</a></li>
        <li><a href="#!">Royaumes</a></li>
        <li><a href="#!">Régions</a></li>
        <li><a href="#!">Villes</a></li>
      </ul>
    </header>
    </>
  );
}

export default Header;
