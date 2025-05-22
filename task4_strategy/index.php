<?php
interface ImageLoaderStrategy {
    public function load(string $href): string;
}

class FileSystemImageLoader implements ImageLoaderStrategy {
    public function load(string $href): string {
        return "Loaded image from file: $href";
    }
}

class NetworkImageLoader implements ImageLoaderStrategy {
    public function load(string $href): string {
        return "Loaded image from network: $href";
    }
}

class Image {
    private ImageLoaderStrategy $loader;

    public function __construct(ImageLoaderStrategy $loader) {
        $this->loader = $loader;
    }

    public function display(string $href): void {
        echo $this->loader->load($href) . "\n";
    }
}

$fileImage = new Image(new FileSystemImageLoader());
$fileImage->display("/images/pic.png");

$urlImage = new Image(new NetworkImageLoader());
$urlImage->display("http://example.com/pic.png");
?>
