@extends('layouts.dashboardApp')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="dashboard">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 col-pad">
          <div class="dashboard-nav d-none d-xl-block d-lg-block">
            <div class="dashboard-inner">
              <h4>Main</h4>
              <ul>
                <li><a href="currentVentures.html"><i class="fa fa-users"></i>Ventures</a></li>
                <li class="active"><a href="dashboard.html"><i class="fa fa-dashboard"></i>Dashboard </a></li>
                <li><a href="portfolio.html"><i class="fa fa-image"></i>Portfolio</a></li>
                <li><a href="documents.html"><i class="fa fa-file"></i>Documents</a></li>
                <li><a href="contact.html"><i class="fa fa-envelope"></i>Contact</a></li>
                <li><a href="refer-friend.html"><i class="fa fa-address-book "></i>Refer A Friend</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-pad">
          <div class="content-area5">
            <div class="dashboard-content">
              <div class="dashboard-header clearfix">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <h4>Dashboard Account Summary</h4>
                  </div>
                </div>
              </div>
              
              
              <div class="row">
                
                <div class="col-lg-12">
                  <div class="dashboard-list">
                    <div class="dashboard-message bdr clearfix ">
                      <div class="tab-box-2">
                        <div class="clearfix mb-30 comments-tr"> <span>Account Summary Detail</span></div>
                        <table class="table table-bordered">
                          <thead class="bg-active">
                              <tr>
                                <td>Venture</td>
                                <td class="text-center">% of Portfolio</td>
                                <td class="text-center">% of Ownership</td>
                                <td class="text-center">Original Investment</td>
                                <td class="text-center">Current Estimated Value</td>
                                <td class="text-center">Most Resent Month Income</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><strong>LLC1</strong></td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">2</td>
                                <td class="text-center">$30.99</td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">$30.99</td>
                              </tr>
                              <tr>
                                <td><strong>LLC2</strong></td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">3</td>
                                <td class="text-center">$60.00</td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">$30.99</td>
                              </tr>
                              <tr>
                                <td><strong>LLC3</strong></td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">1</td>
                                <td class="text-center">$90.00</td>
                                <td class="text-center">6.13%</td>
                                <td class="text-center">$30.99</td>
                              </tr>
                            </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
                  
                  
                  <div class="col-sm-4">
                <div class="dashboard-list">
                  <div class="dashboard-message bdr clearfix ">
                    <div class="card-header">
                      <h5>Monthly Rental Income</h5>
                    </div>
                    <div id="line-area3" class="lineAreaDashboard" style="height:330px;"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="dashboard-list">
                  <div class="dashboard-message bdr clearfix ">
                    <div class="card-header">
                      <h5>Statistics</h5>
                    </div>
                    <div id="chart-percent" class="chart-percent" style="height:245px;"></div>
                    <div class="row mb-3">
                      <div class="col"> <span class="mb-1 text-muted d-block">23%</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar progress-c-green" role="progressbar"
                                                           style="width: 23%;" aria-valuenow="23" aria-valuemin="0"
                                                           aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col"> <span class="mb-1 text-muted d-block">14%</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar progress-c-yellow" role="progressbar"
                                                           style="width: 14%;" aria-valuenow="14" aria-valuemin="0"
                                                           aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col"> <span class="mb-1 text-muted d-block">35%</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar progress-c-purple" role="progressbar"
                                                           style="width: 35%;" aria-valuenow="35" aria-valuemin="0"
                                                           aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col"> <span class="mb-1 text-muted d-block">28%</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar progress-c-blue" role="progressbar"
                                                           style="width: 28%;" aria-valuenow="28" aria-valuemin="0"
                                                           aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="dashboard-list">
                  <div class="dashboard-message bdr clearfix ">
                    <div class="card-header">
                      <h5>Estimated Property Valuation</h5>
                    </div>
                    <div id="line-area2" class="lineAreaDashboard" style="height:330px;"></div>
                  </div>
                </div>
              </div>
           
                
                
              </div>
            </div>
            <div class="dashboard-message bdr clearfix ">
                <p class="footer-text text-center"> <a href="faqs.html">FAQS</a> <a href="company.html">Company</a> <a href="terms.html">Terms</a> <a href="privacy-policy.html">Privacy Policy</a> <a href="contact.html">Contact</a> <br>
                  © 2019 Liquid Equity Inc. All Rights Reserved.</p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
