const mongoose = require('mongoose');

const monumentsSchema = new mongoose.Schema({
  img: String,
  name: String,
  provenance: String,
  description: String
});

module.exports = mongoose.model('Monuments', monumentsSchema);
