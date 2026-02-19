/**
 * DataTables Basic
 */

$(function () {
  "use strict";

  var dt_basic_table = $(".datatables-basic"),
    dt_date_table = $(".dt-date"),
    dt_complex_header_table = $(".dt-complex-header"),
    dt_row_grouping_table = $(".dt-row-grouping"),
    dt_multilingual_table = $(".dt-multilingual"),
    assetPath = "../../../app-assets/";

  if ($("body").attr("data-framework") === "laravel") {
    assetPath = $("body").attr("data-asset-path");
  }

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: assetPath + "data/invoices-data.json",
      columns: [
        { data: "id" },
        { data: "id" }, // used for sorting so will hide this column
        { data: "image" },
        { data: "name" },
        { data: "title" },
        { data: "start_date" },
        { data: "end_date" },
        { data: "price" },
        { data: "students_count" },
        { data: "created_at" },
        { data: "" },
      ],
      columnDefs: [
        {
          // For Checkboxes
          targets: 0,
          orderable: false,
          responsivePriority: 3,
          render: function (data, type, full, meta) {
            return (
              '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
              data +
              '" /><label class="custom-control-label" for="checkbox' +
              data +
              '"></label></div>'
            );
          },
          checkboxes: {
            selectAllRender:
              '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>',
          },
        },
        {
          // Image
          targets: 2,
          orderable: false,
          responsivePriority: 5,
          render: function (data, type, full, meta) {
            if (data) {
              return '<img src="' + data + '" alt="" class="rounded" style="max-width: 50px; max-height: 50px; object-fit: cover;" />';
            }
            return '<span class="text-muted">—</span>';
          },
        },
        {
          // Invoice name
          targets: 3,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate font-weight-bold">' +
              (data || '') +
              "</span>" +
              "</div>" +
              "</div>"
            );
          },
        },
        {
          // Invoice title (display title for student)
          targets: 4,
          orderable: true,
          render: function (data, type, full, meta) {
            var title = data || full.name || '—';
            return (
              '<div class="d-flex justify-content-left align-items-center">' +
              '<span class="text-truncate">' + title + '</span>' +
              '</div>'
            );
          },
        },
        {
          targets: 5,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="date-badge">
                <span class="date-badge-data">${data || ''}</span>
              </div>
            `;
          },
        },
        {
          targets: 6,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="date-badge">
                <span class="date-badge-data">${data || ''}</span>
              </div>
            `;
          },
        },
        {
          targets: 7,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="num-badge">
                <span class="num-badge-data"><span class="le">L.E</span>${data || ''}</span>
              </div>
            `;
          },
        },
        {
          // Students Count with Eye Icon
          targets: 8,
          orderable: true,
          render: function (data, type, full, meta) {
            var count = data || 0;
            var viewUrl = '/admin/invoice-purchases?invoice_id=' + full.id;
            return `
              <div class="d-flex align-items-center justify-content-center" style="gap: 8px;">
                <span class="badge badge-light-primary" style="font-size: 14px; padding: 6px 12px;">
                  ${count}
                </span>
                <a href="${viewUrl}" class="btn btn-sm btn-icon" title="عرض الطلاب" style="padding: 4px 8px;">
                  ${feather.icons["eye"].toSvg({ class: "font-small-4 text-primary" })}
                </a>
              </div>
            `;
          },
        },
        {
          targets: 9,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="date-badge">
                <span class="date-badge-data">${data || ''}</span>
              </div>
            `;
          },
        },
        {
          // Actions
          targets: -1, // Last Col
          title: "خيارات",
          orderable: false,
          render: function (data, type, full, meta) {
            // Safety check for empty data
            if (!full || !full.id) {
              return '<div class="action-container"></div>';
            }
            
            var editUrl = '/admin/invoices/' + full.id + '/edit';
            var invoiceName = full.title || full.name || '';
            return (
              '<div class="action-container">' +
              '<a href="' + editUrl + '" class="table-item-icon table-item-edit" title="تعديل">' +
              feather.icons["edit"].toSvg({ class: "font-small-4" }) +
              "</a>" +
              '<a href="#" class="table-item-icon table-item-delete" data-id="' + full.id + '" data-name="' + invoiceName + '" title="حذف">' +
              feather.icons["trash"].toSvg({ class: "font-small-4" }) +
              "</a>" +
              "</div>"
            );
          },
        },
        { visible: false, targets: [0, 1] },
      ],
      order: [[1, "desc"]],
      dom: '<"top"fB>rt<"bottom"<"bc"li>p><"clear">',
      displayLength: 10,
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"],
      ],
      buttons: [
        "colvis",
        {
          extend: "collection",
          className: "btn btn-outline-secondary dropdown-toggle mr-2",
          text:
            feather.icons["download"].toSvg({ class: "font-small-4 mr-50" }) +
            "تحميل",
          buttons: [
            {
              extend: "print",
              text:
                feather.icons["printer"].toSvg({
                  class: "font-small-4 mr-50",
                }) + "طباعة",
              className: "dropdown-item",
              exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8, 9] },
            },
            {
              extend: "excel",
              text:
                feather.icons["file"].toSvg({ class: "font-small-4 mr-50" }) +
                "Excel",
              className: "dropdown-item",
              exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8, 9] },
            },
          ],
        },
      ],
      language: {
        loadingRecords: "جارٍ التحميل...",
        lengthMenu: "_MENU_",
        zeroRecords: "لم يعثر على أية سجلات",
        info: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        search: "",
        paginate: {
          // remove previous & next text from pagination
          previous: "&nbsp;",
          next: "&nbsp;",
        },
        aria: {
          sortAscending: ": تفعيل لترتيب العمود تصاعدياً",
          sortDescending: ": تفعيل لترتيب العمود تنازلياً",
        },
        select: {
          rows: {
            _: "%d قيمة محددة",
            1: "1 قيمة محددة",
          },
          cells: {
            1: "1 خلية محددة",
            _: "%d خلايا محددة",
          },
          columns: {
            1: "1 عمود محدد",
            _: "%d أعمدة محددة",
          },
        },
        buttons: {
          print: "طباعة",
          copyKeys:
            "زر <i>ctrl</i> أو <i>⌘</i> + <i>C</i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
          copyTitle: "نسخ إلى الحافظة",
          copySuccess: {
            1: "تم نسخ صف واحد إلى الحافظة",
            _: "تم نسخ %ds صفوف إلى الحافظة",
          },
        },
      },
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return "تفاصيل " + (data[4] || data[3] || '');
            },
          }),
          type: "column",
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: "table",
          }),
        },
      },
    });
    
    // Handle delete action
    $(dt_basic_table).on('click', '.table-item-delete', function(e) {
      e.preventDefault();
      var invoiceId = $(this).data('id');
      var invoiceName = $(this).data('name') || '';
      
      if (invoiceId && confirm('هل أنت متأكد من حذف الفاتورة "' + invoiceName + '"؟')) {
        // Create a form to submit DELETE request
        var form = $('<form>', {
          'method': 'POST',
          'action': '/admin/invoices/' + invoiceId
        });
        
        form.append($('<input>', {
          'type': 'hidden',
          'name': '_method',
          'value': 'DELETE'
        }));
        
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        if (csrfToken) {
          form.append($('<input>', {
            'type': 'hidden',
            'name': '_token',
            'value': csrfToken
          }));
        }
        
        $('body').append(form);
        form.submit();
      }
    });
  }

  // Flat Date picker
  if (dt_date_table.length) {
    dt_date_table.flatpickr({
      monthSelectorType: "static",
      dateFormat: "m/d/Y",
    });
  }
});

