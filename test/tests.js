var chai = require('chai');
var expect = chai.expect;
var chaiHttp = require('chai-http');

chai.use(chaiHttp);
var request = require('request');
var server = require('../app');

const assert = require('assert');

const {User} = require('../models/User');

describe('#StoreUser api/users/saveNumber GET', function() {
    this.timeout(500);
    before((done)=>{

            SaveUserData=async()=>{
            var newUser= new User({
                number:'+12345678',
                pin_code:'1234',
            })
            newUser.save()
            done()
        }
        SaveUserData()
    })

    it('should check if user profile was successfully stored',(done)=>{
        GetUserData=async()=>{
            let userData=await User.findOne({number:'+12345678'})
            expect(userData.pin_code).to.equal('1234')
            expect(userData.is_verified).to.equal('0')
            done()
        }
        GetUserData()
    })

    it('should check if user record have pin code of 4 digits',(done)=>{
        GetUserData=async()=>{
            let userData=await User.findOne({number:'+12345678'})
            expect(userData.pin_code.length).to.equal(4)
            done()
        }
        GetUserData()
    })

    it('should check if user record have is verified on length 1',(done)=>{
        GetUserData=async()=>{
            let userData=await User.findOne({number:'+12345678'})
            expect(userData.is_verified.length).to.equal(1)
            done()
        }
        GetUserData()
    })

    after((done)=>{
        UpdateData=async()=>{

            let result1=await User.deleteOne({number:'+12345678'})
            done()
        }
        UpdateData()
    })
});


describe('#Check array length', function() {
    it('it will check the user is inserted into db.', function() {
        assert.equal(-1, [1, 2, 3].indexOf(4));
    });
});


describe('#match input', function() {
    it('Check number should be only of length of 4', function() {
        assert.equal('shld'.length, 4);
    });
});

