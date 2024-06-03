const mongoose = require('mongoose');

const magiesSchema = new mongoose.Schema({
  img: String,
  name: String,
  description: String
});

module.exports = mongoose.model('Magies', magiesSchema);
