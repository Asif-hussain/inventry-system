import React from 'react'
import { Switch, Route, Redirect } from 'react-router-dom'

// Pages
import LoginPage from '../pages/auth/LoginPage'

const AuthLayout = () => (
  <div>
    <Switch>
      <Route path="/auth/login" component={LoginPage} />
      <Redirect to="/auth/login" />
    </Switch>
  </div>
)

export default AuthLayout
