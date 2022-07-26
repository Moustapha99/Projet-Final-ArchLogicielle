const db = require('./db');
const helper = require('../helper');
const config = require('../config');

async function getMultiple(page = 1) {
    const offset = helper.getOffset(page, config.listPerPage);
    const rows = await db.query (
        `SELECT * FROM article LIMIT ${config.listPerPage} OFFSET ${offset}`
    );

async function getOne(id) {
    const offset = helper.getOffset(page, config.listPerPage);
    const rows = await db.query (
        `SELECT * FROM article WHERE id = ${id} LIMIT 1`
    );
    return rows[0];
}
    
    const data = helper.emptyOrRows(rows);
    const meta = {page};

    return { data, meta };
}

module.exports = {
    getMultiple
    };