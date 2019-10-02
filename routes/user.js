const express = require('express');
const router = express.Router();
const config = require('./../db');

const {User} = require('../models/User');

// Send sms to number if it is not in the database and store the number.

router.get('/saveNumber/:number',async(req,res)=>{
    try{
        var user = await User.findOne({"number":req.params.number});
    if(!user){
        const client = require('twilio')(config.accountSid, config.authToken);
        var pin_code = Math.floor(1000 + Math.random() * 9000);

        client.messages.create({
            body: 'Please puth this number '+pin_code+' to verify your mobile number.',
            to: req.params.number,  // Text this number
            from: config.from // From a valid Twilio number
        })
            .then((message) => {
                const newUser = new User();
                newUser.number = req.params.number;
                newUser.pin_code = pin_code;
                newUser
                    .save()
                    .then(user => {
                        if (user) {
                            if (user) {
                                res.status(200).send({"message": "Message sent to " + req.params.number})
                            } else {
                                res.status(404).send({"message": "something went wrong"})
                            }
                        }
                    });
            });

    }else{
        res.status(404).send({"message":"Already found this number."})

    }
    }catch(err){
        console.log(err);
      res.status(500).send(err)
    }
});

// Get Api to verify the number and code sent to user.
/*
This api will check the user in the users table and verify user number.
 */

router.get('/verifyPin/:number/:pin',async(req,res)=> {

    try{
        var user = await User.findOne({"number":req.params.number, pin_code: req.params.pin});
        if(user){

            const client = require('twilio')(config.accountSid, config.authToken);

            client.messages.create({
                body: 'Number verified. You can use app further.',
                to: req.params.number,  // Text this number
                from: '+12402934383' // From a valid Twilio number
            })
                .then((message) => {
                    user.number = req.params.number;
                    user.is_verified = 1;
                    user
                        .save()
                        .then(user => {
                            if (user) {
                                if (user) {
                                    console.log('Number '+req.params.number+' verified');
                                    res.status(200).send({"message": 'Number '+req.params.number+' verified'})
                                } else {
                                    res.status(404).send({"message": "something went wrong"})
                                }
                            }
                        });
                });

        }else{
            res.status(404).send({"message":"No number with this code found. Please try with a correct one"})

        }
    }catch(err){
        res.status(500).send(err)
    }

});

module.exports = router;