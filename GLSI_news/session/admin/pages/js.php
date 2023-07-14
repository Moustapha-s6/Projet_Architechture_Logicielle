    <!-- jQuery 3 -->
    <script src="dist/js/jquery.min.js"></script>

    <!-- v4.0.0-alpha.6 -->
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>

    <!-- template -->
    <script src="dist/js/niche.js"></script>

    <!-- Chartjs JavaScript -->
    <script src="dist/plugins/chartjs/chart.min.js"></script>
    <script src="dist/plugins/chartjs/chart-int.js"></script>

    <!-- Chartist JavaScript -->
    <script src="dist/plugins/chartist-js/chartist.min.js"></script>
    <script src="dist/plugins/chartist-js/chartist-plugin-tooltip.js"></script>
    <script src="dist/plugins/functions/chartist-init.js"></script>

    <!-- ion-rangeslider -->
    <script src="dist/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
    <script src="dist/plugins/functions/ion-rangeslider-int.js"></script>
    <!-- dropify -->
    <script src="dist/plugins/dropify/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>