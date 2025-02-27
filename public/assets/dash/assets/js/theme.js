$(function () {
    "use strict";

    // $(".preloader").fadeOut();

    // =================================
    // Tooltip
    // =================================
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // =================================
    // Popover
    // =================================
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // increment & decrement
    $(".minus,.add").on("click", function () {
        var $qty = $(this).closest("div").find(".qty"),
            currentVal = parseInt($qty.val()),
            isAdd = $(this).hasClass("add");
        !isNaN(currentVal) &&
            $qty.val(
                isAdd
                    ? ++currentVal
                    : currentVal > 0
                    ? --currentVal
                    : currentVal
            );
    });

    // fixed header
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 60) {
            $(".topbar").addClass("shadow-sm");
        } else {
            $(".topbar").removeClass("shadow-sm");
        }
    });

    // Password Toggler
    $('.input-wrap').each(function() {
        if (!$(this).find('.toggler').length) {
            $(this).append(`
            <div class="toggler text-muted">
                <i class="ti ti-eye-closed fs-4 mb-0"></i>
                <i class="ti ti-eye fs-4 mb-0"></i>
            </div>
        `);
        }
    });

    $(document).on('click', '.toggler', function() {
        const input = $(this).siblings('input');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });
});
