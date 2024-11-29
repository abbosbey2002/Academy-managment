@extends('layouts.layout')
@section('content')


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
                <div>
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
                    
                    <div class="content-area-body">
                        <div class="card mb-0">
                            <div class="card-body">
                                <table class="table table-hover mb-0" id="userList">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Folder Name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($folders as $folder)
                                        <tr>
                                            <td>{{ $folder->id }}</td>
                                            <td>{{ $folder->folder_name }}</td>
                                            <td>{{ $folder->description }}</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('category-folders.edit', $folder->id) }}" class="avatar-text avatar-md me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                            <i class="feather feather-more-horizontal"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item printBTN" href="javascript:void(0)">
                                                                    <i class="feather feather-printer me-3"></i>
                                                                    <span>Print</span>
                                                                </a>
                                                            </li> 
                                                            <li class="dropdown-divider"></li>
                                                            <li>
                                                                <form class="dropdown-item" action="{{ route('category-folders.destroy', $folder->id) }}" method="POST">
                                                                    <input type="hidden" name="_token" value="ORxRnRZi0c8Q03567T4o66uAzUtI6f2ijezmtdzw" autocomplete="off">                                                                    <input type="hidden" name="branch_id" value="21"/>
                                                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        Delete
                                                                    </button>
                                                                </form>                                                                
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
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
