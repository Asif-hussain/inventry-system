import { createStore, combineReducers } from 'redux'
import UserReducer from './reducer'

const reducers = combineReducers({
  loggedUserState: UserReducer
})

const store = createStore(reducers)

export default store
