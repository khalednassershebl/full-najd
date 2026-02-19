/**
 * DataTables for Invoice Purchases (students who bought invoices)
 */

$(function () {
  "use strict";

  var dt_basic_table = $(".datatables-basic"),
    assetPath = "../../../app-assets/";

  if ($("body").attr("data-framework") === "laravel") {
    assetPath = $("body").attr("data-asset-path");
  }

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
      ajax: assetPath + "data/invoice-purchases-data.json",
      columns: [
        { data: "id" },
        { data: "id" },
        { data: "student_name" },
        { data: "student_phone" },
        { data: "invoice_name" },
        { data: "price" },
        { data: "paid_at" },
        { data: "is_active" },
        { data: "created_at" },
        { data: "" },
      ],
      columnDefs: [
        {
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
            return (
              '<div class="num-badge"><span class="phone-badge-data">' +
              (data || "") +
              "</span></div>"
            );
          },
        },
        {
          targets: 5,
          orderable: true,
          render: function (data, type, full, meta) {
            return (
              '<div class="num-badge d-flex align-items-center gap-2"><span class="num-badge-data"><span class="le">L.E</span>' +
              (data || "") +
              "</span></div>"
            );
          },
        },
        {
          targets: 6,
          orderable: true,
          render: function (data, type, full, meta) {
            return (
              '<div class="date-badge"><span class="date-badge-data">' +
              (data || "") +
              "</span></div>"
            );
          },
        },
        {
          targets: 7,
          render: function (data, type, full, meta) {
            var isActive = full.is_active === true || full.is_active === 1;
            var title = isActive ? "نشط" : "معطل";
            var cls = isActive ? "status-active" : "status-ban";
            return (
              '<div class="status-badge">' +
              '<span class="status-badge-data ' +
              cls +
              '">' +
              title +
              "</span></div>"
            );
          },
        },
        {
          targets: 8,
          orderable: true,
          render: function (data, type, full, meta) {
            return (
              '<div class="date-badge"><span class="date-badge-data">' +
              (data || "") +
              "</span></div>"
            );
          },
        },
        {
          targets: 2,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full.student_name || "—";
            var $initials = $name.match(/\b\w/g) || [];
            $initials = (
              ($initials.shift() || "") + ($initials.pop() || "")
            ).toUpperCase();
            var $output = '<span class="avatar-content">' + $initials + "</span>";
            var colorClass = " bg-light-status-active ";
            return (
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar ' +
              colorClass +
              ' mr-1">' +
              $output +
              "</div>" +
              '<div class="d-flex flex-column">' +
              '<span class="emp_name text-truncate font-weight-bold">' +
              $name +
              "</span></div></div>"
            );
          },
        },
        {
          targets: -1,
          title: "خيارات",
          orderable: false,
          render: function (data, type, full, meta) {
            if (!full || !full.id) {
              return '<div class="action-container"></div>';
            }
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            var actions = '<div class="action-container">';
            var baseUrl = "/admin/invoice-purchases/" + full.id;
            if (full.is_active === true || full.is_active === 1) {
              actions +=
                '<form action="' +
                baseUrl +
                '/deactivate" method="POST" style="display: inline;" onsubmit="return confirm(\'هل أنت متأكد من إلغاء تفعيل هذا الاشتراك؟ لن يتمكن الطالب من الوصول لمحتوى الشهر.\');">';
              actions +=
                '<input type="hidden" name="_token" value="' + csrfToken + '">';
              actions +=
                '<button type="submit" class="table-item-icon table-item-delete" title="إلغاء التفعيل" style="background: none; border: none; padding: 0; cursor: pointer;">';
              actions += feather.icons["x-circle"].toSvg({
                class: "font-small-4 text-warning",
              });
              actions += "</button></form>";
            } else {
              actions +=
                '<form action="' +
                baseUrl +
                '/reactivate" method="POST" style="display: inline;" onsubmit="return confirm(\'هل أنت متأكد من تفعيل هذا الاشتراك؟\');">';
              actions +=
                '<input type="hidden" name="_token" value="' + csrfToken + '">';
              actions +=
                '<button type="submit" class="table-item-icon table-item-edit" title="تفعيل" style="background: none; border: none; padding: 0; cursor: pointer;">';
              actions += feather.icons["check-circle"].toSvg({
                class: "font-small-4 text-success",
              });
              actions += "</button></form>";
            }
            actions += "</div>";
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
              text: feather.icons["printer"].toSvg({
                class: "font-small-4 mr-50",
              }) + "طباعة",
              className: "dropdown-item",
              exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] },
            },
            {
              extend: "excel",
              text:
                feather.icons["file"].toSvg({
                  class: "font-small-4 mr-50",
                }) + "Excel",
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
        paginate: { previous: "&nbsp;", next: "&nbsp;" },
        aria: {
          sortAscending: ": تفعيل لترتيب العمود تصاعدياً",
          sortDescending: ": تفعيل لترتيب العمود تنازلياً",
        },
        select: {
          rows: { _: "%d قيمة محددة", 1: "1 قيمة محددة" },
          cells: { 1: "1 خلية محددة", _: "%d خلايا محددة" },
          columns: { 1: "1 عمود محدد", _: "%d أعمدة محددة" },
        },
        buttons: {
          print: "طباعة",
          copyKeys:
            "زر <i>ctrl</i> أو <i>⌘</i> + <i>C</i> من الجدول<br>ليتم نسخها إلى الحافظة",
          pageLength: { "-1": "اظهار الكل", _: "إظهار %d أسطر" },
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
