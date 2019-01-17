registerBlockType( 'childress/project-template', {
    title: 'Project Template',
    icon: 'megaphone',
    category: 'custom-blocks',

    attributes: {
        title: {
            type: 'string'
        },
        location: {
            type: 'string'
        },
        info: {
            type: 'string'
        },
        description: {
            type: 'string'
        },
        imageUrl: {
            type: 'string'
        },
        imageId: {
            type: 'number'
        },
        imageAlt: {
            type: 'string'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { title, location, info, description, imageUrl, imageId, imageAlt } = attributes;

        return (
            <div className={ className }>
                <MediaUpload
                    onSelect={ media => { setAttributes({ imageUrl: media.url, imageId: media.id, imageAlt: media.alt }); } }
                    type="image"
                    value={ imageId }
                    render={ ({ open }) => (
                        <Button className={ imageId ? 'image-button' : 'button button-large' } onClick={ open }>
                            { imageId ? <img src={ imageUrl } /> : 'Select Image' }
                        </Button>
                    ) }
                />
                <p><PlainText
                    value={ location }
                    onChange={ ( value ) => { setAttributes({ location: value }) } }
                    placeholder="Location"
                    tagName="p"
                /></p>
                <p><RichText
                    value={ info }
                    onChange={ ( value ) => { setAttributes({ info: value }) } }
                    placeholder="Info"
                    tagName="p"
                /></p>
                <p><RichText
                    value={ description }
                    onChange={ ( value ) => { setAttributes({ description: value }) } }
                    placeholder="Description"
                /></p>
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div></div>
        );
    },
} );