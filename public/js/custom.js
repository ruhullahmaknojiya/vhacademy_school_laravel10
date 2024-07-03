// Ensure treeview menus work correctly
$(document).ready(function() {
    $('.nav-item.has-treeview > a').on('click', function(e) {
        var $parent = $(this).parent();
        if ($parent.hasClass('menu-open')) {
            $parent.removeClass('menu-open');
        } else {
            $parent.addClass('menu-open');
        }
    });
});
