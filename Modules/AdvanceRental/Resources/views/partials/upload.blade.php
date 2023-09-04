
<script>
    function removeImage(deleteIcon) {
        const imageItem = deleteIcon.parentElement;
        const imageSrc = imageItem.querySelector('img').src;
        const imagesInput = document.querySelector('input[name="images[]"][value="' + imageSrc + '"]');

        if (imagesInput) {
            imagesInput.remove(); // Remove the hidden input field for the image
        }
        imageItem.remove(); // Remove the image container from the DOM
    }

</script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


<script>
    $('.lfm').filemanager('image');
</script>

