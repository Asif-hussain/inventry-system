const express = require('express');
const router = express.Router();
const CustomerApi = require('./CustomerApi');
const passport = require('passport');
const appRoot = require('app-root-path');
require(appRoot + '/src/Auth/CustomerPassport')(passport);
require(appRoot + '/src/Auth/FacebookPassport')(passport);
require(appRoot + '/src/Auth/InstagramPassport')(passport);

/*
 * GET
 */
router.get(
  '/',
  // passport.authenticate('customer-rule', { session: false }),
  CustomerApi.list
);

/*
 * GET By id
 */
router.get('/:id', CustomerApi.show);

/*
 * POST
 */
router.post('/', CustomerApi.create);

/*
 * POST
 */
router.post('/signup', CustomerApi.signup);

/*
 * GET Auth/Facebook
 */

router.get(
  '/auth/facebook',
  passport.authenticate('facebook', { session: false })
);

/*
 * GET Auth/Facebook/Callback
 */

router.get(
  '/auth/facebook/callback',
  passport.authenticate('facebook', { session: false }),
  CustomerApi.authFacebook
);

/*
 * GET Auth/Instagram
 */

router.get(
  '/auth/instagram',
  passport.authenticate('instagram', { session: false })
);

/*
 * GET Auth/Instagram/Callback
 */

router.get(
  '/auth/instagram/callback',
  passport.authenticate('instagram', { session: false }),
  CustomerApi.authFacebook
);

/*
 * PUT
 */
router.put('/:id', CustomerApi.update);

/*
 * DELETE
 */
router.delete('/:id', CustomerApi.remove);

module.exports = router;
