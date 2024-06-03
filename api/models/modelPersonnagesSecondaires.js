const mongoose = require('mongoose');

const personnagesSecondairesSchema = new mongoose.Schema({
  img: String,
  name: String,
  age: String,
  kingdom: String,
  weapons: String,
  magic: String
});

module.exports = mongoose.model('PersonnagesSecondaires', personnagesSecondairesSchema);
