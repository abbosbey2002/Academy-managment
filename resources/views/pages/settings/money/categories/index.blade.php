@extends('layouts.layout')

@section('content')

@include('components.create-category', ['folders' => $folders])
@include('components.create-folder', ['folders' => $folders])

@foreach($folders as $folder)
    <x-edit-folder :folder="$folder" />
@endforeach

@foreach($categories as $category)
    <x-edit-category :category="$category" :folders="$folders" />
@endforeach


<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->

<main class="nxl-container apps-container">
    <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">

            <!-- [ Content Sidebar ] start -->
            <x-sidebar-folder></x-sidebar-folder>
            <!-- [ Content Sidebar  ] end -->

            <!-- [ Main Area  ] start -->
            <div class="content-area d-flex flex-column justify-content-between" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-left">
                        <a href="javascript:void(0);" class="app-sidebar-open-trigger me-2">
                            <i class="feather-align-left fs-24"></i>
                        </a>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <!-- Create Folder Button -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createFolder">
                                <i class="feather-plus-circle me-2"></i>
                                Create Folder
                            </button>
                            
                            <!-- Create Category Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory">
                                <i class="feather-plus-circle me-2"></i>
                                Create
                            </button>
                        </div>
                    </div>
                </div>
                
                
                <!--! BEGIN: [Upcoming Schedule] !-->
                <div class="content-area-body">
                    <div class="card stretch stretch-full">

                        @foreach($folders as $folder)
                        <div class="card-header">
                            <h5 class="card-title">{{ $folder->folder_name }}</h5>
                            <div class="card-header-action">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                        <div data-bs-toggle="tooltip" title="Options">
                                            <i class="feather-more-vertical"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editFolder{{ $folder->id }}"><i class="feather-edit"></i>Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!--! BEGIN: [Events] !-->
                            @if($folder->categories->count() > 0)
                            @foreach($folder->categories as $category)
                            <div class="p-3 border border-dashed rounded-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="wd-30 ht-30 bg-soft-primary text-primary lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                            <span class="fs-18 fw-bold d-block">{{ $category->id }}</span>
                                        </div>
                                        <div class="text-dark">
                                            <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">{{ $category->name }}</a>
                                            <span class="fs-11 fw-normal text-muted text-truncate-1-line">{{ $folder->folder_name }}</span>
                                        </div>
                                    </div>
                                    <div class="img-group lh-0 ms-3">
                                        <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @else
                                <p>No categories available in this folder.</p>
                            @endif
                            <!--! END: [Events] !-->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--! END: [Upcoming Schedule] !-->
                
                <!-- [ Footer ] start -->
                <x-footer></x-footer>
                <!-- [ Footer ] end -->
            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->

@endsection
