const express = require('express');
const router = express.Router();
const controllers = require('../controllers/controllersWiki');

router.post('/:collection', controllers.addObject);
router.delete('/:collection/:id', controllers.deleteObject);
router.put('/:collection/:id', controllers.updateObject);
router.get('/:collection', controllers.getAllObjects);

module.exports = router;
