const initialState = {
  pending: true,
  logged: false
}

const UserReducer = (state = initialState, action) => {

  if (action.type === 'GET_LOGGED_USER') {
    return Object.assign({}, state, {
      pending: false, 
    })
  }

  if (action.type === 'SET_LOGGED_USER') {
    return Object.assign({}, state, {
      pending: false,
      token: action.token,
      logged: action.logged
    })
  }

  return state
}

export default UserReducer
