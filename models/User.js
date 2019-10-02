const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const UserSchema = new Schema({
    number: {
        type: String,
        required: true
    },
    pin_code : {
        type: String,
    },
    is_verified : {
        type: String,
        default: '0'
    }
});


const User = mongoose.model('users', UserSchema);


module.exports = {User}