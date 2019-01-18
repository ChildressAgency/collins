registerBlockType( 'childress/icon-links', {
    title: 'Icon Links',
    icon: 'megaphone',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ){
        return (
            <div className={ className }>
                <InnerBlocks
                    allowedBlocks={['childress/icon-link']}
                    template={[
                        ['childress/icon-link'],
                        ['childress/icon-link'],
                        ['childress/icon-link']
                    ]}
                    templateLock="all"
                />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="wp-block-childress-icon-links">
                <div className="container">
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/icon-link', {
    title: 'Icon Links',
    icon: 'megaphone',
    category: 'custom-blocks',
    parent: ['childress/icon-links'],

    attributes: {
        imageUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.icon-link__image'
        },
        imageId: {
            type: 'number'
        },
        imageAlt: {
            type: 'string',
            source: 'attribute',
            attribute: 'alt',
            selector: '.icon-link__image'
        },
        imageHoverUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.icon-link__image--hover'
        },
        imageHoverId: {
            type: 'number'
        },
        imageHoverAlt: {
            type: 'string',
            source: 'attribute',
            attribute: 'alt',
            selector: '.icon-link__image--hover'
        },
        label: {
            type: 'string',
            source: 'text',
            selector: '.icon-link__label'
        },
        linkUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'href',
            selector: '.icon-link'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { imageUrl, imageId, imageAlt, imageHoverUrl, imageHoverId, imageHoverAlt, label, linkUrl } = attributes;

        return (
            <div className={ className }>
                <div class="icon-link__url">
                    <URLInputButton
                        url={ linkUrl }
                        onChange={ ( url ) => { setAttributes({ linkUrl: url }) } }
                    />
                </div>
                <p>Icon:</p>
                <p>Hover Icon:</p>
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
                <MediaUpload
                    onSelect={ media => { setAttributes({ imageHoverUrl: media.url, imageHoverId: media.id, imageHoverAlt: media.alt }); } }
                    type="image"
                    value={ imageHoverId }
                    render={ ({ open }) => (
                        <Button className={ imageHoverId ? 'image-button' : 'button button-large' } onClick={ open }>
                            { imageHoverId ? <img src={ imageHoverUrl } /> : 'Select Image' }
                        </Button>
                    ) }
                />
                <p className="icon-link__label">
                    <PlainText
                        value={ label }
                        onChange={ ( value ) => { setAttributes({ label: value }) } }
                        placeholder="Label"
                    />
                </p>
            </div>
        );
    },

    save( { attributes } ) {
        const { imageUrl, imageId, imageAlt, imageHoverUrl, imageHoverId, imageHoverAlt, label, linkUrl } = attributes;

        return (
            <a href={ linkUrl } className="wp-block-childress-icon-link icon-link">
                <div className="icon-link__image-wrapper">
                    <img class="icon-link__image--hover" src={ imageHoverUrl } alt={ imageHoverAlt } />
                    <img class="icon-link__image" src={ imageUrl } alt={ imageAlt } />
                </div>
                <p className="icon-link__label">{ label }</p>
            </a>
        );
    },
} );