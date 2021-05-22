import React from 'react'
import {Switch, Route, Redirect} from 'react-router-dom'
import PrimaryHeader from '../ui/PrimaryHeader'
import AppDashboard from '../pages/Dashboard'

// Sub Layouts
import InsightLayout from './InsightLayout';

const PrimaryLayout = ({match}) => (
  <>
    <div className="d-flex" id="wrapper">
      <PrimaryHeader/>

      <Switch>
        <Route path={`${match.path}`} exact component={AppDashboard}/>
        <Route path={`${match.path}/insight`} component={InsightLayout}/>
        <Redirect to={`${match.path}`}/>
      </Switch>
    </div>
  </>
)

export default PrimaryLayout
