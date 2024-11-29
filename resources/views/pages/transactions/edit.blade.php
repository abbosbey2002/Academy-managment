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
                        <h5 class="m-b-10">Payment</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Shartnomani tahrirlash</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                                <i class="feather-layers me-2"></i>
                                <span>Save as Draft</span>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>Save Invoice</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card invoice-container">
                            <div class="card-header">
                                <h5>Shartnomani tahrirlash</h5>
                                <div class="dropdown">
                                    <a href="javascript:void(0)" class="btn btn-light-brand dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="0,25">Yo'nalish tanlang</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item active">SMM</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Front end</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Design</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                         <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body p-0">
                            <div class="px-4 pt-4">
                                <div class="d-md-flex align-items-center justify-content-between">
                                    <div class="mb-4 mb-md-0 your-brand">
                                        <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                            <img src="assets/images/logo-abbr.png" class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                            <div class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                <i class="feather feather-camera" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                        <div class="fs-12 text-muted mt-2">* Upload your brand</div>
                                    </div>
                                    <div class="d-md-flex align-items-center justify-content-end gap-4">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label class="form-label">To'lov sanasi:</label>
                                            <input type="date" id="issueDate" class="form-control" name="date" placeholder="Issue date..." value="{{ $payment->date }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-dashed">
                            <div class="px-4 row justify-content-between">
                                <div class="col-xl-3">
                                    <div class="form-group mb-3">
                                        <label for="InvoiceLabel" class="form-label">Ismingiz</label>
                                        <input type="text" class="form-control" id="InvoiceLabel" value="{{ $payment->name }}" name="name" placeholder="Business Name">
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group mb-3">
                                        <label for="InvoiceNumber" class="form-label">Unikal ID</label>
                                        <input type="text" class="form-control" id="InvoiceNumber" value="{{ $payment->unique_id }}" name="unique_id" placeholder="Unique ID">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group mb-3">
                                        <label for="InvoiceProduct" class="form-label">Maxsulot nomi</label>
                                        <input type="text" class="form-control" id="InvoiceProduct" name="product_name" placeholder="Product Name" value="{{ $payment->product_name }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="border-dashed">
                            <div class="row px-4 justify-content-between">
                                <div class="col-xl-5 mb-4 mb-sm-0">
                                    <div class="mb-4">
                                        <h6 class="fw-bold">Invoice From:</h6>
                                        <span class="fs-12 text-muted">Send an invoice and get paid</span>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceName" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="InvoiceName" name="name" placeholder="Business Name" value="{{ $payment->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="InvoiceEmail" name="email" placeholder="Email Address" value="{{ $payment->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoicePhone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="InvoicePhone" name="phone" placeholder="Enter Phone" value="{{ $payment->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="InvoiceAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="InvoiceAddress" name="address" placeholder="Enter Address" value="{{ $payment->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="mb-4">
                                        <h6 class="fw-bold">Invoice To:</h6>
                                        <span class="fs-12 text-muted">Send an invoice and get paid</span>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="ClientName" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input disabled type="text" class="form-control" id="ClientName" name="name" placeholder="Recipient Name" value="{{ $payment->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="ClientEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input disabled type="text" class="form-control" id="ClientEmail" name="email" placeholder="Recipient Email" value="{{ $payment->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="ClientPhone" class="col-sm-3 col-form-label">INN</label>
                                        <div class="col-sm-9">
                                            <input disabled type="text" class="form-control" id="ClientPhone" name="email" placeholder="Recipient INN" value="{{ $payment->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ClientAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input disabled type="text" class="form-control" id="ClientAddress" name="address" placeholder="Recipient Address" value="{{ $payment->address }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-dashed">
                            <div class="px-4 pb-4">
                                <div class="form-group">
                                    <label for="InvoiceNote" class="form-label">Izox:</label>
                                    <textarea rows="6" class="form-control" id="InvoiceNote" name="comment" placeholder="Comment...">{{ $payment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Saqlash</button>
                                </div>
                            </div>
                        </div>
                    </form>

                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card stretch stretch-full">
                            <div class="card-body" style="flex: none;">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold">Grand Total:</h6>
                                        <span class="fs-12 text-muted">Grand total invoice</span>
                                    </div>
                                    <div class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="To'lov avtomat hisoblanadi">
                                        <i class="feather feather-info"></i>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tab_logic_total">
                                        <tbody>
                                            <tr class="single-item">
                                                <th class="text-dark fw-semibold">Sub Total</th>
                                                <td class="w-25"><input type="number" name="sub_total" placeholder="0.00" class="form-control border-0 bg-transparent p-0" id="sub_total" readonly=""></td>
                                            </tr>
                                            <tr class="single-item">
                                                <th class="text-dark fw-semibold">Tax</th>
                                                <td class="w-25">
                                                    <div class="input-group mb-2 mb-sm-0">
                                                        <input type="number" class="form-control border-0 bg-transparent p-0" id="tax" placeholder="0">
                                                        <div class="input-group-addon">%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="single-item">
                                                <th class="text-dark fw-semibold">Tax Amount</th>
                                                <td class="w-25"><input type="number" name="tax_amount" id="tax_amount" placeholder="0.00" class="form-control border-0 bg-transparent p-0" readonly=""></td>
                                            </tr>
                                            <tr class="single-item">
                                                <th class="text-dark fw-semibold bg-gray-100">Grand Total</th>
                                                <td class="bg-gray-100 w-25"><input type="number" name="total_amount" id="total_amount" placeholder="0.00" class="form-control border-0 bg-transparent p-0 fw-bolder text-dark" readonly=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold">Payment Methord:</h6>
                                        <span class="fs-12 text-muted">Select payment methord</span>
                                    </div>
                                    <div class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Select payment methord">
                                        <i class="feather feather-info"></i>
                                    </div>
                                </div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-justified gap-1">
                                    <li class="nav-item border border-gray-500">
                                        <a href="javascript:void(0);" class="nav-link px-2 active" data-bs-toggle="tab" data-bs-target="#pamymetDebitCardTab">
                                            <i class="bi bi-credit-card-fill"></i>
                                            <span class="ms-2">Debit Card</span>
                                        </a>
                                    </li>
                                    <li class="nav-item border border-gray-500">
                                        <a href="javascript:void(0);" class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#pamymetPaypalTab">
                                            <i class="bi bi-paypal"></i>
                                            <span class="ms-2">Paypal</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content mt-4">
                                    <div class="tab-pane fade show active" id="pamymetDebitCardTab" role="tabpanel">
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control input-credit-card" placeholder="Card Number">
                                            <div class="hstack justify-content-end gap-1 mt-1 input-credit-card-type">
                                                <div class="amex">
                                                    <i class="fs-12 fa-brands fa-cc-amex"></i>
                                                </div>
                                                <div class="mastercard">
                                                    <i class="fs-12 fa-brands fa-cc-mastercard"></i>
                                                </div>
                                                <div class="visa">
                                                    <i class="fs-12 fa-brands fa-cc-visa"></i>
                                                </div>
                                                <div class="discover">
                                                    <i class="fs-12 fa-brands fa-cc-discover"></i>
                                                </div>
                                                <div class="jcb">
                                                    <i class="fs-12 fa-brands fa-cc-jcb"></i>
                                                </div>
                                                <div class="diners">
                                                    <i class="fs-12 fa-brands fa-cc-diners-club"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" placeholder="Card Holder Name">
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-date-formatting" placeholder="MM/YYYY">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control input-Blocks-formatting" placeholder="686">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pamymetPaypalTab" role="tabpanel">
                                        <p>Paypal is easiest way to pay online</p>
                                        <p>
                                            <a href="http://paypal.com" target="_blank" class="btn btn-primary"><i class="bi bi-paypal me-2"></i> Log in my Paypal</a>
                                        </p>
                                        <div class="fs-11 text-muted">Note: There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
        <x-footer></x-footer>
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

    @endsection