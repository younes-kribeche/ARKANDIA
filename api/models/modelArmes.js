const mongoose = require('mongoose');

const armesSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  power: String,
  owner: String,
  capacities: String,
  magic: String
});

module.exports = mongoose.model('Armes', armesSchema);
