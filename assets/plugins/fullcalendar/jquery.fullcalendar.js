!(function ($) {
    "use strict";

    var UngDungLich = function () {
        this.$body = $("body");
        this.$lich = $("#calendar");
        this.$suKien = "#calendar-events div.calendar-events";
        this.$formDanhMuc = $("#add_new_event_form");
        this.$suKienMoRong = $("#calendar-events");
        this.$modal = $("#my_event");
        this.$nutLuuDanhMuc = $(".save-category");
        this.$doiTuongLich = null;
    };

    UngDungLich.prototype.onDrop = function (eventObj, ngay) {
        var $this = this;
        var doiTuongSuKienGoc = eventObj.data("eventObject");
        var $lopDanhMuc = eventObj.attr("data-class");
        var doiTuongSuKienSaoChep = $.extend({}, doiTuongSuKienGoc);
        doiTuongSuKienSaoChep.start = ngay;
        if ($lopDanhMuc) doiTuongSuKienSaoChep["className"] = [$lopDanhMuc];
        $this.$lich.fullCalendar("renderEvent", doiTuongSuKienSaoChep, true);
        if ($("#drop-remove").is(":checked")) {
            eventObj.remove();
        }
    };

    UngDungLich.prototype.onEventClick = function (suKienLich, jsEvent, view) {
        var $this = this;
        var form = $("<form></form>");
        form.append("<label>Thay đổi tên sự kiện</label>");
        form.append(
            "<div class='input-group'><input class='form-control' type='text' value='" +
                suKienLich.title +
                "' /><span class='input-group-append'><button type='submit' class='btn btn-success'><i class='fas fa-check'></i> Lưu</button></span></div>"
        );
        $this.$modal.modal({ backdrop: "static" });
        $this.$modal
            .find(".delete-event")
            .show()
            .end()
            .find(".save-event")
            .hide()
            .end()
            .find(".modal-body")
            .empty()
            .prepend(form)
            .end()
            .find(".delete-event")
            .unbind("click")
            .click(function () {
                $this.$doiTuongLich.fullCalendar("removeEvents", function (ev) {
                    return ev._id == suKienLich._id;
                });
                $this.$modal.modal("hide");
            });
        $this.$modal.find("form").on("submit", function () {
            suKienLich.title = form.find("input[type='text']").val();
            $this.$doiTuongLich.fullCalendar("updateEvent", suKienLich);
            $this.$modal.modal("hide");
            return false;
        });
    };

    UngDungLich.prototype.onSelect = function (batDau, ketThuc, caNgay) {
        var $this = this;
        $this.$modal.modal({ backdrop: "static" });
        var form = $("<form></form>");
        form.append("<div class='event-inputs'></div>");
        form.find(".event-inputs")
            .append(
                "<div class='form-group'><label class='control-label'>Tên sự kiện</label><input class='form-control' placeholder='Nhập tên sự kiện' type='text' name='title'/></div>"
            )
            .append(
                "<div class='form-group'><label class='control-label'>Danh mục</label><select class='form-control' name='category'></select></div>"
            )
            .find("select[name='category']")
            .append("<option value='bg-danger'>Nguy hiểm</option>")
            .append("<option value='bg-success'>Thành công</option>")
            .append("<option value='bg-purple'>Tím</option>")
            .append("<option value='bg-primary'>Chính</option>")
            .append("<option value='bg-info'>Thông tin</option>")
            .append("<option value='bg-warning'>Cảnh báo</option></div></div>");
        $this.$modal
            .find(".delete-event")
            .hide()
            .end()
            .find(".save-event")
            .show()
            .end()
            .find(".modal-body")
            .empty()
            .prepend(form)
            .end()
            .find(".save-event")
            .unbind("click")
            .click(function () {
                form.submit();
            });
        $this.$modal.find("form").on("submit", function () {
            var tenSuKien = form.find("input[name='title']").val();
            var batDauInput = form.find("input[name='beginning']").val();
            var ketThucInput = form.find("input[name='ending']").val();
            var lopDanhMuc = form
                .find("select[name='category'] option:checked")
                .val();
            if (tenSuKien !== null && tenSuKien.length != 0) {
                $this.$doiTuongLich.fullCalendar(
                    "renderEvent",
                    {
                        title: tenSuKien,
                        start: batDau,
                        end: ketThuc,
                        allDay: false,
                        className: lopDanhMuc,
                    },
                    true
                );
                $this.$modal.modal("hide");
            } else {
                alert("Bạn phải đặt tên cho sự kiện");
            }
            return false;
        });
        $this.$doiTuongLich.fullCalendar("unselect");
    };

    UngDungLich.prototype.kichHoatKeoTha = function () {
        $(this.$suKien).each(function () {
            var doiTuongSuKien = { title: $.trim($(this).text()) };
            $(this).data("eventObject", doiTuongSuKien);
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0,
            });
        });
    };

    UngDungLich.prototype.khoiTao = function () {
        this.kichHoatKeoTha();
        var ngay = new Date();
        var d = ngay.getDate();
        var m = ngay.getMonth();
        var y = ngay.getFullYear();
        var form = "";
        var homNay = new Date($.now());
        var suKienMacDinh = [
            {
                title: "Sự kiện 4",
                start: new Date($.now() + 148000000),
                className: "bg-purple",
            },
            {
                title: "Sự kiện kiểm tra 1",
                start: homNay,
                end: homNay,
                className: "bg-success",
            },
            {
                title: "Sự kiện kiểm tra 2",
                start: new Date($.now() + 168000000),
                className: "bg-info",
            },
            {
                title: "Sự kiện kiểm tra 3",
                start: new Date($.now() + 338000000),
                className: "bg-primary",
            },
        ];
        var $this = this;
        $this.$doiTuongLich = $this.$lich.fullCalendar({
            locale: "vi", // Ngôn ngữ tiếng Việt
            slotDuration: "00:15:00",
            minTime: "08:00:00",
            maxTime: "19:00:00",
            defaultView: "month",
            handleWindowResize: true,
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay",
            },
            buttonText: {
                today: "Hôm nay",
                month: "Tháng",
                week: "Tuần",
                day: "Ngày",
            },
            monthNames: [
                "Tháng Một",
                "Tháng Hai",
                "Tháng Ba",
                "Tháng Tư",
                "Tháng Năm",
                "Tháng Sáu",
                "Tháng Bảy",
                "Tháng Tám",
                "Tháng Chín",
                "Tháng Mười",
                "Tháng Mười Một",
                "Tháng Mười Hai",
            ],
            monthNamesShort: [
                "Thg1",
                "Thg2",
                "Thg3",
                "Thg4",
                "Thg5",
                "Thg6",
                "Thg7",
                "Thg8",
                "Thg9",
                "Thg10",
                "Thg11",
                "Thg12",
            ],
            dayNames: [
                "Chủ Nhật",
                "Thứ Hai",
                "Thứ Ba",
                "Thứ Tư",
                "Thứ Năm",
                "Thứ Sáu",
                "Thứ Bảy",
            ],
            dayNamesShort: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            events: suKienMacDinh,
            editable: true,
            droppable: true,
            eventLimit: true,
            selectable: true,
            drop: function (ngay) {
                $this.onDrop($(this), ngay);
            },
            select: function (batDau, ketThuc, caNgay) {
                $this.onSelect(batDau, ketThuc, caNgay);
            },
            eventClick: function (suKienLich, jsEvent, view) {
                $this.onEventClick(suKienLich, jsEvent, view);
            },
        });
        this.$nutLuuDanhMuc.on("click", function () {
            var tenDanhMuc = $this.$formDanhMuc
                .find("input[name='category-name']")
                .val();
            var mauDanhMuc = $this.$formDanhMuc
                .find("select[name='category-color']")
                .val();
            if (tenDanhMuc !== null && tenDanhMuc.length != 0) {
                $this.$suKienMoRong.append(
                    '<div class="calendar-events" data-class="bg-' +
                        mauDanhMuc +
                        '" style="position: relative;"><i class="fas fa-circle text-' +
                        mauDanhMuc +
                        '"></i>' +
                        tenDanhMuc +
                        "</div>"
                );
                $this.kichHoatKeoTha();
            }
        });
    };

    $.UngDungLich = new UngDungLich();
    $.UngDungLich.Constructor = UngDungLich;
})(window.jQuery);

(function ($) {
    "use strict";
    $.UngDungLich.khoiTao();
})(window.jQuery);
