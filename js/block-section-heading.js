registerBlockType( 'childress/section-heading', {
    title: 'Section Heading',
    icon: 'editor-textcolor',
    category: 'custom-blocks',

    attributes: {
        underline: {
            type: 'string',
            default: 'underline'
        }
    },

    edit( { attributes, className, setAttributes } ) {
        const { underline } = attributes;

        return (
            <Fragment>
                <InspectorControls>
                    <SelectControl
                        label="Underline"
                        value={ underline ? underline : '' }
                        options={[
                            {
                                label: 'Right',
                                value: 'underline'
                            },
                            {
                                label: 'Full',
                                value: 'underline underline--full'
                            },
                            {
                                label: 'None',
                                value: ''
                            }
                        ]}
                        onChange={ ( value ) => setAttributes({ underline: value }) }
                    />
                </InspectorControls>
                <div className={ className }>
                    <div className="container">
                        <InnerBlocks 
                            template={[
                                ['core/heading'],
                                ['core/heading']
                            ]}
                            templateLock="all"
                        />
                        <div className={ underline }></div>
                    </div>
                </div>
            </Fragment>
        );
    },

    save( { attributes } ) {
        const { underline } = attributes;

        return (
            <div class="wp-block-childress-section-heading">
                <div className="container container--thin">
                    <InnerBlocks.Content />
                    <div className={ underline }></div>
                </div>
            </div>
        );
    },
} );