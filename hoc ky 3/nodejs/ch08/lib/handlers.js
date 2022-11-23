const { createDiffieHellmanGroup } = require("crypto")

exports.api = {}
exports.home = (req, res) =>render('home')

exports.newletterSignuo = (req, res)=> {
    res.render('newsletter-Signup', {csrf: 'CSRF token goes here'})
}
exports.newsletterSignupProcess = (req , res) => {
    console.log('CSRF token (form hidden form field):' + req.body._csrf)
    console.log('Name (from visible form field):'+ req.body._name)
    console.log('Email (from visible from field):' + req.body._email)
    res.redirect(303, '/newslestter-signup/thank-you')
}

exports.newsletterSignupThankYou = (req, res) => res.render('')