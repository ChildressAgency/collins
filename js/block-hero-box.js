registerBlockType( 'childress/hero-box', {
    title: 'Hero Box',
    icon: 'screenoptions',
    category: 'custom-blocks',

    attributes: {
        backgroundUrl: {
            type: 'string'
        },
        backgroundId: {
            type: 'number'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { backgroundUrl, backgroundId } = attributes;

        return (
            <div className={ className }>
                <div 
                    style={{ 
                        backgroundImage: `url(${ backgroundUrl })`,
                        padding: '15px'
                    }}
                >
                    <MediaUpload
                        onSelect={ media => { setAttributes({ backgroundUrl: media.url, backgroundId: media.id }); } }
                        type="image"
                        value={ backgroundId }
                        render={ ({ open }) => (
                            <Button className={ 'button button-large' } onClick={ open }>
                                { 'Set Background' }
                            </Button>
                        ) }
                    />
                    <InnerBlocks
                        allowedBlocks={['childress/hero-info-box', 'childress/hero-list', 'childress/hero-open']}
                    />
                </div>
            </div>
        );
    },

    save( { attributes } ) {
        const { backgroundUrl } = attributes;

        return (
            <div className="hero-box" style={{ backgroundImage: `url(${ backgroundUrl })` }}>
                <InnerBlocks.Content />
            </div>
        );
    },
} );

registerBlockType( 'childress/hero-info-box', {
    title: 'Hero Info Box',
    icon: 'screenoptions',
    category: 'custom-blocks',
    parent: ['childress/hero-box'],

    edit( { attributes, className, setAttributes } ) {

        return (
            <div className="hero-info-box">
                <div className="hero-info-box--inner">
                    <InnerBlocks
                        template={[
                            ['core/heading'],
                            ['core/paragraph'],
                            ['core/button']
                        ]}/>
                </div>
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="hero-info-box">
                <div class="hero-info-box--inner">
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },

} );

registerBlockType( 'childress/hero-list', {
    title: 'Hero List',
    icon: 'screenoptions',
    category: 'custom-blocks',
    parent: ['childress/hero-box'],

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className="hero-list">
                <InnerBlocks 
                    template={[
                        ['core/heading'],
                        ['core/list'],
                        ['core/list']
                    ]}
                    templateLock="all"
                />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="hero-list">
                <div className="container container--thin">
                    <div className="hero-list__grid">
                        <InnerBlocks.Content />
                    </div>
                </div>
            </div>
        );
    },
} );

registerBlockType( 'childress/hero-all', {
    title: 'Hero - All',
    icon: 'screenoptions',
    category: 'custom-blocks',
    parent: ['childress/hero-box'],

    attributes: {
        gradient: {
            type: 'string',
            default: 'hero-all--gradient'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { gradient } = attributes;

        var classes = "hero-all";

        if( gradient )
            classes = "hero-all hero-all--gradient"

        return (
            <Fragment>
                <InspectorControls>
                    <SelectControl
                        label="Shade"
                        value={ gradient ? gradient : '' }
                        options={[
                            {
                                label: 'Shade',
                                value: 'hero-all--gradient'
                            },
                            {
                                label: 'No Shade',
                                value: ''
                            }
                        ]}
                        onChange={ ( value ) => setAttributes({ gradient: value }) }
                    />
                </InspectorControls>
                <div className={ classes }>
                    <InnerBlocks 
                        template={[
                            ['core/heading'],
                            ['core/button']
                        ]}
                    />
                </div>
            </Fragment>
        );
    },

    save( { attributes } ) {
        const { gradient } = attributes;

        var classes = "hero-all";

        if( gradient )
            classes = "hero-all " + { gradient }

        return (
            <div className={ classes }>
                <div className="container">
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );
