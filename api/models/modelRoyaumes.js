const mongoose = require('mongoose');

const royaumesSchema = new mongoose.Schema({
  img: String,
  name: String,
  king: String,
  regions: [String],
  cities: [String]
});

module.exports = mongoose.model('Royaumes', royaumesSchema);
