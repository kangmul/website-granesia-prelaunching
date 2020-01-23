/**
 * Created by iy2 on 11/7/2015.
 */

$(document).ready(function () {
    var t = $('.dt-paging').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[1, 'asc']],
    });
    t.on('order.dt search.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});
$(document).ready(function () {
    var t = $('.dt-scroll').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "filter": false,
        "paging": false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        // "order": [[1, 'asc']],
        "dom": 'T<"clear">lfrtip',
    });
    t.on('order.dt search.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

});
