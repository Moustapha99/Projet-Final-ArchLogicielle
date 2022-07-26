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

// router.get('/{id}', async (req, res, next) => {
//     try {
//         res.json(await articles.getOne(req.params.id));
//     } catch (err) {
//         console.error ("L'article n'a pas pu etre recupere", err.message);
//         next(err);
//         }   
//         } );
module.exports = router;