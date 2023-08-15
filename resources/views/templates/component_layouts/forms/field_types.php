<?php
    enum FieldTypes : string {
        case STRING = "text";
        case TEXT = "textarea";
        case NUMBER = "number";
        case PASSWORD = "password";
        case EMAIL = "email";

        case DATETIME = "datetime-local";
        case DATE = "date";
        case TIME = "time";

        case SELECT = "select";
        case CHECKBOX = "checkbox";

        /**
         * For range input, it must hava a min and max attribute
        */
        case RANGE = "range";

        /**
         * For radio input, the name attribute for each of the options must be the same.
         *  <input type="radio" name="fav_number" value="1">
             *  <input type="radio" name="fav_number" value="2">
             *  <input type="radio" name="fav_number" value="3">
        */
        case RADIO = "radio";
    };

?>
