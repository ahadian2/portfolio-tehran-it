jQuery(document).ready(function ($) {

    /*
    |--------------------------------------------------------------------------
    | Repeater Fields
    |--------------------------------------------------------------------------
    */

    $('.tit-20260606-repeater').each(function () {

        const repeater = $(this);
        const fieldName = repeater.data('field-name');
        const itemsWrapper = repeater.find('.tit-20260606-repeater-items');
        const templateElement = repeater.next('.tit-20260606-repeater-template');

        repeater.on('click', '.tit-20260606-add-item', function () {

            let template = templateElement.html();

            if (!template) {
                console.error('Repeater template not found.');
                return;
            }

            const index = itemsWrapper.find('.tit-20260606-repeater-item').length;

            template = template
                .replace(/__FIELD_NAME__/g, fieldName)
                .replace(/__INDEX__/g, index);

            itemsWrapper.append(template);
        });

        repeater.on('click', '.tit-20260606-remove-item', function () {
            $(this).closest('.tit-20260606-repeater-item').remove();
        });

    });

    /*
    |--------------------------------------------------------------------------
    | Media Library
    |--------------------------------------------------------------------------
    */

    $(document).on('click', '.tit-20260606-select-media', function (e) {

        e.preventDefault();

        const wrapper = $(this).closest('.tit-20260606-media-field');

        const mediaFrame = wp.media({
            title: 'انتخاب تصویر',
            button: {
                text: 'استفاده از تصویر'
            },
            multiple: false
        });

        mediaFrame.on('select', function () {

            const attachment = mediaFrame
                .state()
                .get('selection')
                .first()
                .toJSON();

            wrapper.find('.tit-20260606-media-id').val(attachment.id);

            wrapper.find('.tit-20260606-media-preview').html(
                '<img src="' + attachment.url + '" style="max-width:100%;height:auto;">'
            );

        });

        mediaFrame.open();

    });

    $(document).on('click', '.tit-20260606-remove-media', function (e) {

        e.preventDefault();

        const wrapper = $(this).closest('.tit-20260606-media-field');

        wrapper.find('.tit-20260606-media-id').val('');
        wrapper.find('.tit-20260606-media-preview').html('');

    });

});