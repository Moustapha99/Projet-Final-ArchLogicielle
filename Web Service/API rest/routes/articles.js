const express = require('express');
const router = express.Router();
const articles = require('../services/articles');

/* GET ARTICLES */

router.get('/', async (req, res, next) => {
    try {
        res.json(await articles.getMultiple(req.query.page));
    } catch (err) {
        console.error ("Les articles n'ont pas pu etre recuperes", err.message);
        next(err);
        }
        } );
module.exports = router;