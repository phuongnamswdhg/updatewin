const express = require ('express')
const expressHandlebars = require('express-handlebars')
const cookieParser = require('cookie-parser')
const session =require('express-session')
const catNames = require('cat-names')
const app = express()

app.engine('handlebars', expressHandlebars.engine({ defaultLayout: 'main'}))

app.get('/error',(req,res)=> res.status(500).render('error'))

app.get('*', (req,res)=> res.send('check out our <a href="/error">Error</a> page!'))

const port = process.env.PORT || 3000
app.listen(port,()=>console.log(`\nnavigate to http://localhost:${port}/error\n`))