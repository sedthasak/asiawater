@extends('../backend/layout/side-menu')


@section('head')
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- Include jQuery UI CSS for datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
    <div class="card mb-4">
        <div class="card-header">
            <strong>Filter by Date</strong>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start_date">Start Date:</label>
                    <input type="text" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">End Date:</label>
                    <input type="text" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="form-group col-md-6 d-flex align-items-end">
                    <button id="filter" class="btn btn-primary mr-2">Filter</button>
                    <form id="exportForm" method="POST" action="{{ route('dashboard.export') }}">
                        @csrf
                        <input type="hidden" id="export_start_date" name="start_date">
                        <input type="hidden" id="export_end_date" name="end_date">
                        <button type="submit" class="btn btn-success">Export to Excel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="salesTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ชื่อร้านค้า</th>
                <th>ยอดขายรวม</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated by jQuery -->
        </tbody>
    </table>
</div>
@endsection

@section('script')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Include jQuery UI for datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize datepicker
        $('#start_date').datepicker({ dateFormat: 'yy-mm-dd' });
        $('#end_date').datepicker({ dateFormat: 'yy-mm-dd' });

        // Initialize DataTable
        var table = $('#salesTable').DataTable();

        // Filter button click event
        $('#filter').click(function() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            $.ajax({
                url: "{{ route('dashboard.filter') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(data) {
                    table.clear().draw();
                    data.forEach(function(sale) {
                        table.row.add([
                            sale.name,
                            sale.total_sales
                        ]).draw();
                    });
                }
            });
        });

        // Export button click event
        $('form#exportForm').submit(function() {
            $('#export_start_date').val($('#start_date').val());
            $('#export_end_date').val($('#end_date').val());
        });
    });
</script>

@endsection