const mongoose = require('mongoose');

const floreSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  power: String,
  magic: String,
  environment: String,
  effects: String
});

module.exports = mongoose.model('Flore', floreSchema);
