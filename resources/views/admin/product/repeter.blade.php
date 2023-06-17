<!-- outer repeater -->
<form class="repeater">
    <div data-repeater-list="outer-list">
        <div data-repeater-item>
            <input type="text" name="text-input" value="A"/>
            <input data-repeater-delete type="button" value="Delete"/>

            <!-- innner repeater -->
            <div class="inner-repeater">
                <div data-repeater-list="inner-list">
                    <div data-repeater-item>
                        <input type="text" name="inner-text-input" value="B"/>
                        <input data-repeater-delete type="button" value="Delete"/>
                    </div>
                </div>
                <input data-repeater-create type="button" value="Add"/>
            </div>

        </div>
    </div>
    <input data-repeater-create type="button" value="Add"/>
</form>

>
<script>
    $(document).ready(function () {
        $('.repeater').repeater({
                                    // (Required if there is a nested repeater)
                                    // Specify the configuration of the nested repeaters.
                                    // Nested configuration follows the same format as the base configuration,
                                    // supporting options "defaultValues", "show", "hide", etc.
                                    // Nested repeaters additionally require a "selector" field.
                                    repeaters: [{
                                        // (Required)
                                        // Specify the jQuery selector for this nested repeater
                                        selector: '.inner-repeater'
                                    }]
                                });
    });
</script>
