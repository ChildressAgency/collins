registerBlockType( 'childress/team-members', {
    title: 'Team Members',
    icon: 'groups',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ) {
        const { classes } = attributes;

        return (
            <div className={ className }>
                <InnerBlocks
                    allowedBlocks={['childress/team-member']}
                    template={[
                        ['childress/team-member']
                    ]}
                    />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="wp-block-childress-team-members">
                <div className="container">
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/team-member', {
    title: 'Team Member',
    icon: 'id',
    category: 'custom-blocks',
    parent: ['childress/team-members'],

    attributes: {
        imageUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.team-member__img'
        },
        imageId: {
            type: 'number'
        },
        imageAlt: {
            type: 'string',
            source: 'attribute',
            attribute: 'alt',
            selector: '.team-member__img'
        },
        name: {
            type: 'string',
            source: 'text',
            selector: '.team-member__name'
        },
        title: {
            type: 'string',
            source: 'text',
            selector: '.team-member__title'
        },
        description: {
            type: 'string',
            source: 'text',
            selector: '.team-member__description'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { imageUrl, imageId, imageAlt, name, title, description } = attributes;

        return (
            <div className="team-member">
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
                <h3 className="team-member__name">
                    <PlainText
                        value={ name }
                        onChange={ ( text ) => { setAttributes({ name: text }) } }
                        placeholder="Name"
                        />
                </h3>
                <p className="team-member__title">
                    <PlainText
                        value={ title }
                        onChange={ ( text ) => { setAttributes({ title: text }) } }
                        placeholder="Title"
                        />
                </p>
                <p className="team-member__description">
                    <RichText
                        value={ description }
                        onChange={ ( text ) => { setAttributes({ description: text }) } }
                        placeholder="Description"
                        />
                </p>
            </div>
        );
    },

    save( { attributes } ) {
        const { imageUrl, imageAlt, name, title, description } = attributes;

        return (
            <div className="team-member">
                <img className="team-member__image" src={ imageUrl } alt={ imageAlt } />
                <h3 class="team-member__name">{ name }</h3>
                <p class="team-member__title">{ title }</p>
                <p class="team-member__description">{ description }</p>
            </div>
        );
    },
} );