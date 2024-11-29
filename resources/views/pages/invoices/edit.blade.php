@extends('layouts.layout')
@section('content')

<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Invoice</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Invoices</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ul>
            </div>
        </div>
        <!-- [ page-header ] end -->
        
        <!-- [ Main Content ] start -->
        <div class="main-content container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card invoice-container">
                        <div class="card-header">
                            <h2 class="fs-16 fw-700 mb-0">Edit Invoice #{{ $invoice->id }}</h2>
                        </div>
                        <div class="card-body p-4">
                            <!-- Form Start -->
                            <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="account" class="form-label">Account</label>
                                            <input type="text" readonly class="form-control" id="account" name="account" value="{{ old('account', $invoice->account) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="group_id" class="form-label">Group</label>
                                            <input type="text" disabled class="form-control" id="account"  value="{{ $invoice->group->group_name }}" required>
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" name="amount_display" disabled id="amount_display" class="form-control" 
                                            value="{{ number_format($invoice->amount, 2, '.', ',') }} UZS" required
                                            oninput="formatAmount(this)">

                                        <input type="hidden" id="amount" name="amount" value="{{ $invoice->amount }}">

                                        <script>
                                            function formatAmount(input) {
                                                // Get the input value and remove all non-numeric characters except the decimal point
                                                let value = input.value.replace(/[^0-9.]/g, '');

                                                // Split the value into the integer and decimal parts
                                                let parts = value.split('.');
                                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                                                // Set the formatted value with the currency symbol
                                                input.value = parts.join('.') + ' UZS';

                                                // Update the hidden input with the raw numeric value (for form submission)
                                                document.getElementById('amount').value = value;
                                            }
                                        </script>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option style="color:black;" value="draft" @if($invoice->status == 'draft') selected @endif>Draft</option>
                                            <option style="color:black;" value="sent" @if($invoice->status == 'sent') selected @endif>Sent</option>
                                            <option style="color:black;" value="paid" @if($invoice->status == 'paid') selected @endif>Paid</option>
                                            <option style="color:black;" value="partially paid" @if($invoice->status == 'partially paid') selected @endif>Partially Paid</option>
                                            <option style="color:black;" value="overdue" @if($invoice->status == 'overdue') selected @endif>Overdue</option>
                                            <option style="color:black;" value="canceled" @if($invoice->status == 'canceled') selected @endif>Canceled</option>
                                            <option style="color:black;" value="refunded" @if($invoice->status == 'refunded') selected @endif>Refunded</option>
                                            <option style="color:black;" value="disputed" @if($invoice->status == 'disputed') selected @endif>Disputed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4" id="reason-container" style="display: none;">
                                    <div class="col-md-12">
                                        <label for="reason" class="form-label">Reason</label>
                                        <textarea name="reason" id="reason" class="form-control" rows="4" placeholder="Enter reason"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" value="{{ $invoice->group_id}}" name="group_id">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Invoice</button>
                                </div>
                            </form>
                            <!-- Form End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
    <!-- [ Footer ] start -->
    <x-footer></x-footer>
    <!-- [ Footer ] end -->
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const reasonContainer = document.getElementById('reason-container');

        function toggleReasonContainer() {
            const selectedValue = statusSelect.value;
            if (selectedValue === 'refunded' || selectedValue === 'disputed' || selectedValue === 'canceled') {
                reasonContainer.style.display = 'block';
            } else {
                reasonContainer.style.display = 'none';
            }
        }

        // Initial check when the page loads
        toggleReasonContainer();

        // Listen for changes on the status dropdown
        statusSelect.addEventListener('change', toggleReasonContainer);
    });
</script>

@endsection
