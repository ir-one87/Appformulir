// Basic DataTable
$(function () {
    $("#basicExample").DataTable({
        iDisplayLength: 20,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
        },
    });
});

// FPrint/Copy/CSV
$(function () {
    $("#copy-print-csv").DataTable({
        dom: "Bfrtip", // Struktur tampilan tombol
        buttons: ["excelHtml5", "csvHtml5", "print"], // Tombol export yang diaktifkan
        deferRender: true, // Menunda rendering baris hingga diperlukan
        stateSave: true, // Simpan kondisi tabel (misal halaman, pencarian, dll.)
        pageLength: 20, // Batasi jumlah baris per halaman
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Halaman _PAGE_ dari _PAGES_",
        },
        searching: true, // Aktifkan pencarian
        ordering: true, // Aktifkan pengurutan
        info: true, // Tampilkan info jumlah data
        processing: true, // Tampilkan indikator pemrosesan
        serverSide: false, // Gunakan client-side untuk dataset kecil
        paging: true, // Aktifkan paginasi
    });
});

// $(function () {
//     $("#copy-print-csv").DataTable({
//         dom: "Bfrtip",
//         buttons: ["excelHtml5", "csvHtml5", "print"],
//         iDisplayLength: 20,
//         language: {
//             lengthMenu: "Display _MENU_ Records Per Page",
//             info: "Halaman _PAGE_ of _PAGES_",
//         },
//     });
// });

// Fixed Header
$(document).ready(function () {
    var table = $("#fixedHeader").DataTable({
        fixedHeader: true,
        iDisplayLength: 10,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
        },
    });
});

// Vertical Scroll
$(function () {
    $("#scrollVertical").DataTable({
        scrollY: "207px",
        scrollCollapse: true,
        paging: false,
        bInfo: false,
    });
});

// Row Selection
$(function () {
    $("#rowSelection").DataTable({
        iDisplayLength: 15,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
        },
    });
    var table = $("#rowSelection").DataTable();

    $("#rowSelection tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
    });

    $("#button").on("click", function () {
        alert(table.rows(".selected").data().length + " row(s) selected");
    });
});

// Highlighting rows and columns
$(function () {
    $("#highlightRowColumn").DataTable({
        iDisplayLength: 15,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
        },
    });
    var table = $("#highlightRowColumn").DataTable();
    $("#highlightRowColumn tbody").on("mouseenter", "td", function () {
        var colIdx = table.cell(this).index().column;
        $(table.cells().nodes()).removeClass("highlight");
        $(table.column(colIdx).nodes()).addClass("highlight");
    });
});

// Using API in callbacks
$(function () {
    $("#apiCallbacks").DataTable({
        iDisplayLength: 4,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
        },
        initComplete: function () {
            var api = this.api();
            api.$("td").on("click", function () {
                api.search(this.innerHTML).draw();
            });
        },
    });
});

// Hiding Search and Show entries
$(function () {
    $("#hideSearchExample").DataTable({
        iDisplayLength: 4,
        searching: false,
        language: {
            lengthMenu: "Display _MENU_ Records Per Page",
            info: "Showing Page _PAGE_ of _PAGES_",
        },
    });
});
