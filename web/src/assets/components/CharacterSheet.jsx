import '../style/CharacterSheet.css'

function CharacterSheet(){
  return(
    <div className="infobox">
      <img src="..\public\img\Vladimir_45_ans_portrait.webp" alt="Exemple d'image" />
      <div>
        <p><strong>Nom</strong>:</p>
        <p><strong>Titres</strong>:</p>
        <p><strong>Race</strong>:</p>
        <p><strong>Age</strong>:</p>
        <p><strong>Magie</strong>:</p>
        <p><strong>Armes</strong>:</p>
        <p><strong>Familiers</strong>:</p>
        <p><strong>Royaume</strong>:</p>
        <p><strong>Famille</strong>:</p>
        <p><strong>Alliés</strong>:</p>
        <p><strong>Ennemies</strong>:</p>
      </div>
    </div>
  );
}

export default CharacterSheet;

