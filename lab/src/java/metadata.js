document.getElementById('photoForm').addEventListener('submit', handlePhotoSubmit);

function handlePhotoSubmit(event) {
    event.preventDefault();

    const fileInput = document.getElementById('photoInput');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const image = new Image();
            image.src = e.target.result;

            image.onload = function () {
                displayImage(image);
                getExifData(image, displayExifData);
            };
        };

        reader.readAsDataURL(file);
    } else {
        console.log('Please select a file.');
    }
}

function displayImage(image) {
    const imagePreview = document.querySelector('.image-preview');
    imagePreview.style.backgroundImage = `url("${image.src}")`;
}

function getExifData(image, callback) {
    EXIF.getData(image, function () {
        const exifData = EXIF.getAllTags(this);
        callback(exifData);
    });
}

function displayExifData(exifData) {
    const metadataTable = document.getElementById('metadataTable');
    metadataTable.innerHTML = '';

    for (const key in exifData) {
        const row = document.createElement('tr');
        const cellKey = document.createElement('td');
        const cellValue = document.createElement('td');
        
        cellKey.textContent = key;
        cellValue.textContent = exifData[key];
        
        row.appendChild(cellKey);
        row.appendChild(cellValue);
        
        metadataTable.appendChild(row);
    }
}
