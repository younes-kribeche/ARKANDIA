const mongoose = require('mongoose');

const divinitesSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  power: String,
  owner: String,
  capacities: String,
  magic: String
});

module.exports = mongoose.model('Divinites', divinitesSchema);
