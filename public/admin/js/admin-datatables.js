// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// });

$(document).ready(function() {
  $('#dataTable').DataTable({
    // Example customization options
    "paging": true,         // Enable/disable pagination
    "ordering": false,       // Enable/disable sorting
    "info": true,           // Enable/disable table information display
    "searching": true,      // Enable/disable search box
    "lengthChange": true,   // Enable/disable changing the number of rows displayed

    // Example callbacks
    "drawCallback": function(settings) {
      // Callback when the table is redrawn
      console.log("Table redrawn");
    },
    "rowCallback": function(row, data, index) {
      // Callback for each row
      // You can customize the appearance of each row here
    },
    "columnDefs": [
      {
        // Example column definition
        "targets": [0],       // Target the first column
        "visible": false,     // Make the column invisible
        // You can add more options for customization
      }
    ],

    // Example language customization
    "language": {
      "emptyTable": "No data available in table",
      "info": "Showing _START_ to _END_ of _TOTAL_ entries",
      "infoEmpty": "Showing 0 to 0 of 0 entries",
      "infoFiltered": "(filtered from _MAX_ total entries)",
      "lengthMenu": "Show _MENU_ entries",
      "search": "Search:",
      "zeroRecords": "No matching records found",
      "paginate": {
        "first": "First",
        "last": "Last",
        "next": "Next",
        "previous": "Previous"
      }
    }
  });
});

