
    $('.qtyplus').click(function (e) {
        e.preventDefault();
        console.log("coucou");
        var $container = $(this).closest('.myform');
        var $field = $container.find('input[name=' + $(this).data('field') + ']');
        var currentVal = parseInt($field.val(), 10);
        if (!isNaN(currentVal)) {
            $field.val(currentVal + 1);
        } else {
            $field.val(0);
        }
        console.log($container);
        console.log($field);
        console.log(currentVal);
    });

    $(".qtyminus").click(function (e) {
        e.preventDefault();
        var $container = $(this).closest('.myform');
        var $field = $container.find('input[name=' + $(this).data('field') + ']');
        var currentVal = parseInt($field.val(), 10);
        if (!isNaN(currentVal) && !currentVal == 0) {
            $field.val(currentVal - 1);
        } else {
            $field.val(0);
        }
    });

    console.log("coucou");