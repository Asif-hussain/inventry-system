const config = require('config');
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const ProductSchema = new Schema(
  {
    name: String,
    displayName: String,
    price: Number,
    prices: [
      {
        type: {
          type: String,
          trim: true,
          default: config.default.menu_types.collection,
          enum: Object.values(config.default.menu_types)
        },
        value: {
          type: Number,
          default: 0
        },
        currency: {
          type: String,
          default: 'GBP'
        }
      }
    ],
    taxes: [
      {
        type: {
          type: String,
          trim: true,
          default: config.default.menu_types.collection,
          enum: Object.values(config.default.menu_types)
        },
        value: {
          type: Number,
          default: 0
        }
      }
    ],
    prepTime: Number,
    thumbUrl: String,
    imageUrl: String,
    desc: String,
    calories: Number,
    allergens: Array,
    dietaries: Array,
    tags: Array,
    ikentoo: String,
    ikentooType: String,
    ikentooMeta: {
      defaultTaxPercentage: Number,
      taxIncludedInPrice: Boolean,
      customItemNameEnabled: Boolean
    },
    sku: String,
    course: Number,
    modifiers: [
      {
        obj: {
          type: mongoose.Schema.ObjectId,
          ref: 'Modifier'
        },
        status: {
          type: String,
          default: config.default.generic_status.active,
          enum: Object.values(config.default.generic_status)
        },
        order: {
          type: Number,
          default: 0
        }
      }
    ],
    categories: [
      {
        obj: {
          type: mongoose.Schema.ObjectId,
          ref: 'Category'
        },
        status: {
          type: String,
          default: config.default.generic_status.active,
          enum: Object.values(config.default.generic_status)
        },
        order: {
          type: Number,
          default: 0
        }
      }
    ],
    menus: [
      {
        obj: {
          type: mongoose.Schema.ObjectId,
          required: [true, 'venue is required'],
          ref: 'Menu'
        },
        status: {
          type: String,
          default: config.default.generic_status.active,
          enum: Object.values(config.default.generic_status)
        }
      }
    ],
    venue: {
      obj: {
        type: mongoose.Schema.ObjectId,
        required: [true, 'venue is required'],
        ref: 'Venue'
      },
      status: {
        type: String,
        default: config.default.generic_status.active,
        enum: Object.values(config.default.generic_status)
      }
    },
    locations: [
      {
        obj: {
          type: mongoose.Schema.ObjectId,
          ref: 'VenueLocation'
        },
        status: {
          type: String,
          default: config.default.generic_status.active,
          enum: Object.values(config.default.generic_status)
        }
      }
    ],
    type: {
      type: String,
      default: config.default.product_types.product,
      enum: Object.values(config.default.product_types)
    },
    status: {
      type: String,
      default: config.default.generic_status.active,
      enum: Object.values(config.default.generic_status)
    }
  },
  {
    timestamps: true,
    toObject: { virtuals: true },
    toJSON: { virtuals: true }
  }
);

ProductSchema.virtual('options', {
  ref: 'Modifier',
  localField: '_id',
  foreignField: 'options.product',
  justOne: false
});
module.exports = mongoose.model('Product', ProductSchema);
