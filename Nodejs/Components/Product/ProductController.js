/* eslint-disable security/detect-non-literal-regexp */
const ProductModel = require('./ProductModel');
const appRoot = require('app-root-path');
const config = require('config');
const mongoose = require('mongoose');
const MenuModel = require('../Menu/MenuModel');
const { AppError } = require(appRoot + '/handlers');
class ProductController {
  constructor() {}

  static async list(filter = null) {
    if (filter) {
      let page = parseInt(filter._page) - 1 || 0;
      let limit = parseInt(filter._limit) || 10;

      let criteria = {};

      if (filter.query_like) {
        criteria.$or = [
          { name: new RegExp(filter.query_like, 'i') },
          { displayName: new RegExp(filter.query_like, 'i') }
        ];
      }

      if (filter.name_like) {
        criteria.name = new RegExp(filter.name_like, 'i');
      }

      if (filter.displayName_like) {
        criteria.displayName = new RegExp(filter.displayName_like, 'i');
      }
      if (filter.venue) {
        criteria['venue.obj'] = mongoose.Types.ObjectId(filter.venue);
      } else if (filter.venues) {
        criteria['venue.obj'] = {
          $in: filter.venues.map(venue => mongoose.Types.ObjectId(venue))
        };
      }

      if (filter.location) {
        criteria['locations.obj'] = mongoose.Types.ObjectId(filter.location);
      } else if (filter.venueLocations) {
        let locations = Array.isArray(filter.venueLocations)
          ? filter.venueLocations
          : filter.venueLocations.split(',');
        criteria['locations.obj'] = {
          $in: locations.map(venueLoc => mongoose.Types.ObjectId(venueLoc))
        };
      }

      criteria.status = { $ne: config.default.generic_status.archived };

      let menuCriteria = {};
      if (filter.location) {
        menuCriteria['location.obj'] = {
          $in: [mongoose.Types.ObjectId(filter.location)]
        };
      } else if (filter.venueLocations) {
        let locations = Array.isArray(filter.venueLocations)
          ? filter.venueLocations
          : filter.venueLocations.split(',');
        menuCriteria['location.obj'] = {
          $in: locations.map(venueLoc => mongoose.Types.ObjectId(venueLoc))
        };
      }
      menuCriteria['status'] = config.default.generic_status.active;
      console.log(menuCriteria);
      let menus = await MenuModel.find(menuCriteria);

      criteria['menus.obj'] = {
        $in: menus.map(menu => mongoose.Types.ObjectId(menu._id))
      };
      console.log(criteria);
      let products = await ProductModel.find(criteria)
        .populate({
          path: 'modifiers.obj menus.obj',
          populate: { path: 'options.product', select: 'name' }
        })
        .skip(page * limit)
        .limit(limit);
      let total = await ProductModel.countDocuments(criteria);

      return { data: products, total: total };
    } else {
      let products = await ProductModel.find();

      return { data: products, total: products.length };
    }
  }

  static async show(id, filter = {}) {
    let criteria = { _id: id };
    if (filter.venues) {
      criteria['venue.obj'] = {
        $in: filter.venues.map(venue => mongoose.Types.ObjectId(venue))
      };
    }
    if (filter.venueLocations) {
      let locations = Array.isArray(filter.venueLocations)
        ? filter.venueLocations
        : filter.venueLocations.split(',');
      criteria['locations.obj'] = {
        $in: locations.map(venueLoc => mongoose.Types.ObjectId(venueLoc))
      };
    }
    console.log(filter, criteria);
    return await ProductModel.findOne(criteria).populate({
      path: 'venue.obj'
    });
  }

  static async create(ProductData) {
    let Product = new ProductModel(ProductData);
    try {
      await Product.validate();
      await Product.save();
    } catch (e) {
      throw new AppError(400, 'Product could not be saved', true, e);
    }

    return Product;
  }

  static async update(id, ProductData) {
    let Product = await ProductModel.findByIdAndUpdate(id, ProductData, {
      new: true
    }).populate({
      path: 'modifiers.obj',
      populate: { path: 'options.product', select: 'name' }
    });

    if (!Product) throw new AppError(404, 'Product not found', true);

    return Product;
  }

  static async remove(id) {
    await ProductModel.findOneAndDelete({ _id: id });
    return true;
  }

  static async reorder(map, category) {
    for (var i in map) {
      let product = await ProductModel.findById(mongoose.Types.ObjectId(i));
      // eslint-disable-next-line security/detect-object-injection
      let order = map[i];
      let cat = product.categories.find(cat => {
        return cat.obj
          ? cat.obj.toString().localeCompare(category) === 0
          : false;
      });
      if (cat) {
        cat.order = order;
        await product.save();
      }
    }
    return true;
  }
}

module.exports = ProductController;
