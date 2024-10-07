<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src={{ asset("/themes/js/jquery.min.js") }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset("/themes/js/bootstrap.bundle.min.js") }} ></script>
<!-- AdminLTE App -->
<script src={{ asset("themes/js/adminlte.min.js") }}></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get current URL
        var currentUrl = window.location.href.replace(/\/+$/, '');

        // Loop through all links
        document.querySelectorAll('.nav-link').forEach(function(link) {
            var linkHref = link.href.replace(/\/+$/, '');

            if (linkHref === currentUrl) {
                // Add 'active' class to the current link
                link.classList.add('active');

                // Find the closest parent '.nav-item'
                var navItem = link.closest('.nav-item');

                // Check if the current link is within a treeview
                if (navItem && navItem.closest('.nav-treeview')) {
                    // Open its parent menu
                    var parentNavItem = navItem.closest('.nav-treeview').parentElement;
                    parentNavItem.classList.add('menu-open');

                    // Optionally add 'active' class to the parent link if you want to indicate that a submenu is open
                    var parentLink = parentNavItem.querySelector('.nav-link');
                    if (parentLink) {
                        parentLink.classList.add('active');
                    }
                }
            }
        });
    });


</script>
