registerBlockType( 'childress/image-links', {
    title: 'Image Links',
    icon: 'editor-contract',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className={ className }>
                <InnerBlocks
                    allowedBlocks={['childress/image-links-link']}
                    template={[
                        ['childress/image-links-link'],
                        ['childress/image-links-link'],
                        ['childress/image-links-link']
                    ]}
                    templateLock="all"
                />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="wp-block-childress-image-links">
                <div className='image-links container'>
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );



registerBlockType( 'childress/image-links-link', {
    title: 'Link',
    icon: 'editor-contract',
    category: 'custom-blocks',
    parent: ['childress/image-links'],

    attributes: {
        imageUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: 'img'
        },
        imageId: {
            type: 'number'
        },
        imageAlt: {
            type: 'string',
            source: 'attribute',
            attribute: 'alt',
            selector: 'img'
        },
        title: {
            type: 'string',
            source: 'text',
            selector: '.image-links__title'
        },
        link: {
            type: 'string'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { imageUrl, imageId, imageAlt, title, link } = attributes;

        return (
            <div className={ className }>
                <URLInputButton
                    url={ link }
                    onChange={ ( url ) => { setAttributes({ link: url }) } }
                    />
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
                <br/>
                <h3>
                    <PlainText 
                        value={ title }
                        onChange={ ( text ) => { setAttributes({ title: text }) } }
                        placeholder="Title"
                    />
                </h3>
            </div>
        );
    },

    save( { attributes } ) {
        const { imageUrl, imageAlt, title, link } = attributes;

        return (
            <a className="image-links__link" href={ link }>
                <img src={ imageUrl } alt={ imageAlt } />
                <div className="image-links__info">
                    <h3 className="image-links__title">{ title }</h3>
                    <p className="image-links__learn-more">Learn More</p>
                </div>
            </a>
        );
    },
} );