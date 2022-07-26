const express = require('express');
// const mysql = require('mysql');
const app = express();
const port = 5000;
const articleRouter = require('./routes/articles');
// const categoryRouter = require('./routes/articles/{id}');

app.use(express.json());
app.use(
    express.urlencoded({
        extended: true
    })
);


        
        /*  ------------------- definition de la route ------------------- */
        
        
app.use("/articles", articleRouter);
// app.use("articles/{id}", categoryRouter);

        /* ------------------- middleware qui gére les erreurs ------------------- */
    app.use((err, req, res, next) => {
        const statusCode = err.statusCode || 500;
        console.error(err.message, err.stack);
        res.status(statusCode).json({ message: err.message});
        return;
    } );

    app.listen(port, () => {
        console.log('Server started on port 5000');
    });







