const express = require('express');
const express = require('express');
const mysql = require('mysql');
const app = express();

app.use(express.json());
app.get("/", (req, res) => {  // req = request, res = response
    const article = req.query.article;  
    res.send(article + "!");   
});         


        //post request
const article = [];
app.post("/article", (req, res) => {
    const { article }= req.body;

    user.push({ article: article.titre, id: article.id});

    res.json({ article: article.titre, id: article.id});
});

app.get("/article", async (req, res) => {
    const query = "SELECT * FROM articles";
    createPool.




app.listen(5000, () => {
    console.log('Server started on port 5000');
});

