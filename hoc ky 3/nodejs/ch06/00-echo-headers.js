const express = require('express')
const app = express()

app.get('/headers', (req, res) =>{
    res.type('/text/plain')
    const headers = Object.entries(req.header)
    .map(([key, value]) => '${key}: ${value}')
    res.send(headers.join('/n'))
})

const port = process.env.PORT || 3000
app.listen(port, ()=> console.log('/nnavigate to htt://localhost:${port}/headers\n'))