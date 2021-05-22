const express = require('express');
const router = express.Router();
const ProductApi = require('./ProductApi');
const passport = require('passport');
const appRoot = require('app-root-path');
//eslint-disable-next-line security/detect-non-literal-require
require(appRoot + '/src/Auth/StaffPassport')(passport);
const acl = require('express-acl');
/*
 * GET
 */
router.get(
  '/',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.list
);

/*
 * GET By id
 */
router.get(
  '/:id',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.show
);

/*
 * POST
 */
router.post(
  '/',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.create
);

/*
 * POST
 */
router.post(
  '/reorder',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.reorder
);

/*
 * PUT
 */
router.put(
  '/:id',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.update
);

/*
 * DELETE
 */
router.delete(
  '/:id',
  passport.authenticate('staff-rule', { session: false }),
  acl.authorize,
  ProductApi.remove
);

module.exports = router;
