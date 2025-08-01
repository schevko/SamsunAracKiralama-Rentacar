const webp = require('webp-converter');
const fs = require('fs');
const path = require('path');
const glob = require('glob');

// Dönüştürülecek klasörler
const imageFolders = [
    'public/front/carbook-master/images',
    'public/storage/uploads/settings',
    'public/storage'
];

// Her klasördeki JPG/PNG dosyalarını WebP'ye dönüştür
imageFolders.forEach(folder => {
    if (!fs.existsSync(folder)) {
        console.log(`Klasör bulunamadı: ${folder}`);
        return;
    }

    const images = glob.sync(`${folder}/**/*.+(jpg|jpeg|png)`);

    images.forEach(imagePath => {
        const outputPath = imagePath.replace(/\.(jpg|jpeg|png)$/i, '.webp');

        // Callback fonksiyonunu ayrı olarak tanımlayın
        webp.cwebp(imagePath, outputPath, "-q 80", function(status, error) {
            if (status !== '100') {
                console.error(`Hata: ${imagePath}`, error);
            } else {
                console.log(`Dönüştürüldü: ${imagePath} -> ${outputPath}`);
            }
        });
    });
});
