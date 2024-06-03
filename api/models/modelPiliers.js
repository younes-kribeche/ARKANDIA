const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const piliersSchema = new Schema({
  img: String,
  name: String,
  titles: String,
  age: String,
  kingdom: String,
  magic: String,
  weapons: String,
  pets: String,
  family: String,
  allies: String,
  ennemies: String,
  race: String,
  password: String
});

module.exports = mongoose.model('Piliers', piliersSchema);
