@extends('layouts.layout')

@section('content')

    <main class="nxl-container">
        <div class="nxl-content pt-0">
            <!-- [ page-header ] start -->
            <div class="row g-0 align-items-center border-bottom help-center-content-header">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2 class="fw-bolder mb-2 text-dark">Knowledge Base</h2>
                    <p class="text-muted">A premium web applications with integrate knowledge base.</p>
                    <form action="javascript:void(0);" class="my-4 d-none d-sm-block search-form">
                        <div class="input-group select-wd-sm">
                            <select class="form-control" data-select2-selector="icon">
                                <option data-icon="feather-airplay">Getting Started</option>
                                <option data-icon="feather-link-2">Integrations</option>
                                <option data-icon="feather-archive">Directory</option>
                                <option data-icon="feather-help-circle">FAQ'S</option>
                                <option data-icon="feather-at-sign">Administrator</option>
                                <option data-icon="feather-users">End-Users</option>
                                <option data-icon="feather-life-buoy">Support</option>
                            </select>
                            <input type="text" class="form-control w-25" placeholder="Enter your keyword or question here...">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-search"></i>
                                <span class="ms-2">Search</span>
                            </button>
                        </div>
                    </form>
                    <div class="mt-2 d-none d-sm-block">
                        <span class="fs-12 text-muted">Popular:</span>
                        <a href="javascript:void(0);" class="badge bg-gray-100 shadow-sm text-muted mx-1">Started</a>
                        <a href="javascript:void(0);" class="badge bg-gray-100 shadow-sm text-muted mx-1">Integrations</a>
                        <a href="javascript:void(0);" class="badge bg-gray-100 shadow-sm text-muted mx-1">Directory</a>
                        <a href="javascript:void(0);" class="badge bg-gray-100 shadow-sm text-muted mx-1">Administrator</a>
                        <a href="javascript:void(0);" class="badge bg-gray-100 shadow-sm text-muted mx-1">Support</a>
                    </div>
                </div>
                <!--! ================================================================ !-->
                <!--! END: Content Sub Header [content-sub-header] !-->
                <!--! ================================================================ !-->
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content container-lg px-4 help-center-main-contet-area overflow-visible">
                <!--! BEGIN: [help-quick-card] !-->
                <div class="row help-quick-card">
                    <div class="col-lg-4">
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-5">
                                <div class="wd-50 ht-50 d-flex align-items-center justify-content-center mb-5">
                                    <img src="assets/images/icons/line-icon/idea.png" class="img-fluid" alt="">
                                </div>
                                <h2 class="fs-16 fw-bold mb-3">Knowledge Base</h2>
                                <p class="fs-12 fw-medium text-muted text-truncate-3-line">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, veniam. Modi quas vero odit asperiores alias libero quae in quam dicta autem et repudiandae ex, molestiae doloremque, explicabo reiciendis minus?</p>
                                <a href="javascript:void(0);" class="fs-12">Learn More &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-5">
                                <div class="wd-50 ht-50 d-flex align-items-center justify-content-center mb-5">
                                    <img src="assets/images/icons/line-icon/support.png" class="img-fluid" alt="">
                                </div>
                                <h2 class="fs-16 fw-bold mb-3">Contact Agent</h2>
                                <p class="fs-12 fw-medium text-muted text-truncate-3-line">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, veniam. Modi quas vero odit asperiores alias libero quae in quam dicta autem et repudiandae ex, molestiae doloremque, explicabo reiciendis minus?</p>
                                <a href="javascript:void(0);" class="fs-12">Learn More &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-5">
                                <div class="wd-50 ht-50 d-flex align-items-center justify-content-center mb-5">
                                    <img src="assets/images/icons/line-icon/rocket.png" class="img-fluid" alt="">
                                </div>
                                <h2 class="fs-16 fw-bold mb-3">Community Forum</h2>
                                <p class="fs-12 fw-medium text-muted text-truncate-3-line">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, veniam. Modi quas vero odit asperiores alias libero quae in quam dicta autem et repudiandae ex, molestiae doloremque, explicabo reiciendis minus?</p>
                                <a href="javascript:void(0);" class="fs-12">Learn More &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--! BEGIN: [topic-category-section] !-->
                <section class="topic-category-section">
                    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
                        <h2 class="fs-20 fw-bold mb-3">Documentation Category</h2>
                        <p class="px-5 mx-5 text-center text-muted text-truncate-3-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus laboriosam obcaecati fuga repellat animi quam nesciunt maiores dolorem corporis debitis incidunt, accusantium corrupti dignissimos repellendus, saepe accusamus expedita necessitatibus.</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/safe.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">Getting Started</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">6 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/mexican.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">User Shortwave</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">8 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/shield.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">Settings & Preferance</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">9 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/money-bag.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">Terms & Billing</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">10 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/lifebuoy.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">Integrations</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">8 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card p-4 mb-4">
                                <div class="d-sm-flex align-items-center">
                                    <div class="wd-50 ht-50 p-2 d-flex align-items-center justify-content-center border rounded-3">
                                        <img src="assets/images/icons/line-icon/award.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-0 ms-sm-3 mt-4 mt-sm-0">
                                        <h2 class="fs-14 fw-bold mb-1">Troubleshooting</h2>
                                        <span class="fs-10 fw-semibold text-uppercase text-muted">7 topics category</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 mt-4 ms-sm-5 ps-sm-3">
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Getting Started</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Adding End Users</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Applications</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Integration Video Tutorials</a>
                                    </li>
                                    <li class="mb-2">
                                        <i class="feather-file-text me-2 fs-13"></i>
                                        <a href="javascript:void(0);" class="fs-13 fw-medium" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">Step by Step Intigrations Guide</a>
                                    </li>
                                </ul>
                                <div class="mt-4 ms-5 ps-3">
                                    <a href="javascript:void(0);" class="fs-12">More Topics &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--! BEGIN: [topic-tranding-section] !-->
                <section class="topic-tranding-section">
                    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
                        <h2 class="fs-20 fw-bold mb-3">Tranding Topics</h2>
                        <p class="px-5 mx-5 text-center text-muted text-truncate-3-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus laboriosam obcaecati fuga repellat animi quam nesciunt maiores dolorem corporis debitis incidunt, accusantium corrupti dignissimos repellendus, saepe accusamus expedita necessitatibus.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to upload data to the system?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to draw a land plot on a map?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to to view expire services?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to integrate new web applications?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How do I set the geometry of an object?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to filter object on the map?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to count the number of document in the register?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to upload data to the system?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to draw a land plot on a map?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to to view expire services?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to integrate new web applications?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How do I set the geometry of an object?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to filter object on the map?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card border rounded-3 mb-3 overflow-hidden">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="wd-50 ht-50 bg-gray-100 me-3 d-flex align-items-center justify-content-center">
                                            <i class="feather-file-text"></i>
                                        </div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">How to count the number of document in the register?</a>
                                    </div>
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm me-3" data-bs-toggle="offcanvas" data-bs-target="#topicsDetailsOffcanvas">
                                        <i class="feather-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--! BEGIN: [still-question-section] !-->
                <section class="still-question-section">
                    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
                        <h2 class="fs-20 fw-bold mb-3">Still Have A Question?</h2>
                        <p class="px-5 mx-5 text-center text-muted text-truncate-3-line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus laboriosam obcaecati fuga repellat animi quam nesciunt maiores dolorem corporis debitis incidunt, accusantium corrupti dignissimos repellendus, saepe accusamus expedita necessitatibus.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-body pb-0 pb-lg-4 text-center">
                                <a href="https://themeforest.net/user/theme_ocean//" class="card stretch stretch-full p-5 mb-4 mb-lg-0 d-flex flex-column flex-fill align-items-center justify-content-center border rounded-3">
                                    <div class="mb-4 wd-50 ht-50">
                                        <img src="assets/images/icons/line-icon/phone.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="fs-14 fw-bold d-block mb-1">+1 (375) 658 9321</div>
                                    <div class="fs-12 fw-medium text-muted text-truncate-1-line">We are always heppy to help.</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body pb-0 pb-lg-4 text-center">
                                <a href="https://themeforest.net/user/theme_ocean//" class="card stretch stretch-full p-5 mb-4 mb-lg-0 d-flex flex-column flex-fill align-items-center justify-content-center border rounded-3">
                                    <div class="mb-4 wd-50 ht-50">
                                        <img src="assets/images/icons/line-icon/email.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="fs-14 fw-bold d-block mb-1">support@helpcenter.com</div>
                                    <div class="fs-12 fw-medium text-muted text-truncate-1-line">The best way to get answer faster.</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body pb-0 pb-lg-4 text-center">
                                <a href="https://themeforest.net/user/theme_ocean//" class="card stretch stretch-full p-5 mb-4 mb-lg-0 d-flex flex-column flex-fill align-items-center justify-content-center border rounded-3">
                                    <div class="mb-4 wd-50 ht-50">
                                        <img src="assets/images/icons/line-icon/notebook.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="fs-14 fw-bold d-block mb-1">Submit Ticket</div>
                                    <div class="fs-12 fw-medium text-muted text-truncate-1-line">The best way to get answer faster.</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
@endsection