import store from '../helpers/store'
import {sendPostRequest} from '../client/request'
import ls from 'local-storage';

export const getLoggedUser = () => {
  setTimeout(() => {
    store.dispatch({
      type: 'GET_LOGGED_USER'
    })
  }, 10)
}

export const login = async (username, password) => {

   
  let result = sendPostRequest("/auth/login", {'Content-Type': 'application/json'}, {"email": username, "password": password});  
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if(result.access_token){
        store.dispatch({
          type: 'SET_LOGGED_USER',
          logged: true,
          token: result.access_token
        })
        ls("token",result.access_token);
        ls("token_timestamp",new Date().getTime());
        resolve()
      }
      else{
        reject(result.message)
      }  
    }, 10)
  }); 
  
}

export const logout = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      store.dispatch({
        type: 'SET_LOGGED_USER',
        logged: false,
        token: null
      })
      ls.remove("token");
      ls.remove("mcid");
      resolve()
    }, 10)
  })
}
