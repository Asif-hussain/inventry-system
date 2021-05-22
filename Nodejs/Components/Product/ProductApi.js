const ProductController = require('./ProductController');
const appRoot = require('app-root-path');
const { AppError } = require(appRoot + '/handlers');
/**
 * ProductController.js
 *
 * @description :: Server-side logic for managing Product.
 */
module.exports = {
  /**
   * ProductController.list()
   */
  list: async function(req, res, next) {
    try {
      let filter = {...req.query};
      if (req.user.role !== 'superadmin') {
        filter.venues = req.user.venues;
        filter.venueLocations = req.user.venueLocations;
      }
      
      let Product = await ProductController.list(filter);

      return res.json(Product);
    } catch (e) {
      next(e);
    }
  },

  /**
   * ProductController.show()
   */
  show: async function(req, res, next) {
    try {
      let id = req.params.id;
      let filter = {};
      if (req.user.role !== 'superadmin') {
        filter.venues = req.user.venues;
        filter.venueLocations = req.user.venueLocations;
      }
      let Product = await ProductController.show(id, filter);

      if (!Product) {
        throw new AppError(404, 'Product not found', true);
      }

      return res.json(Product);
    } catch (e) {
      next(e);
    }
  },

  /**
   * ProductController.create()
   */
  create: async function(req, res, next) {
    try {
      let Product = await ProductController.create(req.body);

      return res.status(201).json(Product);
    } catch (e) {
      next(e);
    }
  },

  /**
   * ProductController.update()
   */
  update: async function(req, res, next) {
    try {
      let id = req.params.id;
      let Product = await ProductController.update(id, req.body);

      return res.json(Product);
    } catch (e) {
      next(e);
    }
  },

  /**
   * ProductController.reorder()
   */
  reorder: async function(req, res, next) {
    try {
      await ProductController.reorder(req.body.order, req.body.category);
      return res.status(204).json();
    } catch (e) {
      next(e);
    }
  },

  /**
   * ProductController.remove()
   */
  remove: async function(req, res, next) {
    try {
      let id = req.params.id;
      await ProductController.remove(id);

      return res.status(204).json();
    } catch (e) {
      next(e);
    }
  }
};
