const mongoose = require('mongoose');

const familiersSchema = new mongoose.Schema({
  img: String,
  name: String,
  specie: String,
  power: String,
  owner: String,
  age: String,
  capacities: String,
  magic: String,
  nature: String
});

module.exports = mongoose.model('Familiers', familiersSchema);
