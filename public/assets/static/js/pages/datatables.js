// let dataTable2 = new simpleDatatables.DataTable("#table2", {
//   searchable: true,
//   paging: true,
// });


let jquery_datatable = $("#table1").DataTable({
  responsive: true,
  paging: false,
  ordering: false,
  info: false,
  searching: false,
});

let customized_datatable = $("#table2").DataTable({
  responsive: true,
  pagingType: "simple_numbers",
  language: {
    info: "Page _PAGE_ of _PAGES_",
    lengthMenu: "_MENU_ ",
    search: "",
    searchPlaceholder: "Search..",
  },
});

const setTableColor = () => {
  document
    .querySelectorAll(".dataTables_paginate .pagination")
    .forEach((dt) => {
      dt.classList.add("pagination-primary");
    });
};
setTableColor();
jquery_datatable.on("draw", setTableColor);