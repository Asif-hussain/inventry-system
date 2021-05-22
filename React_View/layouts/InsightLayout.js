import React, {useEffect, useState} from 'react' 
import {Switch, Route} from 'react-router-dom'
import InsightNav from '../ui/InsightNav'
import ls from 'local-storage';
// Sub Layouts
import InsightMain from '../pages/insight/Main'
import InsightSearch from '../pages/insight/Search' 
import InsightAbout from '../pages/insight/About' 

const InsightLayout = ({history, location, match}) => {
  const [title, setTitle] = useState('');
  const [isWelcomePage, setIsWelcomePage] = useState(false);
  const [isUniqueForm, setIsUniqueForm] = useState(true);
   
  useEffect(() => {
    let subTitle = '';
    setIsWelcomePage(false);

    if (location.state && location.state.insightType) {
      subTitle = location.state.insightType;
    }
    else {
      subTitle = ls("type");
    }

    switch (location.pathname) {
      case `${match.path}/search`:
        setIsWelcomePage(false);
        setTitle(`${subTitle} Insights Search Results`);
        break;
      case `${match.path}/about`:
        setIsWelcomePage(false);
        setTitle(`About ${subTitle} Insights`);
        break;   
      default:
        setIsWelcomePage(true);
        setTitle('Insights Search');
    }
  }, [location.pathname, location.state, match.path]);
  
  const uniqueForm = () => {
    setIsUniqueForm(true);
  };

  const commonForm = () => {
    setIsUniqueForm(false);
  };

  
  return (
    <div id="page-content-wrapper">
      <div className="container-fluid">
        <div className="row bg-white">
          <div className="col-md-12">

            {isWelcomePage ? (
              <div className="mt-1 text-center">
                <button className="btn text-gray" onClick={() => uniqueForm(true)}>Unique name, no DOB</button>
                <button className="btn text-gray ml-5" onClick={() => commonForm(false)}>Common name, with DOB</button>
              </div>
            ) : (
              <div className="mt-5">
              </div>
            )}


          </div>
          <div className="col-md-12">
            <div>
              <h1 id="header-title" className="ml-5 float-left">{title}</h1>
            </div>
            <div className="mt-1 float-right mr-5">
              <button className="btn logout-btn " onClick={() => history.push('/auth/login')} >Logout</button>
            </div>
          </div>
        </div>

        <InsightNav/>

        <Switch>
          {/* <Redirect strict from={location.pathname + '/'} to={location.pathname.slice(0, -1)} /> */}
          <Route path={match.path} exact component={(props) => <InsightMain {...props} isUniqueForm={isUniqueForm} />}/>
          {/*<Route path={match.path} exact component={InsightMain}/> */}
          <Route path={`${match.path}/search`} exact component={InsightSearch}/> 
          <Route path={`${match.path}/about`} component={InsightAbout}/>
        </Switch>
        
      </div>
    </div>
  );
};

export default InsightLayout
