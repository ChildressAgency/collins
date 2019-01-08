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
                        allowedBlocks={['childress/hero-info-box', 'childress/hero-list']}
                        template={[
                            ['childress/hero-info-box']
                        ]}
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
                />
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div className="hero-list">
                <div className="container">
                    <InnerBlocks.Content />
                </div>
            </div>
        );
    },
} );