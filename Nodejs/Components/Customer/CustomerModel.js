const mongoose = require('mongoose');
const config = require('config');
const Schema = mongoose.Schema;

const CustomerSchema = new Schema(
  {
    name: {
      type: String,
      required: [true, 'name is required'],
      trim: true
    },
    dob: {
      type: Date,
      // required: [true, 'DOB is required'],
      trim: true
    },
    email: {
      type: String,
      required: [true, 'Email is required'],
      unique: true,
      trim: true
    },
    isEmailVerified: {
      type: Boolean,
      default: false
    },
    phone: {
      type: String,
      // required: [true, 'Phone is required'],
      trim: true
    },
    password: {
      type: String,
      // required: [true, 'Password is required'],
      trim: true,
      select: false
    },
    isPhoneVerified: {
      type: Boolean,
      default: false
    },
    ikentoo: {
      type: String,
      trim: true
    },
    resdiary: {
      type: String,
      trim: true
    },
    magiclink: {
      type: String,
      trim: true
    },
    magiclinkExpiry: {
      type: Date,
      trim: true
    },
    verificationCode: {
      type: String,
      trim: true
    },
    verificationCodeExpiry: {
      type: Date,
      trim: true
    },
    isMarketable: {
      type: Boolean,
      default: false
    },
    timezone: {
      type: String,
      trim: true
    },
    image_url: {
      type: String,
      trim: true
    },
    image_url_1: {
      type: String,
      trim: true
    },
    facebook: {
      id: {
        type: String,
        trim: true
      },
      fbToken: {
        type: String,
        trim: true
      }
    },
    role: {
      type: String,
      default: 'customer'
    },
    status: {
      type: String,
      default: config.default.generic_status.new,
      enum: Object.values(config.default.generic_status)
    },
    one_signal: {
      player_id: {
        type: String,
        trim: true
      }
    }
  },
  {
    timestamps: true
  }
);

module.exports = mongoose.model('Customer', CustomerSchema);
