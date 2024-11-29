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
            <div class="content-sidebar content-sidebar-md" data-scrollbar-target="#psScrollbarInit">
                <div class="content-sidebar-header bg-white sticky-top hstack justify-content-between">
                    <h4 class="fw-bolder mb-0">{{ __('messages.general.translation')}}</h4>
                    <a href="javascript:void(0);" class="app-sidebar-close-trigger d-flex">
                        <i class="feather-x"></i>
                    </a>
                </div>
                <div class="content-sidebar-body">
                    <ul class="nav flex-column nxl-content-sidebar-item">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('translations.index')}}">
                                <i class="feather-airplay"></i>
                                <span>{{ __('messages.general.translation')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('translations.sidebar') }}">
                                <i class="feather-search"></i>
                                <span>Sidebar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- [ Content Sidebar  ] end -->
            <!-- [ Main Area  ] start -->
            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-left">
                        <a href="javascript:void(0);" class="app-sidebar-open-trigger me-2">
                            <i class="feather-align-left fs-24"></i>
                        </a>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="text-danger">{{ __('messages.general.back')}}</a>
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>{{ __('messages.general.save')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <form action="{{ route('translations.update') }}" method="POST" id="translationForm">
                            @csrf
                            @method('PUT')
                            
                            <x-loading /> <!-- Loading component -->
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Keyword</th>
                                        <th>English</th>
                                        <th>Uzbek</th>
                                        <th>{{ __('students.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody id="translationTableBody">
                                    @foreach($translations_en as $key => $value_en)
                                        @if(is_array($value_en))
                                            @foreach($value_en as $subKey => $subValue_en)
                                                <tr style="font-size: 10px;">
                                                    <td>
                                                        <input type="text" name="translations[key][{{ $key }}][{{ $subKey }}]" value="{{ $subKey }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="translation-en-{{ $key }}-{{ $subKey }}" name="translations[en][{{ $key }}][{{ $subKey }}]" value="{{ $subValue_en }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="translation-uz-{{ $key }}-{{ $subKey }}" name="translations[uz][{{ $key }}][{{ $subKey }}]" value="{{ $translations_uz[$key][$subKey] ?? '' }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeTranslationRow(this)">{{ __('messages.general.delete')}}</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr style="font-size: 10px;">
                                                <td>
                                                    <input type="text" name="translations[key][{{ $key }}]" value="{{ $key }}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" id="translation-en-{{ $key }}" name="translations[en][{{ $key }}]" value="{{ $value_en }}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" id="translation-uz-{{ $key }}" name="translations[uz][{{ $key }}]" value="{{ $translations_uz[$key] ?? '' }}" class="form-control">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeTranslationRow(this)">{{ __('messages.general.delete')}}</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="button" class=" btn btn-secondary mb-4" onclick="addTranslationRow()">Add New Translation</button>
                            <button type="submit" class="d-none btn btn-primary" id="saveButton">{{ __('messages.general.save')}}</button>
                        </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->

<script>
    document.getElementById('translationForm').addEventListener('submit', function() {
        showLoading();
        document.getElementById('saveButton').disabled = true;
    });

    function addTranslationRow() {
        const tableBody = document.getElementById('translationTableBody');
        const newRow = document.createElement('tr');
        newRow.style.fontSize = '10px';

        newRow.innerHTML = `
            <td>
                <input type="text" name="new_keyword" class="form-control" placeholder="New Keyword">
            </td>
            <td>
                <input type="text" name="new_translation_en" class="form-control" placeholder="New Translation (English)">
            </td>
            <td>
                <input type="text" name="new_translation_uz" class="form-control" placeholder="New Translation (Uzbek)">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeTranslationRow(this)">Delete</button>
            </td>
        `;

        tableBody.appendChild(newRow);
    }

    function removeTranslationRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
@endsection
