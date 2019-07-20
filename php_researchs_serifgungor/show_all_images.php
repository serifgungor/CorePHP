 <?php
                        //$files = scandir('images/galeri/');
                        $files = glob('images/galeri/*.{jpg,png,gif}', GLOB_BRACE);
                        foreach($files as $file) {
?>