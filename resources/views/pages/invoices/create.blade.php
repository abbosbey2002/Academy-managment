@extends('layouts.layout')
@section('content')
<style>
    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    .status-active {
        background-color: #28a745; /* Green */
    }
    .status-paused {
        background-color: #ffc107; /* Yellow */
    }
    .status-inactive {
        background-color: #dc3545; /* Red */
    }
</style>
<main class="nxl-container " style="display: flex; flex-direction: column; justify-content: space-between;">
    <div class="nxl-content">
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Create Invoice</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{ route('payments.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>New Invoice</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-light">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Create Invoice</h6>
                            <form action="{{ route('invoices.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="group_id" value="{{ $group->id }}"> 
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="start_date" class="form-label">To'lov  oyi</label>
                                            <input type="month" name="start_date"  id="start_date" class="form-control" required>
                                        </div>  
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th >
                                                <input class=""  type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"> 
                                            </th>
                                            <th>Student</th>
                                            <th>Course Cost</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($group->enrollments as $enrollment)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="students[]" value="{{ $enrollment->pivot->student_id }}" class="student-checkbox">
                                                </td>
                                                <td>{{ $enrollment->first_name }} {{ $enrollment->last_name }}</td>
                                                <td>{{ number_format($group->courses->cost, 2) }} so'm</td>
                                                <td>
                                                    <span class="status-dot
                                                        @if($enrollment->pivot->status == 'active')
                                                            status-active
                                                        @elseif($enrollment->pivot->status == 'paused')
                                                            status-paused
                                                        @else
                                                            status-inactive
                                                        @endif
                                                    "></span>
                                                    {{ ucfirst($enrollment->pivot->status) }}
                                                </td>
                                                <td>{{ $enrollment->pivot->date ?? '01.01.2022' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No students available...</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <input type="hidden" id="groupStartDate" value="{{ $group->created_at }}">
                                <input type="hidden" id="courseDurationMonths" value="{{ $group->courses->duration }}">
                                </div>
                                
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Create Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</main>
<script>
function toggleSelectAll(selectAllCheckbox) {
    var checkboxes = document.querySelectorAll('.student-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
}

document.addEventListener('DOMContentLoaded', (event) => {
    const datePicker = document.getElementById('start_date');
    console.log(datePicker);

    // Guruh ochilgan sana va kurs davomiyligi
    const groupStartDate = new Date(document.getElementById('groupStartDate').value);
    const courseDurationMonths = parseInt(document.getElementById('courseDurationMonths').value);

    // Guruh yakunlanadigan sana
    const endDate = new Date(groupStartDate);
    endDate.setMonth(endDate.getMonth() + courseDurationMonths);

    // Sana formatini YYYY-MM qilib olish
    const formatDate = (date) => {
        let month = (date.getMonth() + 1).toString().padStart(2, '0');
        let year = date.getFullYear();
        return `${year}-${month}`;
    }

    // Date picker uchun cheklovlarni belgilash
    datePicker.setAttribute('min', formatDate(groupStartDate));
    datePicker.setAttribute('max', formatDate(endDate));
});
</script>

@endsection
