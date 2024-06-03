const mongoose = require('mongoose');

const artefactsSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  power: String,
  owner: String,
  capacities: String,
  magic: String
});

module.exports = mongoose.model('Artefacts', artefactsSchema);
