const CustomerModel = require('./CustomerModel');
const AuthController = require('../../Auth/AuthController');
const config = require('config');
const appRoot = require('app-root-path');
const { AppError } = require(appRoot + '/handlers');
class CustomerController {
  constructor() {}

  static async list(config = null) {
    if (config) {
      let page = parseInt(config._page) - 1 || 0;
      let limit = parseInt(config._limit) || 10;

      let criteria = {};

      if (config.name_like) {
        criteria.name = new RegExp(config.name_like, 'i');
      }
      if (config.displayName_like) {
        criteria.displayName = new RegExp(config.displayName_like, 'i');
      }

      let customers = await CustomerModel.find(criteria)
        .skip(page * limit)
        .limit(limit);
      let count = await CustomerModel.estimatedDocumentCount(criteria);
      return { data: customers, total: count};
    } else {
      let customers = await CustomerModel.find();
      return { data: customers, total: customers.length };
    }
  }

  static async show(id) {
    return await CustomerModel.findOne({ _id: id });
  }

  static async create(CustomerData) {
    let Customer = new CustomerModel(CustomerData);

    await Customer.validate();
    await Customer.save();
    Customer.password = undefined;

    return Customer;
  }

  static async signup(CustomerData) {
    let email = CustomerData.email;
    let Customer = await CustomerModel.findOne({ email });

    if (!Customer) {
      Customer = new CustomerModel(CustomerData);
      await Customer.validate();
      await Customer.save();
    }

    return AuthController.genCustomerAccessToken(Customer);
  }

  static async authFacebook(CustomerData) {

    let email = CustomerData.email;
    let Customer = await CustomerModel.findOne({ email });
    if (!Customer) {
      Customer = new CustomerModel(CustomerData);
      await Customer.validate();
      await Customer.save();
    }

    return AuthController.genCustomerAccessToken(Customer);
  }

  static async update(id, CustomerData) {
    let Customer = await CustomerModel.findByIdAndUpdate(id, CustomerData, {
      new: true
    });

    if (!Customer) throw new AppError(404, 'Customer not found', true);

    return Customer;
  }

  static async remove(id) {
    await CustomerModel.findOneAndDelete({ _id: id });
    return true;
  }
}

module.exports = CustomerController;
