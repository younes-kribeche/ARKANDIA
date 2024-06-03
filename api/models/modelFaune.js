const mongoose = require('mongoose');

const fauneSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  power: String,
  capacities: String,
  magic: String,
  environment: String,
  nature: String
});

module.exports = mongoose.model('Faune', fauneSchema);
