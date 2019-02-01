registerBlockType( 'childress/career-openings', {
    title: 'Career Openings',
    icon: 'groups',
    category: 'custom-blocks',

    attributes: {
        title: {
            type: 'string',
            default: 'Current Openings'
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { title } = attributes;

        return (
            <div className={ className }>
                <h2>
                    <PlainText
                        value={ title }
                        onChange={ ( value ) => setAttributes({ title: value }) }
                    />
                </h2>
                <InnerBlocks
                    allowedBlocks={['childress/opening']}
                    template={[
                        ['childress/opening']
                    ]}
                />
            </div>
        );
    },

    save( { attributes } ) {
        const { title } = attributes;

        return (
            <div className="wp-block-childress-career-openings">
                <div className="container">
                    <h2>{ title }</h2>
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/opening', {
    title: 'Opening',
    icon: 'businessman',
    category: 'custom-blocks',
    parent: ['childress/career-openings'],

    attributes: {
        imageUrl: {
            type: 'string',
            source: 'attribute',
            attribute: 'src',
            selector: '.opening__image'
        },
        imageAlt: {
            type: 'string',
            source: 'attribute',
            attribute: 'alt',
            selector: '.opening__image'
        },
        imageId: {
            type: 'number'
        },
        title: {
            type: 'string',
            source: 'text',
            selector: '.opening__title'
        },
        description: {
            type: 'array',
            source: 'children',
            selector: '.opening__description',
            default: []
        },
        duties: {
            type: 'array',
            source: 'children',
            selector: '.opening__misc--duties',
            default: []
        },
        skills: {
            type: 'array',
            source: 'children',
            selector: '.opening__misc--skills',
            default: []
        }
    },

    edit( { attributes, className, setAttributes } ){
        const { imageUrl, imageAlt, imageId, title, description, duties, skills } = attributes;

        return (
            <div className="opening">
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
                <div className="opening__info">
                    <h4 className="opening__title">
                        <PlainText
                            value={ title }
                            onChange={ ( value ) => setAttributes({ title: value }) }
                            placeholder="Title"
                        />
                    </h4>
                    <div className="opening__description">
                        <RichText
                            value={ description }
                            onChange={ ( value ) => setAttributes({ description: value }) }
                            tagName='div'
                            multiline='p'
                            keepPlaceholderOnFocus={ true }
                            placeholder="Description"
                        />
                    </div>
                    <div className="opening__misc">
                        Essential Job Duties & Responsibilities
                        <RichText
                            value={ duties }
                            onChange={ ( value ) => setAttributes({ duties: value }) }
                            tagName='div'
                            multiline='p'
                            keepPlaceholderOnFocus={ true }
                            placeholder="Essential Job Duties & Responsibilities"
                        />
                    </div>
                    <div className="opening__misc">
                        Essential Skills
                        <RichText
                            value={ skills }
                            onChange={ ( value ) => setAttributes({ skills: value }) }
                            tagName='div'
                            multiline='p'
                            keepPlaceholderOnFocus={ true }
                            placeholder="Essential Skills"
                        />
                    </div>
                </div>
            </div>
        );
    },

    save( { attributes } ) {
        const { imageUrl, imageAlt, imageId, title, description, duties, skills } = attributes;

        return (
            <div className="opening">
                <img className="opening__image" src={ imageUrl } alt={ imageAlt } id={ imageId } />
                <div className="opening__info">
                    <h4 className="opening__title">{ title }</h4>
                    <hr />
                    <div className="opening__desc-label">Job Description</div>
                    <div className="opening__description"><RichText.Content value={ description } /></div>

                    <div className="opening__misc opening__misc--label">Essential Job Duties &amp; Responsibilities</div>
                    <div className="opening__misc opening__misc--duties"><RichText.Content value={ duties } /></div>

                    <div className="opening__misc opening__misc--label">Essential Skills</div>
                    <div className="opening__misc opening__misc--skills"><RichText.Content value={ skills } /></div>
                </div>
            </div>
        );
    },
} );