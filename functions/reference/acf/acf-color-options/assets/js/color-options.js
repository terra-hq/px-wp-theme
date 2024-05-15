/**
 * Included when FIELD_NAME fields are rendered for editing by publishers.
 */
(function ($) {
    function getColorName(className) {
        if (className) {
            switch (className) {
                case "primary":
                    return "White";
                case "second":
                    return "Light Grey";
                case "third":
                    return "Blue";
                case "fourth":
                    return "Green-Blue Gradient";
                //     case "fifth":
                //       return "Yellow";
                //     case "sixth":
                //       return "Burgundy";
                //     case "seventh":
                //       return "Light blue";
                // case "eighth":
                // return "Navy blue";
                default:
                    return "Select a color";
            }
        }
    }
    function initialize_field($field) {
        $.each($($field.find(".js--coloroptions")), function () {
            var selector = $(this).find(".options ul");
            var selectorSpan = $(this).find(".selected a span");

            $(this)
                .find(".selected a")
                .click(function () {
                    selector.toggle();
                });
            //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
            $(this)
                .find("ul li a")
                .click(function () {
                    $field.find("input").val($(this).attr("data-value"));
                    selectorSpan.html(`<div class="c--text--${$(this).attr("data-value")}">` + getColorName($field.find("input").val()) + "</div>");
                    selector.hide();
                });
            if ($field.find("input").val()) {
                selectorSpan.html(`<div class="c--text--${$field.find("input").val()}">` + getColorName($field.find("input").val()) + "</div>");
            } else {
                $(this).find(".selected a").val("-");
            }
        });
    }

    if (typeof acf.add_action !== "undefined") {
        /**
         * Run initialize_field when existing fields of this type load,
         * or when new fields are appended via repeaters or similar.
         */
        acf.add_action("ready_field/type=coloroptions", initialize_field);
        acf.add_action("append_field/type=coloroptions", initialize_field);
    }
})(jQuery);
