// Importation des schémas
const Armes = require('../models/modelArmes');
const Artefacts = require('../models/modelArtefacts');
const Chevaliers = require('../models/modelChevaliers')
const Divinites = require('../models/modelDivinites');
const Familiers = require('../models/modelFamiliers');
const Faune = require('../models/modelFaune');
const Flore = require('../models/modelFlore');
const Magies = require('../models/modelMagies');
const Monuments = require('../models/modelMonuments');
const Piliers = require('../models/modelPiliers')
const PersonnagesSecondaires = require('../models/modelPersonnagesSecondaires');
const Races = require('../models/modelRaces');
const Royaumes = require('../models/modelRoyaumes');
const Regions = require('../models/modelRegions');
const Villes = require('../models/modelVilles');

const collections = {
  armes: Armes,
  artefacts: Artefacts,
  chevaliers: Chevaliers,
  divinites: Divinites,
  familiers: Familiers,
  faune: Faune,
  flore: Flore,
  magies: Magies,
  monuments: Monuments,
  personnagesSecondaires: PersonnagesSecondaires,
  piliers: Piliers,
  races: Races,
  royaumes: Royaumes,
  regions: Regions,
  villes: Villes
};

module.exports = collections;
