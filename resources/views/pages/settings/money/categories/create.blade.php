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
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-left">
                        <a href="javascript:void(0);" class="app-sidebar-open-trigger me-2">
                            <i class="feather-align-left fs-24"></i>
                        </a>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="text-danger">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>Save Changes</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    <div class="card mb-0">
                        <div class="card-body">

                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label" for="name">Наименование <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" maxlength="75" placeholder="Category Name" name="name" id="name">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Группа</label>
                                    <select class="form-select" data-select2-selector="icon" name="folder_id" id="folder_id">
                                    @foreach($folders as $folder)
                                        <option value="{{ $folder->id }}">{{ $folder->folder_name }}</option>
                                    @endforeach
                                    </select>
                                    @error('folder_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Описание <span class="text-danger">*</span></label>
                                    <textarea rows="10" class="form-control" maxlength="160" placeholder="Meta Description (max 160 chars)"></textarea>
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Create Category</button>
                            </form>
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
