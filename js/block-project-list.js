registerBlockType( 'childress/project-list', {
    title: 'Project List',
    icon: 'megaphone',
    category: 'custom-blocks',

    attributes: {
        category: {
            type: 'array',
            default: [
                    'residential',
                    'commercial',
                    'public-infrastructure'
                ]
        },
    },

    edit( { attributes, className, setAttributes } ){
        const { category, text } = attributes;

        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody
                        title={ 'Projects Options' }
                        initialOpen={ true }>
                        <SelectControl
                            label="Category"
                            value={ category ? category : [ 'residential' ] }
                            options={[
                                {
                                    label: 'All',
                                    value: [
                                        'residential',
                                        'commercial',
                                        'public-infrastructure'
                                    ]
                                },
                                {
                                    label: 'Residential',
                                    value: [ 'residential' ]
                                },
                                {
                                    label: 'Commercial',
                                    value: [ 'commercial' ]
                                },
                                {
                                    label: 'Public & Infrastructure',
                                    value: [ 'public-infrastructure' ]
                                }
                            ]}
                            onChange={ ( value ) => setAttributes({ category: value }) }
                        />
                    </PanelBody>
                </InspectorControls>
                <ServerSideRender
                    block='childress/project-list'
                />
            </Fragment>
        );
    },

    save( { attributes } ) {
        // Rendering in PHP
        return null;
    },
} );