/**
 * DataTables Basic for Balance Added
 */

$(function () {
  "use strict";

  var dt_basic_table = $(".datatables-basic"),
    assetPath = "../../../app-assets/";

  if ($("body").attr("data-framework") === "laravel") {
    assetPath = $("body").attr("data-asset-path");
  }

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: assetPath + "data/balance-added-data.json", // This will be overridden by the view
      columns: [
        { data: "id" },
        { data: "id" }, // used for sorting so will hide this column
        { data: "student_name" },
        { data: "student_phone" },
        { data: "amount" },
        { data: "payment_method" },
        { data: "proof_image" },
        { data: "status" },
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
          targets: 3,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="num-badge">
                <span class="phone-badge-data">${data || ''}</span>
              </div>
            `;
          },
        },
        {
          targets: 4,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="num-badge d-flex align-items-center gap-2">
                <span class="num-badge-data"><span class="le">L.E</span>${data}</span>
              </div>
            `;
          },
        },
        {
          targets: 5,
          orderable: true,
          render: function (data, type, full, meta) {
            return `
              <div class="num-badge">
                <span class="phone-badge-data">${data || 'غير محدد'}</span>
              </div>
            `;
          },
        },
        {
          targets: 6,
          orderable: false,
          render: function (data, type, full, meta) {
            if (data && data !== '' && data !== null && data !== undefined) {
              // Debug logging
              console.log('Proof image data for ID ' + full.id + ':', data);
              
              // Use data attribute to avoid URL escaping issues
              var imageId = 'proof-img-' + full.id;
              // Escape single quotes in URL for onclick
              var escapedUrl = String(data).replace(/'/g, "&#39;").replace(/"/g, "&quot;");
              
              return `
                <img id="${imageId}"
                     src="${data}" 
                     class="proof-image" 
                     data-image-url="${escapedUrl}"
                     alt="إثبات الدفع" 
                     style="max-width: 60px; max-height: 60px; cursor: pointer; border-radius: 4px; object-fit: cover; border: 1px solid #ddd;"
                     onerror="console.error('Image load error for ID ${full.id}:', this.src); this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'60\' height=\'60\'%3E%3Crect width=\'60\' height=\'60\' fill=\'%23ddd\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23999\' font-size=\'10\'%3Eخطأ%3C/text%3E%3C/svg%3E'; this.style.cursor='default';">
              `;
            }
            return '<span class="text-muted">لا يوجد</span>';
          },
        },
        {
          // Status
          targets: 7,
          render: function (data, type, full, meta) {
            var $status = {
              pending: { title: "قيد المراجعة", class: "status-new" },
              approved: { title: "موافق عليه", class: "status-active" },
              rejected: { title: "مرفوض", class: "status-ban" },
            };
            if (typeof $status[data] === "undefined") {
              return data;
            }

            return (
              '<div class="status-badge">' +
              '<span class="status-badge-data ' +
              $status[data].class +
              '">' +
              $status[data].title +
              "</span>" +
              "</div>"
            );
          },
        },
        {
          targets: 8,
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
          // Avatar image/badge, Name
          targets: 2,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full["student_name"] || 'غير معروف';
            
            // For Avatar badge
            var $initials = $name.match(/\b\w/g) || [];
            $initials = (
              ($initials.shift() || "") + ($initials.pop() || "")
            ).toUpperCase();
            var $output = '<span class="avatar-content">' + $initials + "</span>";

            var colorClass = " bg-light-status-active ";
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar ' +
              colorClass +
              ' mr-1">' +
              $output +
              "</div>" +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate font-weight-bold">' +
              $name +
              "</span>" +
              "</div>" +
              "</div>";
            return $row_output;
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
            
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var actions = '<div class="action-container">';
            
            if (full.status === 'pending') {
              actions += '<form action="/admin/balance-added/' + full.id + '/approve" method="POST" style="display: inline;" onsubmit="return confirm(\'هل أنت متأكد من الموافقة على هذا الطلب؟ سيتم إضافة ' + full.amount + ' L.E إلى رصيد الطالب\');">';
              actions += '<input type="hidden" name="_token" value="' + csrfToken + '">';
              actions += '<button type="submit" class="table-item-icon table-item-edit" title="موافقة" style="background: none; border: none; padding: 0; cursor: pointer;">';
              actions += feather.icons["check"].toSvg({ class: "font-small-4 text-success" });
              actions += '</button>';
              actions += '</form>';
              
              actions += '<form action="/admin/balance-added/' + full.id + '/reject" method="POST" style="display: inline;" onsubmit="return confirm(\'هل أنت متأكد من رفض هذا الطلب؟\');">';
              actions += '<input type="hidden" name="_token" value="' + csrfToken + '">';
              actions += '<button type="submit" class="table-item-icon table-item-delete" title="رفض" style="background: none; border: none; padding: 0; cursor: pointer;">';
              actions += feather.icons["x"].toSvg({ class: "font-small-4 text-danger" });
              actions += '</button>';
              actions += '</form>';
            } else {
              actions += '<span class="text-muted">تمت المعالجة</span>';
            }
            
            actions += '</div>';
            return actions;
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
              exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] },
            },
            {
              extend: "excel",
              text:
                feather.icons["file"].toSvg({ class: "font-small-4 mr-50" }) +
                "Excel",
              className: "dropdown-item",
              exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] },
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
          pageLength: {
            "-1": "اظهار الكل",
            _: "إظهار %d أسطر",
          },
          collection: "مجموعة",
          copy: "نسخ",
          copyTitle: "نسخ إلى الحافظة",
          excel: "ملف إكسيل",
          pdf: "ملف PDF",
          colvis: "إظهار الأعمدة",
          colvisRestore: "إستعادة العرض",
          copySuccess: {
            1: "تم نسخ سطر واحد الى الحافظة",
            _: "تم نسخ %ds أسطر الى الحافظة",
          },
        },
        processing: "جارٍ المعالجة...",
        emptyTable: "لا يوجد بيانات متاحة في الجدول",
        infoEmpty: "يعرض 0 إلى 0 من أصل 0 مُدخل",
        thousands: ".",
        infoFiltered: "(مرشحة من مجموع _MAX_ مُدخل)",
      },
    });
  }
});

