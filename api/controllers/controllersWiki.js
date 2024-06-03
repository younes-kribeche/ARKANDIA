const collections = require('../collections/collectionsWiki');
const express = require('express');
const router = express.Router();

exports.addObject = async (req, res) => {
  const { collection } = req.params;
  const Model = collections[collection.toLowerCase()];
  if (!Model) {
    return res.status(400).send('Invalid collection name');
  }

  try {
    const newObj = new Model(req.body);
    await newObj.save();
    res.status(201).send(newObj);
  } catch (error) {
    res.status(500).send(error.message);
  }
};

exports.deleteObject = async (req, res) => {
  const { collection, id } = req.params;
  const Model = collections[collection.toLowerCase()];
  if (!Model) {
    return res.status(400).send('Invalid collection name');
  }

  try {
    const result = await Model.findByIdAndDelete(id);
    if (!result) {
      return res.status(404).send('Object not found');
    }
    res.status(200).send('Object deleted');
  } catch (error) {
    res.status(500).send(error.message);
  }
};

exports.updateObject = async (req, res) => {
  const { collection, id } = req.params;
  const Model = collections[collection.toLowerCase()];
  if (!Model) {
    return res.status(400).send('Invalid collection name');
  }

  try {
    const updatedObj = await Model.findByIdAndUpdate(id, req.body, { new: true, runValidators: true });
    if (!updatedObj) {
      return res.status(404).send('Object not found');
    }
    res.status(200).send(updatedObj);
  } catch (error) {
    res.status(500).send(error.message);
  }
};

exports.getAllObjects = async (req, res) => {
  const { collection } = await  req.params;
  const Model = collections[collection];
  if (!Model) {
    return res.status(400).send('Invalid collection name');
  }

  try {
    const objects = await Model.find({});
    res.status(200).send(objects);
  } catch (error) {
    res.status(500).send(error.message);
  }
};