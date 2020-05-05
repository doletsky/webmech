<?
//define('NEED_FILTER', true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//$APPLICATION->SetTitle("Индигос.ru — магазин образовательного контента");
?>
    “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?”
<?if(0):?>
        <main class="p-4 flex-fill">
            <div class="row mb-3">
                <div class="col-xl col-sm-6 pb-3">
                    <div class="card d-block p-0 h-100 shadow-sm wow zoomIn">
                        <div class="row h-100 no-gutters bg-white rounded flex-nowrap">
                            <div class="col-auto bg-success rounded-left">&#xA0;</div>
                            <div class="col p-3 py-4 text-success">
                                <h6 class="text-truncate text-uppercase">Calls</h6>
                                <h3 class="text-nowrap">210</h3>
                            </div>
                            <div class="col-auto d-flex text-success">
                                <h1 class="mb-0 mx-auto align-self-center">
                                    <a href="/" class="nav-link text-success pb-0" title="View details"><span class="d-inline-block lnr lnr-phone"></span></a>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-sm-6 pb-3">
                    <div class="card d-block p-0 h-100 shadow-sm wow zoomIn">
                        <div class="row h-100 no-gutters bg-white rounded flex-nowrap">
                            <div class="col-auto bg-danger rounded-left">&#xA0;</div>
                            <div class="col p-3 py-4 text-danger">
                                <h6 class="text-truncate text-uppercase">Sales</h6>
                                <h3>53</h3>
                            </div>
                            <div class="col-auto d-flex rounded-right">
                                <h1 class="mb-0 mx-auto align-self-center"><a href="/" class="nav-link text-danger pb-0" title="View details">
                                        <span class="d-inline-block lnr lnr-cart"></span></a>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-sm-6 pb-3">
                    <div class="card d-block h-100 shadow-sm wow zoomIn">
                        <div class="row h-100 no-gutters bg-white rounded flex-nowrap">
                            <div class="col-auto bg-primary rounded-left">&#xA0;</div>
                            <div class="col p-3 py-4 text-primary">
                                <h6 class="text-truncate text-uppercase">Growth</h6>
                                <h3 class="text-nowrap">19%</h3>
                            </div>
                            <div class="col-auto d-flex rounded-right">
                                <h1 class="mb-0 mx-auto align-self-center">
                                    <a href="/" class="nav-link pb-0 text-primary" title="View details">
                                        <span class="d-inline-block lnr lnr-rocket"></span>
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-sm-6 pb-3">
                    <div class="card d-block p-0 h-100 shadow-sm wow zoomIn">
                        <div class="row h-100 no-gutters bg-white rounded flex-nowrap">
                            <div class="col-auto bg-info rounded-left">&#xA0;</div>
                            <div class="col p-3 py-4 text-info">
                                <h6 class="text-truncate text-uppercase">Alerts</h6>
                                <h3>2</h3>
                            </div>
                            <div class="col-auto d-flex rounded-right">
                                <h1 class="mb-0 mx-auto align-self-center">
                                    <a href="/" class="nav-link text-info pb-0" title="View details"><i class="lnr lnr-alarm"></i></a>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 pb-3 wow zoomIn">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-xl-3 p-2 d-flex flex-column">
                            <h4 class="font-weight-light mb-3">Revenue</h4>
                            <div class="my-auto p-1 py-2">
                                <canvas class="mw-100 my-2" id="chLine"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pb-3 wow zoomIn">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-xl-3 p-2 d-flex flex-column">
                            <h4 class="font-weight-light mb-3">Products</h4>
                            <div class="my-auto p-1 py-2">
                                <canvas class="my-2" id="chBar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="card shadow-sm rounded-lg h-100">
                        <div class="card-header bg-transparent border-bottom-0">
                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <h4 class="font-weight-light mb-0">Projects</h4></div>
                                <div class="col-sm-auto ml-auto">
                                    <button data-target="#sliderContent" data-slide="prev" class="btn btn-outline-primary btn-sm ml-2"><span aria-hidden="true" class="fa fa-chevron-left align-middle icons icon-arrow-left"></span><span class="sr-only">Previous</span></button>
                                    <button data-target="#sliderContent" data-slide="next" class="btn btn-outline-primary btn-sm ml-2"><span aria-hidden="true" class="fa fa-chevron-right align-middle icons icon-arrow-right"></span><span class="sr-only">Next</span></button>
                                </div>
                            </div>
                        </div>
                        <div id="sliderContent" data-ride="carousel" data-interval="5000" class="carousel slide my-auto w-100">
                            <div role="listbox" class="carousel-inner rounded-lg">
                                <div class="carousel-item active">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-12">
                                                <div class="card-body text-left text-truncate py-4">
                                                    <h3 class="mb-0"><span class="display-4 font-weight-light float-right icon-calendar"></span>
                                                        Brayton Point
                                                    </h3>
                                                    <div class="text-left text-truncate py-4">The cooling towers will be imploded on April 27th. The surrounding area will be closed to both public and maritime navigation.</div><a href="./" class="btn btn-primary">Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-12">
                                                <div class="card-body text-left text-truncate py-4">
                                                    <h3 class="mb-0"><span class="display-4 font-weight-light float-right icon-doc"></span>
                                                        Upwork Redesign
                                                    </h3>
                                                    <div class="text-left text-truncate py-4">Adding a special incentive for writing content and some details</div><a href="./" class="btn btn-primary">Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="card shadow-sm rounded-lg h-100">
                        <div class="card-header bg-transparent border-bottom-0">
                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <h4 class="font-weight-light mb-0">Profiles</h4></div>
                                <div class="col-sm-auto ml-auto">
                                    <button data-target="#sliderProfiles" data-slide="prev" class="btn btn-outline-primary btn-sm ml-2"><span aria-hidden="true" class="fa fa-chevron-left align-middle icons icon-arrow-left"></span><span class="sr-only">Previous</span></button>
                                    <button data-target="#sliderProfiles" data-slide="next" class="btn btn-outline-primary btn-sm ml-2"><span aria-hidden="true" class="fa fa-chevron-right align-middle icons icon-arrow-right"></span><span class="sr-only">Next</span></button>
                                </div>
                            </div>
                        </div>
                        <div id="sliderProfiles" data-ride="carousel" data-interval="5000" class="carousel slide my-auto w-100">
                            <div role="listbox" class="carousel-inner rounded-lg">
                                <div class="carousel-item active">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_1.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">Sally</h3><span class="text-muted font-weight-normal">@sallyMae</span>
                                                    <p class="mt-1 text-truncate">Developer, s/w engineer</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">13</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">11</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">3</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_4.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">ShimR</h3><span class="text-muted font-weight-normal">@shimeRod</span>
                                                    <p class="mt-1 text-truncate">Lead designer @Codeply</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">52</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">90</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">88</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_3.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">Moopy</h3><span class="text-muted font-weight-normal">@mooCow</span>
                                                    <p class="mt-1 text-truncate">Product evangelist</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">73</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">89</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">29</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_1.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">Amy</h3><span class="text-muted font-weight-normal">@philipsa</span>
                                                    <p class="mt-1 text-truncate">Web / UI Developer</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">73</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">89</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">29</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_3.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">DevinW</h3><span class="text-muted font-weight-normal">@devinw</span>
                                                    <p class="mt-1 text-truncate">Network Admininstrator</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">73</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">89</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">36</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_4.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">EndlessSumner</h3><span class="text-muted font-weight-normal">@mooCow</span>
                                                    <p class="mt-1 text-truncate">Quarterback</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">110</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">80</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">33</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card rounded-lg border-0">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="w-100 p-3"><img src="assets/profile_2.png" alt="profile pic" class="rounded-circle img-fluid mx-auto d-block bg-light"></div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12">
                                                <div class="card-body text-center text-truncate py-4">
                                                    <h3 class="mb-0">WiltH</h3><span class="text-muted font-weight-normal">@hinkster</span>
                                                    <p class="mt-1 text-truncate">CTO</p>
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="row">
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">53</h4><a class="d-block small text-uppercase text-truncate">likes</a></div>
                                                                <div class="col-4 border-left border-right py-1">
                                                                    <h4 class="mb-0 text-truncate">20</h4><a class="d-block small text-uppercase text-truncate">posts</a></div>
                                                                <div class="col-4 py-1">
                                                                    <h4 class="mb-0 text-truncate">59</h4><a class="d-block small text-uppercase text-truncate">friends</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="card h-100 shadow-sm wow fadeInUp" data-wow-delay=".5s">
                        <div class="card-body">
                            <div class="h4 m-0">
                                <i class="float-right lnr lnr-gift"></i>
                                Earnings
                            </div>
                            <div>up 15%</div>
                            <div class="progress my-3">
                                <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-primary w-75"></div>
                            </div> <small class="text-muted"><a href="#modalSmall" data-toggle="modal">Updated 5 mins ago</a></small></div>
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="card h-100 shadow-sm wow fadeInUp">
                        <div class="card-body">
                            <div class="h4 m-0">
                                <i class="float-right lnr lnr-sync"></i>
                                Pending
                            </div>
                            <div>Transfers in progress...</div>
                            <div class="progress my-3">
                                <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-primary w-25"></div>
                            </div> <small class="text-muted">Estimated time remaining: 3.34 hrs</small></div>
                    </div>
                </div>
            </div>
        </main>
    <?endif?>


            <?if(0):?>
                <main class="p-4 flex-fill">
                    <div class="row mt-1 mb-3">
                        <div class="col-xl-9 col-md-6 pb-3 wow fadeIn">
                            <div class="card shadow-sm h-100">
                                <div class="card-body p-xl-3 p-2 d-flex flex-column">
                                    <h4 class="font-weight-light mb-3">Visits</h4>
                                    <div class="my-auto p-1 py-2">
                                        <canvas class="mw-100 my-2" id="chLine" height="120"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 pb-3 wow fadeIn">
                            <div class="card shadow-sm h-100">
                                <div class="card-body p-xl-3 p-2 d-flex flex-column">
                                    <h4 class="font-weight-light">
                                        <div class="float-right dropdown show"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="lnr lnr-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                            </div>
                                        </div>
                                        Devices
                                    </h4>
                                    <div class="my-auto p-1">
                                        <canvas class="mx-auto p-2" id="chPie"></canvas>
                                    </div>
                                    <table class="table table-hover table-sm d-xl-table d-md-none d-sm-table mb-0 text-uppercase small">
                                        <tr>
                                            <td>Desktop</td>
                                            <td>52%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-light border">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>40%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-primary">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Tablet</td>
                                            <td>15%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-dark">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Unknown</td>
                                            <td>5%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-secondary">&#xA0;</span></h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wow fadeIn">
                        <div class="row mt-1">
                            <div class="col-xl col-sm-6 pb-3">
                                <div class="card shadow-sm d-block p-1 h-100">
                                    <div class="row h-100 no-gutters flex-nowrap">
                                        <div class="col-6 p-3 py-4">
                                            <h5 class="text-truncate">Health</h5>
                                            <h3 class="text-nowrap">99.3%</h3></div>
                                        <div class="col bg-light text-success d-flex">
                                            <h1 class="mb-0 mx-auto align-self-center"><a href="#" lass="nav-link pb-0" title="View details"><span class="d-inline-block lnr lnr-heart"></span></a></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-sm-6 pb-3">
                                <div class="card shadow-sm d-block p-1 h-100">
                                    <div class="row h-100 no-gutters flex-nowrap">
                                        <div class="col-6 p-3 py-4">
                                            <h5 class="text-truncate">Cycles</h5>
                                            <h3>53</h3></div>
                                        <div class="col bg-light text-success d-flex">
                                            <h1 class="mb-0 mx-auto align-self-center"><a href="#" class="nav-link pb-0" title="View details"><span class="d-inline-block lnr lnr-history"></span></a></h1></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-sm-6 pb-3">
                                <div class="card shadow-sm d-block p-1 h-100">
                                    <div class="row h-100 no-gutters flex-nowrap">
                                        <div class="col-6 p-3 py-4">
                                            <h5 class="text-truncate">Storage</h5>
                                            <h3 class="text-nowrap">69%</h3>
                                        </div>
                                        <div class="col bg-light text-success d-flex">
                                            <h1 class="mb-0 mx-auto align-self-center"><a href="#" class="nav-link pb-0" title="View details"><span class="d-inline-block lnr lnr-database"></span></a></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-sm-6 pb-3">
                                <div class="card shadow-sm d-block p-1 h-100">
                                    <div class="row h-100 no-gutters flex-nowrap">
                                        <div class="col-6 p-3 py-4">
                                            <h5 class="text-truncate">Signal</h5>
                                            <h3>4.1</h3></div>
                                        <div class="col bg-light text-success d-flex">
                                            <h1 class="mb-0 mx-auto align-self-center"><a href="#" class="nav-link pb-0" title="View details"><i class="lnr lnr-heart-pulse"></i></a></h1></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl py-3">
                            <div class="card shadow-sm h-100 wow fadeIn">
                                <div class="card-body">
                                    <div class="h4 m-0">
                                        <i class="float-right lnr lnr-cloud-sync"></i>
                                        Latest Build v1.1.6
                                    </div>
                                    <div>75% complete</div>
                                    <div class="progress my-3">
                                        <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-primary w-75"></div>
                                    </div>
                                    <small class="text-muted"><a href="#modalSmall" data-toggle="modal">View build log</a></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl py-3">
                            <div class="card shadow-sm h-100 wow fadeIn">
                                <div class="card-body">
                                    <div class="h4 m-0">
                                        <i class="float-right lnr lnr-database"></i>
                                        24 GB
                                    </div>
                                    <div>Backup in progress...</div>
                                    <div class="progress my-3">
                                        <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-dark w-25"></div>
                                    </div> <small class="text-muted">Contact the administrator for reports.</small></div>
                            </div>
                        </div>
                    </div>
                    <span class="anchor" id="views"></span>
                    <div class="row py-3">
                        <div class="input-group col-lg-3 col-sm-6 pb-1">
                            <input class="form-control border-right-0 border" type="search" placeholder="Filter">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary border-left-0 border" type="button">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </span>
                        </div>
                        <div class="col-lg-3 col-sm-6 pb-1">
                            <input type="text" class="form-control" placeholder="Station">
                        </div>
                        <div class="col-lg-3 col-sm-6 pb-1">
                            <input type="text" class="form-control" placeholder="Location">
                        </div>
                        <div class="col-lg-3 col-sm-6 pb-1">
                            <select class="form-control">
                                <option>Topics...</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-xl-2">
                            <!-- scrollspy vertical menu nav -->
                            <div class="sticky-top d-none d-md-block pt-3" id="sm">
                                <ul class="nav py-md-5 py-0 mt-3 flex-md-column flex-row justify-content-between border-right">
                                    <li class="nav-item"><a href="#sec1" class="nav-link active">Sources</a></li>
                                    <li class="nav-item"><a href="#sec2" class="nav-link">Sessions</a></li>
                                    <li class="nav-item">
                                        <a href="#sec3" class="nav-link">Demographics</a>
                                        <ul class="nav flex-md-column">
                                            <li class="nav-item"><a href="#sec3a" class="nav-link pl-4">Location<small><sup data-toggle="tooltip" data-placement="right" class="badge badge-danger badge-pill small font-weight-light align-middle mb-1" title="Active alerts">1</sup></small></a></li>
                                            <li class="nav-item"><a href="#sec3b" class="nav-link pl-4">Network</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="#sec4" class="nav-link">Technology</a></li>
                                    <li class="nav-item"><a href="#sec5" class="nav-link">Behavior</a></li>
                                    <li class="nav-item"><a href="#sec6" class="nav-link">Reviews</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col px-2">

                            <!-- scrollspy content-->
                            <div class="position-relative py-4">

                                <!-- section 1 -->
                                <div class="anchor py-md-3 py-2" id="sec1"></div>
                                <h6 class="my-4 pt-2 text-muted text-uppercase">Sources</h6>
                                <section class="row text-center no-gutters py-3">
                                    <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                        <canvas class="mt-3 mx-auto" id="chDonut1" width="220" height="220"></canvas>
                                    </div>
                                    <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                        <canvas class="mt-3 mx-auto" id="chDonut2" width="220" height="220"></canvas>
                                    </div>
                                    <div class="col-xl-4 col-sm-6 mx-auto wow fadeInUp">
                                        <canvas class="mt-3 mx-auto" id="chDonut3" width="220" height="220"></canvas>
                                    </div>
                                </section>

                                <hr class="border-light">

                                <!-- section 2 -->
                                <div class="anchor py-md-3 py-2" id="sec2"></div>
                                <h6 class="my-4 text-muted text-uppercase">Sessions</h6>
                                <section class="row py-3 wow slideInUp">
                                    <div class="col-xl-4 col-sm-6 pb-4">
                                        <div class="card shadow bg-primary border-0 mb-1 h-100">
                                            <div class="card-body d-block text-white">
                                                <h6 class="text-uppercase float-right mt-1"><i class="lnr lnr-rocket"></i> Activity</h6>
                                                <h1 class="display-4 m-0">96%</h1>
                                                <div>
                                                    <canvas class="mb-2 p-1 mx-auto" id="chLine1" height="130"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6 pb-4">
                                        <div class="card shadow bg-dark border-0 mb-1 h-100">
                                            <div class="card-body d-block text-white">
                                                <h6 class="text-uppercase float-right mt-1"><i class="lnr lnr-leaf"></i> Nodes</h6>
                                                <h1 class="display-4 m-0">32</h1>
                                                <div>
                                                    <canvas class="mb-2 p-1 mx-auto" id="chLine2" height="130"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-8 mx-auto pb-4">
                                        <div class="card shadow text-white bg-success border-0 mb-1 h-100">
                                            <div class="card-body d-block text-white">
                                                <h6 class="text-uppercase float-right mt-1"><i class="lnr lnr-users"></i> Users</h6>
                                                <h1 class="display-4 m-0">64</h1>
                                                <div>
                                                    <canvas class="mb-2 p-1 mx-auto" id="chLine3" height="130"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <hr class="border-light">

                                <!-- section 3 -->
                                <div class="anchor py-md-3 py-2" id="sec3"></div>
                                <h6 class="my-4 text-muted text-uppercase">Demographics</h6>
                                <section class="row py-3">
                                    <div class="col">
                                        <div class="alert alert-secondary alert-dismissable rounded-0 p-2">
                                            <a class="close font-weight-light" data-dismiss="alert">
                                                <span class="align-text-top small">&#xD7;</span>
                                            </a>
                                            Notice: Data results are cached for 30 minutes.
                                        </div>
                                        <div class="pb-3">
                                            <div class="anchor pb-5" id="sec3a"></div>
                                            <h6 class="py-2">Location</h6>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm shadow-sm mt-2">
                                                    <tbody>
                                                    <tr>
                                                        <th class="w-25">IP</th>
                                                        <th class="w-25">Location</th>
                                                        <th class="w-25">Date</th>
                                                        <th class="w-25">Visits</th>
                                                    </tr>
                                                    <tr>
                                                        <td>12.34.22.102</td>
                                                        <td>Westfield</td>
                                                        <td>08.05.18</td>
                                                        <td>2323</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12.44.22.110</td>
                                                        <td>Galway</td>
                                                        <td>08.05.18</td>
                                                        <td>5362</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12.34.22.102</td>
                                                        <td>Bern</td>
                                                        <td>08.05.18</td>
                                                        <td><a href="#" class="mx-1 float-right"><i class="icon-exclamation icons text-danger"></i></a> 153</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="anchor pb-5" id="sec3b"></div>
                                            <h6 class="py-2">Network</h6>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm mt-2">
                                                    <tbody>
                                                    <tr>
                                                        <th class="w-25">IP</th>
                                                        <th class="w-25">Hostname</th>
                                                        <th class="w-25">Source</th>
                                                        <th class="w-25">Visits</th>
                                                    </tr>
                                                    <tr>
                                                        <td>12.34.22.102</td>
                                                        <td>getbootstrap.com</td>
                                                        <td>referral</td>
                                                        <td>3892</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12.34.22.102</td>
                                                        <td>blog.getbootstrap.com</td>
                                                        <td>direct</td>
                                                        <td>1533</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <hr class="border-light">

                                <!-- section 4 -->
                                <div class="anchor py-md-3 py-2" id="sec4"></div>
                                <h6 class="my-4 text-muted text-uppercase">Technology</h6>
                                <section class="row text-center py-3">
                                    <div class="col-6 col-lg-3 pb-2"><img src="//gradientjoy.com/150x150?id=117" alt="thumbnail" class="mx-auto img-fluid rounded-circle">
                                        <h5 class="text-truncate mt-2">Responsive</h5>
                                        <div class="text-truncate text-muted">Device agnostic</div>
                                    </div>
                                    <div class="col-6 col-lg-3 pb-2"><img src="//gradientjoy.com/150x150?id=117" alt="thumbnail" class="mx-auto img-fluid rounded-circle">
                                        <h5 class="text-truncate mt-2">HTML5</h5>
                                        <div class="text-truncate text-muted">Standards-based</div>
                                    </div>
                                    <div class="col-6 col-lg-3 pb-2"><img src="//gradientjoy.com/150x150?id=117" alt="thumbnail" class="mx-auto img-fluid rounded-circle">
                                        <h5 class="text-truncate mt-2">Progressive</h5>
                                        <div class="text-truncate text-muted">Framework</div>
                                    </div>
                                    <div class="col-6 col-lg-3 pb-2"><img src="//gradientjoy.com/150x150?id=117" alt="thumbnail" class="mx-auto img-fluid rounded-circle">
                                        <h5 class="text-truncate mt-2">Bootstrap 4</h5>
                                        <div class="text-truncate text-muted">Mobile-first</div>
                                    </div>
                                </section>

                                <hr class="border-light">

                                <!-- section 5 -->
                                <div class="anchor py-md-3 py-2" id="sec5"></div>
                                <h6 class="my-4 text-muted text-uppercase">Behavior</h6>
                                <section class="row py-3">
                                    <div class="col">
                                        <div class="alert alert-primary alert-dismissable rounded-0 p-2">
                                            <a class="close font-weight-light" data-dismiss="alert">
                                                <span class="align-text-top small">&#xD7;</span>
                                            </a>
                                            Displaying results for the last 7 months
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered my-3">
                                                <thead>
                                                <tr class="text-center">
                                                    <th class="text-left">Metric</th>
                                                    <th>J</th>
                                                    <th>F</th>
                                                    <th>M</th>
                                                    <th>A</th>
                                                    <th>M</th>
                                                    <th>J</th>
                                                    <th>J</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="text-center">
                                                    <td class="text-left text-nowrap"><span class="badge badge-pill bg-success">&#xA0;</span> Visits</td>
                                                    <td>12</td>
                                                    <td>20</td>
                                                    <td>12</td>
                                                    <td>18</td>
                                                    <td>10</td>
                                                    <td>6</td>
                                                    <td>19</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="text-left text-nowrap"><span class="badge badge-pill bg-primary">&#xA0;</span> Hours</td>
                                                    <td>16</td>
                                                    <td>23</td>
                                                    <td>8</td>
                                                    <td>15</td>
                                                    <td>11</td>
                                                    <td>8</td>
                                                    <td>15</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>

                                <hr class="border-light">

                                <!-- section 6 -->
                                <div class="anchor py-md-3 py-2" id="sec6"></div>
                                <h6 class="my-4 text-muted text-uppercase">Reviews</h6>
                                <section class="row py-3">
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card-body h-100 d-flex flex-column">
                                                        <span class="display-4">1,219</span>
                                                        <h6 class="font-weight-light mb-3">There are 4 new reviews</h6>
                                                        <div class="mt-auto p-1">
                                                            <canvas class="w-100" id="chBar"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col col-xl-auto p-0 mx-3 mx-xl-0 border-bottom border-right border-light"></div>
                                                <div class="col-xl">
                                                    <ul class="list-unstyled pr-3">
                                                        <li class="p-3">
                                                            <div class="d-flex p-2">
                                                                <span class="text-secondary display-4 mr-3"><i class="lnr lnr-smile"></i></span>
                                                                <div class="ml-2">
                                                                    <h3 class="card-title font-weight-light">Positive</h3>
                                                                    <h6 class="font-weight-light">197 Reviews</h6>
                                                                </div>
                                                            </div>
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </li>
                                                        <li class="p-3">
                                                            <div class="d-flex p-2">
                                                                <span class="text-muted display-4 mr-3"><i class="lnr lnr-sad"></i></span>
                                                                <div class="ml-2">
                                                                    <h3 class="card-title font-weight-light">Negative</h3>
                                                                    <h6 class="font-weight-light">14 Reviews</h6>
                                                                </div>
                                                            </div>
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </li>
                                                        <li class="p-3">
                                                            <div class="d-flex p-2">
                                                                <span class="text-secondary display-4 mr-3"><i class="lnr lnr-neutral"></i></span>
                                                                <div class="ml-2">
                                                                    <h3 class="card-title font-weight-light">Neutral</h3>
                                                                    <h6 class="font-weight-light">89 Reviews</h6>
                                                                </div>
                                                            </div>
                                                            <div class="progress" style="height: 5px;">
                                                                <div class="progress-bar bg-primary w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Column -->
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>
                        <div class="w-100 py-4">
                            <!-- horizontal spacer -->
                        </div>
                    </div>
                    <div class="anchor" id="areas"></div>
                    <div class="row py-3">
                        <div class="col-12 wow fadeInUp">
                            <div class="position-relative">
                                <!-- tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a href="#tab1" class="nav-link active text-uppercase" data-toggle="tab" data-target="#tab1" role="tab">Reports</a></li>
                                    <li class="nav-item ml-auto"><a href="#tab2" class="nav-link text-uppercase" data-toggle="tab" data-target="#tab2" role="tab">Log</a></li>
                                    <li class="nav-item"><a href="#tab3" class="nav-link text-uppercase" data-toggle="tab" data-target="#tab3" role="tab">Bots</a></li>
                                </ul>
                                <div class="tab-content shadow-sm p-3">
                                    <div class="tab-pane active" id="tab1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table id="datatable-example" class="table table-sm table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Carol Skelly</td>
                                                    <td>Lead Developer</td>
                                                    <td>Boston</td>
                                                    <td>49</td>
                                                    <td>2018/12/02</td>
                                                    <td>$130,560</td>
                                                </tr>
                                                <tr>
                                                    <td>Yuri Berry</td>
                                                    <td>Chief Marketing Officer (CMO)</td>
                                                    <td>New York</td>
                                                    <td>40</td>
                                                    <td>2009/06/25</td>
                                                    <td>$675,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Caesar Vance</td>
                                                    <td>Pre-Sales Support</td>
                                                    <td>New York</td>
                                                    <td>21</td>
                                                    <td>2011/12/12</td>
                                                    <td>$106,450</td>
                                                </tr>
                                                <tr>
                                                    <td>Doris Wilder</td>
                                                    <td>Sales Assistant</td>
                                                    <td>Sidney</td>
                                                    <td>23</td>
                                                    <td>2010/09/20</td>
                                                    <td>$85,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Angelica Ramos</td>
                                                    <td>Chief Executive Officer (CEO)</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2009/10/09</td>
                                                    <td>$1,200,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Joyce</td>
                                                    <td>Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>42</td>
                                                    <td>2010/12/22</td>
                                                    <td>$92,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Chang</td>
                                                    <td>Regional Director</td>
                                                    <td>Singapore</td>
                                                    <td>28</td>
                                                    <td>2010/11/14</td>
                                                    <td>$357,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Hope Fuentes</td>
                                                    <td>Secretary</td>
                                                    <td>San Francisco</td>
                                                    <td>41</td>
                                                    <td>2010/02/12</td>
                                                    <td>$109,850</td>
                                                </tr>
                                                <tr>
                                                    <td>Vivian Harrell</td>
                                                    <td>Financial Controller</td>
                                                    <td>San Francisco</td>
                                                    <td>62</td>
                                                    <td>2009/02/14</td>
                                                    <td>$452,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Timothy Mooney</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>37</td>
                                                    <td>2008/12/11</td>
                                                    <td>$136,200</td>
                                                </tr>
                                                <tr>
                                                    <td>Jackson Bradshaw</td>
                                                    <td>Director</td>
                                                    <td>New York</td>
                                                    <td>65</td>
                                                    <td>2008/09/26</td>
                                                    <td>$645,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Thor Walton</td>
                                                    <td>Developer</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2013/08/11</td>
                                                    <td>$98,540</td>
                                                </tr>
                                                <tr>
                                                    <td>Finn Camacho</td>
                                                    <td>Support Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2009/07/07</td>
                                                    <td>$87,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Serge Baldwin</td>
                                                    <td>Data Coordinator</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2012/04/09</td>
                                                    <td>$138,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011/06/27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011/01/25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2" role="tabpanel">
                                        <div class="card shadow-sm mb-3">
                                            <div class="card-body">
                                                <span class="float-right text-muted small">11.12.2019T8:02:10.35Z</span>
                                                <h5 class="card-title"><span class="badge badge-pill bg-warning">&#xA0;</span> Vuedoo</h5>
                                                <p class="card-text">The process completed, but the write disk is at 10% remaining. <a href="#" class="btn btn-sm btn-outline-warning align-bottom ml-3">Details</a></p>
                                            </div>
                                        </div>
                                        <div class="card shadow-sm mb-3">
                                            <div class="card-body">
                                                <span class="float-right text-muted small">11.12.2019T8:00:20.10Z</span>
                                                <h5 class="card-title"><span class="badge badge-pill bg-success">&#xA0;</span> Esque</h5>
                                                <p class="card-text">The process completed successfully.</p>
                                            </div>
                                        </div>
                                        <div class="card shadow-sm mb-3">
                                            <div class="card-body">
                                                <span class="float-right text-muted small">11.12.2019T7:59:33.12Z</span>
                                                <h5 class="card-title"><span class="badge badge-pill bg-success">&#xA0;</span> Nachure</h5>
                                                <p class="card-text">The process completed successfully.</p>
                                            </div>
                                        </div>
                                        <div class="card shadow-sm mb-3">
                                            <div class="card-body">
                                                <span class="float-right text-muted small">11.12.2019T7:57:04.13Z</span>
                                                <h5 class="card-title"><span class="badge badge-pill bg-danger">&#xA0;</span> Admine</h5>
                                                <p class="card-text">The process completed, but an error occured. <a href="#" class="btn btn-sm btn-outline-danger align-bottom ml-3">Details</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-12 pb-3">
                                                <div class="card shadow-sm text-white bg-primary">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Bots</h3>
                                                        <p class="card-text">Click on a robot friend to learn more about them.</p>
                                                        <a href="#" class="btn text-white border-white rounded-pill">Button</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card shadow-sm float-left w-100 text-white bg-primary mb-2">
                                                    <div class="card-body">
                                                        <div class="float-right dropdown show"><a href="#" data-toggle="dropdown" class="dropdown-toggle text-white"><i class="align-middle lnr lnr-cog"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="#" class="dropdown-item">Action</a>
                                                                <a href="#" class="dropdown-item">Another action</a>
                                                            </div>
                                                        </div>
                                                        <h4 class="card-title">Working</h4>
                                                        <p class="card-text">
                                                            This template features <em>working</em> components to demonstrate realistic use and implementation.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div id="accordion" class="border rounded" role="tablist" aria-multiselectable="true">
                                                    <a role="tab" id="headingOne" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="card-header d-block collapsed">
                                                        Amy Phillips
                                                    </a>
                                                    <div id="collapseOne" role="tabpanel" class="collapse" data-parent="#accordion">
                                                        <div class="card shadow-sm border-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-xl-10 col-lg-9 col-md-7">
                                                                        <h5>Web / UI Developer</h5>
                                                                        <p>
                                                                            I love to read, hang out with friends, listen to music, and learn new things. I&apos;ve been with ACME since the dotcom boom in 1999.
                                                                        </p>
                                                                        <p><span class="badge badge-info tags">html5</span> <span class="badge badge-info tags">css3</span> <span class="badge badge-info tags">nodejs</span></p>
                                                                    </div>
                                                                    <div class="col-xl-2 col-lg-3 col-md-5 col-10 mx-auto text-center">
                                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/w42.jpg" alt="" class="mx-auto rounded-circle img-fluid bg-dark">
                                                                        <ul title="Ratings" class="list-inline ratings text-center">
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star-half text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star-empty text-success"></span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">20.7K</h3> <small>Followers</small>
                                                                        <button class="btn btn-block btn-outline-secondary text-truncate">Follow</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">245</h3> <small>Following</small>
                                                                        <button class="btn btn-outline-secondary btn-block text-truncate">View Profile</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">43</h3> <small>Snippets</small>
                                                                        <button type="button" class="btn btn-outline-secondary btn-block text-truncate">Show</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a role="tab" id="headingTwo" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="card-header d-block collapsed">
                                                        Devin Wozniak
                                                    </a>
                                                    <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="collapse show" data-parent="#accordion">
                                                        <div class="card shadow-sm border-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-xl-10 col-lg-9 col-md-7">
                                                                        <h5>Network Admininstrator</h5>
                                                                        <p>
                                                                            I love to read, hang out with friends, listen to music, and learn new things. I got a BS in CS from Bot University.
                                                                        </p>
                                                                        <p><span class="badge badge-info tags">html5</span> <span class="badge badge-info tags">css3</span> <span class="badge badge-info tags">nodejs</span></p>
                                                                    </div>
                                                                    <div class="col-xl-2 col-lg-3 col-md-5 col-10 text-center mx-auto">
                                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/m20.jpg" alt="bot" class="mx-auto rounded-circle img-fluid bg-dark">
                                                                        <ul title="Ratings" class="list-inline ratings text-center">
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star-half"></span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">289</h3> <small>Followers</small>
                                                                        <button class="btn btn-block btn-outline-secondary text-truncate"><span class="fa fa-plus-circle"></span> Follow</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">89</h3> <small>Following</small>
                                                                        <button class="btn btn-outline-secondary btn-block text-truncate"><span class="fa fa-user"></span> View Profile</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">64</h3> <small>Snippets</small>
                                                                        <button type="button" class="btn btn-outline-secondary btn-block"><span class="fa fa-gear"></span> Options</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a role="tab" id="headingThree" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="card-header d-block collapsed">
                                                        Tom Sumner
                                                    </a>
                                                    <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="collapse" data-parent="#accordion">
                                                        <div class="card shadow-sm border-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-xl-10 col-lg-9 col-md-7">
                                                                        <h5>Quarterback</h5>
                                                                        <p>
                                                                            I love to play football and spend time with my beautiful supermodel wife, Gizel.
                                                                        </p>
                                                                        <p><span class="badge badge-info tags">passing</span> <span class="badge badge-info tags">receptions</span> <span class="badge badge-info tags">yards</span></p>
                                                                    </div>
                                                                    <div class="col-xl-2 col-lg-3 col-md-5 col-10 mx-auto text-center">
                                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/m83.jpg" alt="bot" class="mx-auto rounded-circle img-fluid bg-dark">
                                                                        <ul title="Ratings" class="list-inline ratings text-center">
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star text-success"></span></a></li>
                                                                            <li class="list-inline-item"><a href="#"><span class="lnr lnr-star-empty text-success"></span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">17.6K</h3> <small>Followers</small>
                                                                        <button class="btn btn-block btn-outline-secondary text-truncate">Follow</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">120</h3> <small>Following</small>
                                                                        <button class="btn btn-outline-secondary btn-block text-truncate">View Profile</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3 class="mb-0">2</h3> <small>Snippets</small>
                                                                        <button type="button" class="btn btn-outline-secondary btn-block">Options</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /accordion -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab-pane -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                        </div>
                    </div>
                </main>
            <?endif;?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>