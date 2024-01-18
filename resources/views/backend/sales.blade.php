<!-- resources/views/sales/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Data</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Include other necessary CSS files for datepicker and styles -->
</head>
<body>

    <input type="text" id="datepicker">
    
    <table id="sales-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- DataTable rows will be dynamically added here -->
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!-- Include other necessary JS files for datepicker -->

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var dataTable = $('#sales-table').DataTable();

            // Initialize datepicker
            $('#datepicker').datepicker({
                onSelect: function(date) {
                    // Retrieve sales data for the selected date
                    $.ajax({
                        url: '/sales-data/' + date,
                        method: 'GET',
                        success: function(data) {
                            // Clear existing rows
                            dataTable.clear();

                            // Add new rows based on retrieved data
                            data.forEach(function(sale) {
                                dataTable.row.add([
                                    sale.id,
                                    sale.amount,
                                    sale.sale_date
                                ]).draw();
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
