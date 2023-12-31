@extends('template.template')
@section('content')
<div class="row">
    <div class="col-xl-3">
        <div class="card profile">
            <div class="card-body">
                <div class="text-center">
                    <img src="assets/images/users/user-3.jpg" alt=""
                        class="rounded-circle img-thumbnail avatar-xl">
                    <div class="online-circle">
                        <i class="fa fa-circle text-success"></i>
                    </div>
                    <h4 class="mt-3">Mark Kearney</h4>
                    <p class="text-muted font-size-13">Project Manager</p>
                    <a href="#" class="btn btn-pink btn-round px-5">Follow Me</a>
                    <ul class="list-unstyled list-inline mt-3 text-muted">
                        <li class="list-inline-item font-size-13 me-3">
                            <b class="text-dark">754</b> Followers
                        </li>
                        <li class="list-inline-item font-size-13">
                            <b class="text-dark">24</b> Following
                        </li>
                    </ul>

                    <ul class="list-unstyled list-inline mt-3">
                        <li class="list-inline-item ">
                            <a href="#">
                                <img src="assets/images/users/user-2.jpg" alt=""
                                    class="rounded-circle avatar-xs" data-bs-toggle="tooltip"
                                    title="" data-original-title="Anna Black">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <img src="assets/images/users/user-4.jpg" alt=""
                                    class="rounded-circle avatar-xs" data-bs-toggle="tooltip"
                                    title="" data-original-title="Milton Ault">
                            </a>
                        </li>
                        <li class="list-inline-item ">
                            <a href="#">
                                <img src="assets/images/users/user-5.jpg" alt=""
                                    class="rounded-circle avatar-xs" data-bs-toggle="tooltip"
                                    title="" data-original-title="Joseph Sims">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <img src="assets/images/users/user-6.jpg" alt=""
                                    class="rounded-circle avatar-xs" data-bs-toggle="tooltip"
                                    title="" data-original-title="Kurt Watson">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="">
                                <span class="avatar-xs font-size-13">99+</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5>Personal Information</h5>
                <h6>About :</h6>
                <p class="card-title-desc">Hi I'm Mark Kearney,has
                    been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type.
                </p>
                <hr>
                <div class="button-list btn-social-icon">
                    <button type="button" class="btn btn-facebook rounded-circle">
                        <i class="fab fa-facebook"></i>
                    </button>

                    <button type="button" class="btn btn-twitter rounded-circle ms-2">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-linkedin rounded-circle  ms-2">
                        <i class="fab fa-linkedin"></i>
                    </button>

                    <button type="button" class="btn btn-dribbble rounded-circle  ms-2">
                        <i class="fab fa-dribbble"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5>My Top Skills</h5>
                <ul class="list-unstyled list-inline language-skill mb-0">
                    <li class="list-inline-item"><span>java</span></li>
                    <li class="list-inline-item"><span>Javascript</span></li>
                    <li class="list-inline-item"><span>laravel</span></li>
                    <li class="list-inline-item"><span>HTML5</span></li>
                    <li class="list-inline-item"><span>android</span></li>
                    <li class="list-inline-item"><span>zengo</span></li>
                    <li class="list-inline-item"><span>python</span></li>
                    <li class="list-inline-item"><span>react</span></li>
                    <li class="list-inline-item"><span>php</span></li>
                </ul>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Map</h5>
                <div id="gmaps-markers" class="gmaps" style="height:200px;"></div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li class=""><i class="mdi mdi-phone me-2 text-success font-size-18"></i> <b>
                            phone </b> : +91 23456 78910</li>
                    <li class="mt-2"><i
                            class="mdi mdi-email-outline text-success font-size-18 mt-2 me-2"></i>
                        <b> Email </b> : mannat.theme@gmail.com
                    </li>
                    <li class="mt-2"><i
                            class="mdi mdi-map-marker text-success font-size-18 mt-2 me-2"></i>
                        <b>Location</b> : USA
                    </li>
                </ul>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body profile">
                <h5>Your Activity</h5>
                <canvas id="lineChart" height="70"></canvas>
            </div>
        </div>
        <!-- end card -->
        <div class="">
            <div class="custom-tab tab-profile">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active pb-3 pt-0" data-bs-toggle="tab" href="#projects"
                            role="tab"><i class="fab fa-product-hunt me-2"></i>Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#activity"
                            role="tab"><i class="fas fa-suitcase me-2"></i>Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-3 pt-0" data-bs-toggle="tab" href="#settings"
                            role="tab"><i class="fas fa-cog me-2"></i>Settings</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-4">
                    <div class="tab-pane active" id="projects" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Projects Details</h5>
                                        <p class="card-title-desc">
                                            It is a long established fact that a reader will
                                            be distracted by the readable content of a page
                                            when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal
                                            distribution of letters, as opposed to using 'Content
                                            here,
                                            content here', making it look like readable English.
                                            Many desktop
                                            publishing packages and web page editors now use
                                            Lorem Ipsum as their default model text.
                                        </p>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Payments</h5>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-centered table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th>Project Name</th>
                                                        <th>Client Name</th>
                                                        <th>Payment Type</th>
                                                        <th>Paid Date</th>
                                                        <th>Amount</th>
                                                        <th>Transaction</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Product Devlopment</td>
                                                        <td>
                                                            <img src="assets/images/users/user-2.jpg"
                                                                alt=""
                                                                class="avatar-xs rounded-circle me-2">
                                                            Kevin Heal
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>5/8/2018</td>
                                                        <td>$15,000</td>
                                                        <td><span
                                                                class="badge bg-boxed  bg-warning">panding</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>New Office Building</td>
                                                        <td>
                                                            <img src="assets/images/users/user-3.jpg"
                                                                alt=""
                                                                class="avatar-xs rounded-circle me-2">
                                                            Frank M. Lyons
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>15/7/2018</td>
                                                        <td>$35,000</td>
                                                        <td><span
                                                                class="badge bg-boxed  bg-primary">Success</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Market Research</td>
                                                        <td>
                                                            <img src="assets/images/users/user-4.jpg"
                                                                alt=""
                                                                class="avatar-xs rounded-circle me-2">
                                                            Angelo Butler
                                                        </td>
                                                        <td>Pioneer</td>
                                                        <td>30/9/2018</td>
                                                        <td>$45,000</td>
                                                        <td><span
                                                                class="badge bg-boxed  bg-warning">Panding</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Website &amp; Blog</td>
                                                        <td>
                                                            <img src="assets/images/users/user-5.jpg"
                                                                alt=""
                                                                class="avatar-xs rounded-circle me-2">
                                                            Phillip Morse
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>2/6/2018</td>
                                                        <td>$70,000</td>
                                                        <td><span
                                                                class="badge bg-boxed  bg-primary">Success</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end table-responsive-->
                                        <div class="pt-3 border-top text-end">
                                            <a href="#" class="text-primary">View all <i
                                                    class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3">
                                <div class="card">
                                    <img src="assets/images/trophy.svg" alt="" class="img-fluid">
                                    <div class="card-body text-center bg-dark">
                                        <h4 class="text-primary">" Congratulations For Your New
                                            Record "</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <p class="font-size-13 mb-0 peity-data">75%</p>
                                            <p class="data-attributes mb-0">
                                                <span
                                                    data-peity="{ &quot;fill&quot;: [&quot;#4accb1&quot;, &quot;#eeeeee&quot;],   &quot;innerRadius&quot;: 20, &quot;radius&quot;: 24 }"
                                                    style="display: none;">5/7</span><svg
                                                    class="peity" height="48" width="48">
                                                    <path
                                                        d="M 24 0 A 24 24 0 1 1 0.6017301076362322 29.340502414951548 L 4.501441756363526 28.45041867912629 A 20 20 0 1 0 24 4"
                                                        data-value="5" fill="#4accb1"></path>
                                                    <path
                                                        d="M 0.6017301076362322 29.340502414951548 A 24 24 0 0 1 23.999999999999996 0 L 23.999999999999996 4 A 20 20 0 0 0 4.501441756363526 28.45041867912629"
                                                        data-value="2" fill="#eeeeee"></path>
                                                </svg>
                                            </p>
                                            <span class="font-size-12 text-muted">Complete</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#">
                                                <img src="assets/images/project-logo/project2.jpg"
                                                    alt="" class="avatar-sm  rounded-circle me-2"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="school project">
                                            </a>
                                            <div class="flex-1">
                                                <h5 class="mb-0">School Project</h5>
                                                <small class="text-muted">Created by
                                                    bhaffada</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0 font-size-13">Last Update : <span
                                                    class="text-muted">20 mins ago</span> </p>
                                            <p class="mb-0 font-size-13">Deadline : <span
                                                    class="text-muted">5 Aug, 2018</span> </p>
                                        </div>
                                        <div class="mt-3">
                                            <p class="font-size-13 text-muted mb-2">Team Leader</p>
                                            <a href="#" class="d-inline-block">
                                                <img src="assets/images/users/user-2.jpg" alt=""
                                                    class="avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="Kurty Watson">
                                            </a>
                                            <span class="font-size-13 mb-2">Kurty Watson</span>
                                            <div class="mt-3">
                                                <ul class="list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted font-size-13 mb-0">Tags
                                                            :</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="badge bg-success">Design</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge bg-warning">Programming</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <p class="font-size-13 mb-0 peity-data">75%</p>
                                            <p class="data-attributes mb-0">
                                                <span
                                                    data-peity="{ &quot;fill&quot;: [&quot;#089de3&quot;, &quot;#eeeeee&quot;],   &quot;innerRadius&quot;: 20, &quot;radius&quot;: 24 }"
                                                    style="display: none;">5/7</span><svg
                                                    class="peity" height="48" width="48">
                                                    <path
                                                        d="M 24 0 A 24 24 0 1 1 0.6017301076362322 29.340502414951548 L 4.501441756363526 28.45041867912629 A 20 20 0 1 0 24 4"
                                                        data-value="5" fill="#089de3"></path>
                                                    <path
                                                        d="M 0.6017301076362322 29.340502414951548 A 24 24 0 0 1 23.999999999999996 0 L 23.999999999999996 4 A 20 20 0 0 0 4.501441756363526 28.45041867912629"
                                                        data-value="2" fill="#eeeeee"></path>
                                                </svg>
                                            </p>
                                            <span class="font-size-12 text-muted">Complete</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="d-inline-block">
                                                <img src="assets/images/project-logo/project3.jpg"
                                                    alt="" class="avatar-sm  rounded-circle me-2"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="Crypto Wallet">
                                            </a>
                                            <div class="flex-1">
                                                <h5 class="mb-0">Crypto Wallet</h5>
                                                <small class="text-muted">Created by
                                                    bhaffada</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0 font-size-13">Last Update : <span
                                                    class="text-muted">20 mins ago</span> </p>
                                            <p class="mb-0 font-size-13">Deadline : <span
                                                    class="text-muted">5 Aug, 2018</span> </p>
                                        </div>
                                        <div class="mt-3">
                                            <p class="font-size-13 text-muted mb-2">Team Leader</p>
                                            <a href="#">
                                                <img src="assets/images/users/user-3.jpg" alt=""
                                                    class="avatar-xs  rounded-circle"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="Diane Ward">
                                            </a>
                                            <span class="font-size-13 mb-2">Diane Ward</span>
                                            <div class="mt-3">
                                                <ul class="list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted font-size-13 mb-0">Tags
                                                            :</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="badge bg-dark">UI &amp;
                                                            UX</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="badge bg-danger">IOS</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <p class="font-size-13 mb-0 peity-data">75%</p>
                                            <p class="data-attributes mb-0">
                                                <span
                                                    data-peity="{ &quot;fill&quot;: [&quot;#4accb1 &quot;, &quot;#eeeeee&quot;],   &quot;innerRadius&quot;: 20, &quot;radius&quot;: 24 }"
                                                    style="display: none;">5/7</span><svg
                                                    class="peity" height="48" width="48">
                                                    <path
                                                        d="M 24 0 A 24 24 0 1 1 0.6017301076362322 29.340502414951548 L 4.501441756363526 28.45041867912629 A 20 20 0 1 0 24 4"
                                                        data-value="5" fill="#4accb1 "></path>
                                                    <path
                                                        d="M 0.6017301076362322 29.340502414951548 A 24 24 0 0 1 23.999999999999996 0 L 23.999999999999996 4 A 20 20 0 0 0 4.501441756363526 28.45041867912629"
                                                        data-value="2" fill="#eeeeee"></path>
                                                </svg>
                                            </p>
                                            <span class="font-size-12 text-muted">Complete</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#">
                                                <img src="assets/images/project-logo/project1.jpg"
                                                    alt="" class="avatar-sm  rounded-circle me-2"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="Finance App">
                                            </a>
                                            <div class="flex-1">
                                                <h5 class="mb-0">Finance App</h5>
                                                <small class="text-muted">Created by
                                                    bhaffada</small>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0 font-size-13">Last Update : <span
                                                    class="text-muted">20 mins ago</span> </p>
                                            <p class="mb-0 font-size-13">Deadline : <span
                                                    class="text-muted">5 Aug, 2018</span> </p>
                                        </div>
                                        <div class="mt-3">
                                            <p class="font-size-13 text-muted mb-2">Team Leader</p>
                                            <a href="#" class="d-inline-block">
                                                <img src="assets/images/users/user-4.jpg" alt=""
                                                    class="avatar-xs  rounded-circle"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-original-title="Heidi Hogan">
                                            </a>
                                            <span class="font-size-13 mb-2">Heidi Hogan</span>
                                            <div class="mt-3">
                                                <ul class="list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <p class="text-muted font-size-13 mb-0">Tags
                                                            :</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge bg-info">Programming</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="badge bg-success">Java</span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span
                                                            class="badge bg-secondary">Android</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <div class="tab-pane" id="activity" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Activity</h5>
                                        <div class="activity">
                                            <i class="mdi mdi-check text-primary"></i>
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        5 mins ago</div>
                                                    <h5 class="mb-1">Task finished</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet, consectetur adipiscing elit.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <img src="assets/images/users/user-8.jpg" alt=""
                                                class="img-activity">
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        30 mins ago</div>
                                                    <h5 class="mb-1">Task Overdue</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <i class="mdi mdi-alert-outline text-danger"></i>
                                            <div class="time-item ">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        50 mins ago</div>
                                                    <h5 class="mb-1">Task finished</h5>
                                                    <p class="text-muted font-size-13">There are
                                                        many variations of passages of Lorem Ipsum
                                                        available.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <img src="assets/images/users/user-6.jpg" alt=""
                                                class="img-activity">
                                            <div class="time-item ">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        1 Day ago</div>
                                                    <h5 class="mb-1">New Comment</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <img src="assets/images/users/user-8.jpg" alt=""
                                                class="img-activity">
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        3 Day ago</div>
                                                    <h5 class="mb-1">Task finished</h5>
                                                    <p class="text-muted font-size-13 mb-0">Lorem
                                                        ipsum dolor sit amet, consectetur adipiscing
                                                        elit.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <i class="mdi mdi-comment-outline text-info"></i>
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        5 mins ago</div>
                                                    <h5 class="mb-1">Task finished</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet, consectetur adipiscing elit.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <img src="assets/images/users/user-8.jpg" alt=""
                                                class="img-activity">
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        30 mins ago</div>
                                                    <h5 class="mb-1">Task Overdue</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <i class="mdi mdi-check text-primary"></i>
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        5 mins ago</div>
                                                    <h5 class="mb-1">Task finished</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet, consectetur adipiscing elit.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <img src="assets/images/users/user-8.jpg" alt=""
                                                class="img-activity">
                                            <div class="time-item">
                                                <div class="item-info">
                                                    <div class="text-muted float-end font-size-10">
                                                        30 mins ago</div>
                                                    <h5 class="mb-1">Task Overdue</h5>
                                                    <p class="text-muted font-size-13">Lorem ipsum
                                                        dolor sit amet.
                                                        <a href="#" class="text-info">[more
                                                            info]</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Photos</h5>
                                        <p class="card-title-desc">
                                            It is a long established fact that a reader will
                                            be distracted by the readable content of a page
                                            when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal
                                            distribution.
                                        </p>
                                        <div class="row px-3">
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-4.jpg"
                                                    title="30 min ago">
                                                    <img src="assets/images/small/img-4.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-6.jpg"
                                                    title="yesterday">
                                                    <img src="assets/images/small/img-6.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-7.jpg"
                                                    title="2 day ago">
                                                    <img src="assets/images/small/img-7.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-3.jpg"
                                                    title="last week">
                                                    <img src="assets/images/small/img-3.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-2.jpg"
                                                    title="last month">
                                                    <img src="assets/images/small/img-2.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-5.jpg"
                                                    title="2 month ago">
                                                    <img src="assets/images/small/img-5.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-8.jpg"
                                                    title="3 month ago">
                                                    <img src="assets/images/small/img-8.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-1.jpg"
                                                    title="6 month ago">
                                                    <img src="assets/images/small/img-1.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-6.jpg"
                                                    title="last year">
                                                    <img src="assets/images/small/img-6.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-4.jpg"
                                                    title="last year">
                                                    <img src="assets/images/small/img-4.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-6.jpg"
                                                    title="last year">
                                                    <img src="assets/images/small/img-6.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <a class="mfp-image"
                                                    href="assets/images/small/img-7.jpg"
                                                    title="last year">
                                                    <img src="assets/images/small/img-7.jpg" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="pt-3 text-end">
                                            <a href="#" class="text-primary">View all <i
                                                    class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="post" class="card-box">
                                            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="assets/images/users/user-3.jpg" />
                                            <span class="input-icon icon-right">
                                                <textarea rows="4" class="form-control" placeholder="Post a new message"></textarea>
                                            </span>
                                            <div class="float-end my-3">
                                                <a class="btn btn-sm btn-primary text-light px-4 mb-0">Send</a>
                                            </div>
                                            <ul class="nav nav-pills profile-pills mt-1">
                                                <li>
                                                    <a href="#"><i class="fas fa-video mx-2 text-primary"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-camera mx-2 text-primary"></i></a>
                                                </li>
                                            </ul>
                                        </form>

                                        <div class="">
                                            <form class="form-horizontal form-material mb-0">
                                                <div class="mb-3">
                                                    <input type="text" placeholder="Full Name" class="form-control">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <input type="email" placeholder="Email" class="form-control" name="example-email" id="example-email">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <input type="password" placeholder="password" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <input type="password" placeholder="Re-password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <input type="text" placeholder="Phone No" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <select class="form-control">
                                                            <option>London</option>
                                                            <option>India</option>
                                                            <option>Usa</option>
                                                            <option>Canada</option>
                                                            <option>Thailand</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea rows="5" placeholder="Message" class="form-control"></textarea>
                                                    <button class="btn btn-primary btn-sm text-light px-4 mt-3 float-end mb-0">Update
                                                        Profile</button>
                                                </div>
                                            </form>
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
@endsection
