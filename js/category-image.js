document.addEventListener('DOMContentLoaded', function() {
    let mediaUploader;

    function openMediaUploader() {
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Select Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            document.getElementById('category-image-id').value = attachment.id;
            const imageWrapper = document.getElementById('category-image-wrapper');
            imageWrapper.innerHTML = `<img src="${attachment.url}" style="max-width:100%;" />`;
        });

        mediaUploader.open();
    }

    function removeImage() {
        document.getElementById('category-image-id').value = '';
        const imageWrapper = document.getElementById('category-image-wrapper');
        imageWrapper.innerHTML = '';
    }

    const uploadButton = document.getElementById('category-image-upload');
    const removeButton = document.getElementById('category-image-remove');

    if (uploadButton) {
        uploadButton.addEventListener('click', openMediaUploader);
    }

    if (removeButton) {
        removeButton.addEventListener('click', removeImage);
    }
});

