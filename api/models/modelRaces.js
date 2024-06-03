const mongoose = require('mongoose');

const racesSchema = new mongoose.Schema({
  img: String,
  name: String
});

module.exports = mongoose.model('Races', racesSchema);
