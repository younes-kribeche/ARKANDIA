import Summary from '../components/Summary';
import CharacterSheet from '../components/CharacterSheet';
import Biography from '../components/Biography';

import '../style/WikiPage.css';

function WikiPage() {
  return (
    <div className="sidebar_container">
      <Summary />
      <div>
      <CharacterSheet /> 
      <Biography />
      </div>
    </div>
  );
}

export default WikiPage;
