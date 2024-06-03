// server.js
const express = require('express');
const mongoose = require('mongoose');
const routesWiki = require('./routes/routesWiki');
const app = express();
const port = 3000;
const url = 'mongodb://localhost:27017/ARKANDIA';

// Ajoutez cette ligne pour parser les données JSON
app.use(express.json());

app.use(routesWiki);

async function connectToDataBase() {
  try {
    await mongoose.connect(url);
    console.log('Connexion à la base de données réussie.');
  } catch (err) {
    console.error('Connexion échouée.', err);
  }
}

connectToDataBase();

app.listen(port, () => {
  console.log(`Serveur en écoute sur le port ${port}`);
});
