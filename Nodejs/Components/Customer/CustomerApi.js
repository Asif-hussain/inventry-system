const CustomerController = require('./CustomerController');
const appRoot = require('app-root-path');
const { AppError } = require(appRoot + '/handlers');
/**
 * CustomerController.js
 *
 * @description :: Server-side logic for managing Customer.
 */
module.exports = {
  /**
   * CustomerController.list()
   */
  list: async function(req, res, next) {
    try {
      let Customers = await CustomerController.list(req.query);
      console.log(Customers);
      return res.json(Customers);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.show()
   */
  show: async function(req, res, next) {
    try {
      let id = req.params.id;
      let Customer = await CustomerController.show(id);

      if (!Customer) {
        throw new AppError(404, 'Customer not found', true);
      }

      return res.json(Customer);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.create()
   */
  create: async function(req, res, next) {
    try {
      let Customer = await CustomerController.create(req.body);

      return res.status(201).json(Customer);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.signup()
   */
  signup: async function(req, res, next) {
    try {
      let Customer = await CustomerController.signup(req.body);

      return res.status(201).json(Customer);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.signup()
   */
  authFacebook: async function(req, res, next) {
    try {
      let Customer = await CustomerController.authFacebook(req.user);

      return res.status(201).json(Customer);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.update()
   */
  update: async function(req, res, next) {
    try {
      let id = req.params.id;
      let Customer = await CustomerController.update(id, req.body);

      return res.json(Customer);
    } catch (e) {
      next(e);
    }
  },

  /**
   * CustomerController.remove()
   */
  remove: async function(req, res, next) {
    try {
      let id = req.params.id;
      await CustomerController.remove(id);

      return res.status(204).json();
    } catch (e) {
      next(e);
    }
  }
};
