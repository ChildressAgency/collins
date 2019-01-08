registerBlockType( 'childress/section-heading', {
    title: 'Section Heading',
    icon: 'editor-textcolor',
    category: 'custom-blocks',

    edit( { attributes, className, setAttributes } ) {
        return (
            <div className={ className }>
                <div className="container">
                    <InnerBlocks 
                        template={[
                            ['core/heading'],
                            ['core/heading']
                        ]}
                        templateLock="all"
                    />
                    <div className="underline"></div>
                </div>
            </div>
        );
    },

    save( { attributes } ) {
        return (
            <div class="wp-block-childress-section-heading">
                <div className="container container--thin">
                    <InnerBlocks.Content />
                    <div className="underline"></div>
                </div>
            </div>
        );
    },
} );