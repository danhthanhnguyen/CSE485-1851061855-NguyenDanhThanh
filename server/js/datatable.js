//using dataTables with jQuery
$("#dataTables-example").DataTable({
  responsive: {
    details: {
      type: "column",
    },
  },
  columnDefs: [
    {
      className: "dtr-control",
      orderable: true,
      targets: 0,
    },
  ],
  pageLength: 5,
  lengthChange: false,
  searching: true,
  ordering: true,
});
