@extends('layouts.layout')

@section('content')

<main class="nxl-container apps-container">
    <div class="nxl-content without-header nxl-full-content">
        <div class="main-content d-flex">
            <div class="content-sidebar content-sidebar-md" data-scrollbar-target="#psScrollbarInit">
                <div class="content-sidebar-header bg-white sticky-top hstack justify-content-between">
                    <h4 class="fw-bolder mb-0">{{ __('messages.general.translation') }}</h4>
                    <a href="javascript:void(0);" class="app-sidebar-close-trigger d-flex">
                        <i class="feather-x"></i>
                    </a>
                </div>
                <div class="content-sidebar-body">
                    <ul class="nav flex-column nxl-content-sidebar-item">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('translations.index') }}">
                                <i class="feather-airplay"></i>
                                <span>{{ __('messages.general.translation') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('translations.sidebar') }}">
                                <i class="feather-search"></i>
                                <span>Sidebar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-left">
                        <a href="javascript:void(0);" class="app-sidebar-open-trigger me-2">
                            <i class="feather-align-left fs-24"></i>
                        </a>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="{{ route('translations.index') }}" class="text-danger">{{ __('messages.general.back') }}</a>
                            <a href="javascript:void(0);" onclick="document.getElementById('translationForm').submit();" class="btn btn-primary ">
                                <i class="feather-save me-2"></i>
                                <span>{{ __('messages.general.save') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <form id="translationForm" action="{{ route('updateSidebar.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="content-area-body" id="translationSections">
                        <!-- Top-level keyword loop -->
                        @foreach($sidebar_en as $key => $translations)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th colspan="9">
                                                    <input type="text" name="translations[key][{{ $key }}]" value="{{ $key }}" class="form-control" placeholder="keyword">
                                                </th>
                                                <th colspan="3">
                                                    <button type="button" class="btn btn-primary btn-sm ms-2" onclick="addNewKeywordSection()">+</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(is_array($translations))
                                                @foreach($translations as $subKey => $subValue_en)
                                                    <tr class="align-middle">
                                                        <td colspan="3">
                                                            <input type="text" name="translations[key][{{ $key }}][{{ $subKey }}]" value="{{ $subKey }}" class="form-control">
                                                        </td>
                                                        <td colspan="3">
                                                            <input type="text" name="translations[en][{{ $key }}][{{ $subKey }}]" value="{{ $subValue_en }}" class="form-control">
                                                        </td>
                                                        <td colspan="3">
                                                            <input type="text" name="translations[uz][{{ $key }}][{{ $subKey }}]" value="{{ $sidebar_uz[$key][$subKey] ?? '' }}" class="form-control">
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-2 justify-content-start">
                                                                <a href="javascript:void(0)" class="avatar-text avatar-md" onclick="removeTranslationRow(this)">
                                                                    <i class="feather feather-trash-2"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            <tr class="align-middle">
                                                <td class="border border-0" colspan="12">
                                                    <div class="hstack gap-2 justify-content-center btn btn-outline-dark" onclick="addSubKeywordRow(this)">
                                                        Add new Subkey
                                                        <a href="javascript:void(0)" class="avatar-text avatar-md add-sub-keyword-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </a> 
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="content-area-body pt-0">
                        <div class="col-12 hstack gap-2 justify-content-center btn btn-outline-primary" onclick="addNewKeywordSection()">
                            Add new keyword
                            <a href="javascript:void(0)" class="avatar-text avatar-md add-sub-keyword-btn">
                                <i class="fa-solid fa-plus"></i>
                            </a> 
                        </div>
                    </div>
                </form>
                <x-footer></x-footer>
            </div>
        </div>
    </div>
</main>

<script>
    function addNewKeywordSection() {
        const sectionHtml = `
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th colspan="9">
                                    <input type="text" name="new_top_level_key[]" class="form-control" placeholder="New keyword">
                                </th>
                                <th colspan="3">
                                    <button type="button" class="btn btn-primary btn-sm ms-2" onclick="addNewKeywordSection()">+</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-0" colspan="12">
                                    <div class="hstack gap-2 justify-content-center btn btn-outline-dark" onclick="addSubKeywordRow(this)">
                                        Add new Subkey
                                        <a href="javascript:void(0)" class="avatar-text avatar-md add-sub-keyword-btn">
                                            <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        const translationSections = document.getElementById('translationSections');
        translationSections.insertAdjacentHTML('beforeend', sectionHtml);
    }

    function addSubKeywordRow(button) {
        const tbody = button.closest('div.card-body').querySelector('table tbody');

        // Remove the `+` button from the last row if it exists
        const lastRow = tbody.querySelector('tr:last-child');
        const addButton = lastRow.querySelector('.add-sub-keyword-btn');
        if (addButton) {
            addButton.remove();
        }

        // Add a new row above the last row
        const rowHtml = `
            <tr class="align-middle">
                <td colspan="3">
                    <input type="text" name="new_sub_key[]" class="form-control" placeholder="Subkeywords">
                </td>
                <td colspan="3">
                    <input type="text" name="new_translation_en[]" class="form-control" placeholder="English">
                </td>
                <td colspan="3">
                    <input type="text" name="new_translation_uz[]" class="form-control" placeholder="O'zbekcha">
                </td>
                <td class="text-end">
                    <div class="hstack gap-2 justify-content-start">
                        <a href="javascript:void(0)" class="avatar-text avatar-md" onclick="removeTranslationRow(this)">
                            <i class="feather feather-trash-2"></i>
                        </a>
                    </div>
                </td>
            </tr>`;

        // Insert new row before the last row
        lastRow.insertAdjacentHTML('beforebegin', rowHtml);

        // Re-add the `+` button to the now-last row
        const newLastRow = tbody.querySelector('tr:last-child');
        const lastCell = newLastRow.querySelector('.hstack');
        if (!lastCell.querySelector('.add-sub-keyword-btn')) {
            const addButtonHtml = `
                <a href="javascript:void(0)" onclick="addSubKeywordRow(this)" class="avatar-text avatar-md add-sub-keyword-btn">
                    <i class="fa-solid fa-plus"></i>
                </a>`;
            lastCell.insertAdjacentHTML('beforeend', addButtonHtml);
        }
    }

    function removeTranslationRow(button) {
        const row = button.closest('tr');
        const tbody = row.closest('tbody');
        row.remove();

        // Add the `+` button to the last row after removal
        const rows = tbody.querySelectorAll('tr');
        if (rows.length > 0) {
            const lastRow = rows[rows.length - 1];
            const lastCell = lastRow.querySelector('.hstack');
            if (!lastCell.querySelector('.add-sub-keyword-btn')) {
                const addButtonHtml = `
                    <a href="javascript:void(0)" onclick="addSubKeywordRow(this)" class="avatar-text avatar-md add-sub-keyword-btn">
                        <i class="fa-solid fa-plus"></i>
                    </a>`;
                lastCell.insertAdjacentHTML('beforeend', addButtonHtml);
            }
        }
    }
</script>
@endsection
