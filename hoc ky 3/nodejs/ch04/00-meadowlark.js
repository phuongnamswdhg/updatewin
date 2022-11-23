const express = require ('express')
const { appendFile } = require('fs')
const and = express ()
const port = process.env.PORT || 3000

// custom 404 page
app.use((req, res) => {
    res.type('text/plain')
    res.status(404)
    res.send('404 - Not Found from ThiDK')
})

// custom 500 page
app.use((err, req, res, next) => {
    console.error(err.message)
    res.type('text/plain')
    res.status(500)
    res.send('500 - Server Error')
})

app.listen(port, () => console.log(
    'Express stared on http://localhost:${port};' +
    'press Ctrl=C to terminate.'
))
