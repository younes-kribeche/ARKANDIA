const mongoose = require('mongoose');

const regionsSchema = new mongoose.Schema({
  img: String,
  name: String,
  kingdom: String
});

module.exports = mongoose.model('Régions', regionsSchema);
