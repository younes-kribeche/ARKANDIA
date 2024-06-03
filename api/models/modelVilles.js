const mongoose = require('mongoose');

const villesSchema = new mongoose.Schema({
  img: String,
  name: String,
  kingdom: String,
  state: String
});

module.exports = mongoose.model('Villes', villesSchema);
