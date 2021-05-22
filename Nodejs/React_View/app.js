import React from 'react'
import ReactDOM from 'react-dom'
import {Provider} from 'react-redux'
import {BrowserRouter, Switch, Route, Redirect} from 'react-router-dom'
import AppRoute from './AppRoute'
import store from './helpers/store'
import 'bootstrap/dist/js/bootstrap.js';
import {ToastContainer, Slide} from 'react-toastify';
import $ from 'jquery';

// Layouts
import AuthLayout from './layouts/AuthLayout'
import PrimaryLayout from './layouts/PrimaryLayout'

// Pages
import HomePage from './pages/HomePage'

// Component
const App = props => (

    <Provider store={store}>    
        <ToastContainer position="top-right"
                        transition={Slide}
                        autoClose={1500}
                        hideProgressBar
                        newestOnTop={false}
                        closeOnClick
                        rtl={false}
                        pauseOnFocusLoss
                        draggable
                        pauseOnHover/>
        <BrowserRouter>
            <Switch>
                <Route path="/" exact component={HomePage}/>
                <Route path="/auth" component={AuthLayout}/>
                <AppRoute path="/app" component={PrimaryLayout}/>
                <Redirect to="/"/>
            </Switch>
        </BrowserRouter>
    </Provider>
)

if (document.getElementById('root')) {
    let item = document.getElementById('root');

    item.classList.remove('hourglass');
    item.classList.add('vh-100');
    $('#loader-styles').remove();

    ReactDOM.render(<App/>, item)
}
export default App;
