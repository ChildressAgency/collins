const { registerBlockType } = wp.blocks;
const { RichText, BlockControls, InspectorControls, AlignmentToolbar, MediaUpload, FontSizePicker, PlainText, InnerBlocks } = wp.editor;
const { Fragment } = wp.element;
const { Button } = wp.components;

registerBlockType( 'childress/container', {
    title: 'Container',
    icon: 'editor-contract',
    category: 'layout',

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className="container">
                <InnerBlocks />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div class="container">
                <InnerBlocks.Content />
            </div>
        );
    },
} );