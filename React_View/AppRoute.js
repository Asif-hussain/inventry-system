import React from 'react'
import { Route, Redirect } from 'react-router-dom'
import { connect } from 'react-redux'
import { getLoggedUser } from './helpers/xhr'
import { isValidToken } from './client/request' 
import ls from 'local-storage';

class AppRoute extends React.Component {

  UNSAFE_componentWillMount() {
    getLoggedUser()
  }

  render() {
    const { component: Component, pending, logged, ...rest } = this.props
    // console.log(this.props.location.pathname);

    return (
      <Route {...rest} render={props => {
        if (pending) return <div>Loading...</div>
        return isValidToken(ls("token"))
          ? <Component {...props} />
          : <Redirect to="/auth/login" />
      }} />
    )
  }
}

const stateToProps = ({ loggedUserState }) => ({
  pending: loggedUserState.pending,
  logged: loggedUserState.logged
})

export default connect(stateToProps)(AppRoute)
