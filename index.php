<?
//define('NEED_FILTER', true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//$APPLICATION->SetTitle("Индигос.ru — магазин образовательного контента");
?>

<?if(0):?>


        <main class="p-4 flex-fill">
            <div class="wow fadeIn">
                “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?”
            </div>
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


            <?if(1):?>
                <main class="p-4 flex-fill">
                    <div class="row mt-1 mb-3">
                        <div class="col-xl-9 col-md-6 pb-3 wow fadeIn">
                            <div class="card banner_1 shadow-sm h-100">
                                <div class="card-body p-xl-3 p-2 d-flex flex-column">
                                    <h4 class="font-weight-light mb-3">Visits</h4>
                                    <div class="my-auto p-1 py-2">
                                        <?if(0):?>
                                        “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?”
                                        <?endif;?>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                <h4 class="font-weight-light mb-0">Новые статьи</h4>
                            </div>
                            <?if(0):?>
                            <div class="row pt-3">
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?endif;?>
                            <?$APPLICATION->IncludeComponent("forque:news.list","main_page",Array(
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "AJAX_MODE" => "Y",
                                    "IBLOCK_TYPE" => "articles",
                                    "IBLOCK_ID" => "30",
                                    "NEWS_COUNT" => "3",
                                    "SORT_BY1" => "ID",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER2" => "ASC",
                                    "FILTER_NAME" => "",
                                    "FIELD_CODE" => Array("ID","DETAIL_PICTURE"),
                                    "PROPERTY_CODE" => Array("SUBTITLE"),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "SET_TITLE" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "CACHE_FILTER" => "Y",
                                    "CACHE_GROUPS" => "Y",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "PAGER_TITLE" => "Новости",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => "",
                                    "PAGER_DESC_NUMBERING" => "Y",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "Y",
                                    "SET_STATUS_404" => "Y",
                                    "SHOW_404" => "Y",
                                    "MESSAGE_404" => "",
                                    "PAGER_BASE_LINK" => "",
                                    "PAGER_PARAMS_NAME" => "arrPager",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => ""
                                )
                            );?>
                        </div>
                    </div>
                </main>
            <?endif;?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>

